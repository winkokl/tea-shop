<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Services\UserService;
use App\Rules\Captcha;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;
use Jenssegers\Agent\Agent;
use Modules\Region\Repositories\RegionRepository;
use Modules\Customer\Repositories\CustomerRepository;
use GMBF\MyanmarPhoneNumber;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Domains\Auth\Http\Requests\Frontend\Auth\FirstStepReigsterFormRequest;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class RegisterController.
 */
class RegisterController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * @var UserService
     */
    protected $userService;
    protected $region;
    protected $customer;
    protected $checkDevice;

    /**
     * RegisterController constructor.
     *
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService, RegionRepository $region, CustomerRepository $customer)
    {
        $agent = new Agent();

        $this->checkDevice = $agent->isMobile()? 'mobile': 'frontend';
        
        $this->userService = $userService;
        $this->region      = $region;
        $this->customer    = $customer;
    }

    /**
     * Where to redirect users after registration.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(homeRoute());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function firstStepRegistrationForm()
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);

        return view($this->checkDevice.'.auth.first-step-register');
    }

    public function firstStepRegisterConfirm(FirstStepReigsterFormRequest $request)
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);

        $input = $request->except('_token','_method');

        if (is_numeric($input['email_or_mobile'])) {
            $phoneNumber = new MyanmarPhoneNumber();
            $phoneNumber = $phoneNumber->add_prefix($input['email_or_mobile']);
            $input['mobile'] = $phoneNumber;
            $input['email']  = NULL;

        } elseif (filter_var($input['email_or_mobile'], FILTER_VALIDATE_EMAIL)) {
            $input['mobile'] = NULL;
            $input['email']  = $input['email_or_mobile'];
        } else {
            return redirect()->back();
        }

        $input['confirmation_code'] = rand(1234, 9999);
        $input['date_of_birth']     = date('Y-m-d', strtotime($input['date_of_birth']));
        $input['is_vendor']   = 0;
        $input['is_customer'] = 1;
        $input['active']      = 0;

        $user = $this->userService->FirstStepRegisterUser($input);

        if ($user){
            auth()->login($user);

            return redirect()->route('frontend.auth.verification.code.get')->withFlashSuccess(__('Our System will post verification code to your email or sms. Please verify with this code.'));
        }
        // dd($request->all());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);
        if (app()->getLocale() == 'en') {
            $regions = $this->region->getActiveAll('id', 'asc')->pluck('name', 'id');      
        } else {
            $regions = $this->region->getActiveAll('id', 'asc')->pluck('mm_name', 'id'); 
        }

        return view($this->checkDevice.'.auth.register',compact('regions'));

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:100'],
            // 'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            // 'mobile' => ['required','numeric',Rule::unique('users','mobile')],
            // 'password' => array_merge(['max:100'], PasswordRules::register($data['email'] ?? null)),
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'terms' => ['required', 'in:1'],
            'g-recaptcha-response' => ['required_if:captcha_status,true', new Captcha],
        ], [
            'terms.required' => __('You must accept the Terms & Conditions.'),
            'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Domains\Auth\Models\User|mixed
     *
     * @throws \App\Domains\Auth\Exceptions\RegisterException
     */
    protected function create(array $data)
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);

        $data['user_id'] = auth()->user()->id;
        $data['name']    = auth()->user()->name;
        $data['nrc']     = explode('/',@$data['nrc_code'])[0].'/'.@$data['nrc_city_name'].@$data['nrc_type'].@$data['nrc_code_number'];

        try {
            if ($this->customer->create($data)) {
                $user = auth()->user();
                $user->password = $data['password'];
                $user->active   = 1;
                $user->confirmation_code = NULL;
                $user->email_verified_at = now();

                return tap($user)->update();
            }
            
        } catch (Exception $e) {
            DB::rollBack();
        }

        // return $this->userService->registerUser($data);
    }
}
