<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Services\SmsService;
use App\Http\Requests\Frontend\User\CheckOtpRequest;
use App\Domains\Auth\Services\UserService;

/**
 * Class VerificationController.
 */
class VerificationController
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    protected $userService;


    /**
     * @param UserService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(homeRoute());
    }

    /**
     * Show the otp verification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verifyOtp(Request $request)
    {
        $this->userService->sendOtpEmailOrSms(auth()->user());
        
        return view('frontend.auth.otp.otp-verify');
    }

    public function chkVerifyOtp(CheckOtpRequest $request)
    {
        if(\Cache::get(auth()->user()->id.'_opt_code') === $request->get('otp_code')){
                    session()->put('verify_otp',true); 
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->back()->withFlashDanger('Invalid OTP Code.');
    }

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('frontend.auth.verify');
    }

    /**
     * Show the sms verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function smsVerificationForm(Request $request)
    {
        $message = auth()->user()->confirmation_code . config('sms.verification_sms');
        send_sms(auth()->user()->mobile,$message,$description='',$class=1,$priority=0);
        return view('frontend.auth.sms-verify');
    }

    /**
     * Show the sms or email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function codeVerificationForm(Request $request)
    {
        $agent = new Agent();

        $checkDevice = $agent->isMobile() ? 'mobile' : 'frontend';

        // SmsService::sendVerifySms('send_verify_sms');
        return view($checkDevice.'.auth.code-verify');
    }

    public function checkVerificationCode(Request $request)
    {
        if($request->digit_2){
            $request['code'] = $request->digit_2.$request->digit_3.$request->digit_4.$request->digit_5;
        }
        if (auth()->user()->updated_at->addMinutes(10) < now()) {
            return redirect()->back()->withFlashDanger(__('validation.attributes.frontend.code_expire'));
        }

        if(auth()->user()->confirmation_code === $request->code){
            auth()->user()->update(["confirmation_code" => NULL]);
            return redirect()->route('frontend.auth.register');
        }

        return redirect()->back()->withFlashDanger(__('Invalid Code.'));
    }

    public function resendCode()
    {
        if (auth()->user()->update(['confirmation_code' => rand(1234, 9999)])) {
            
            return redirect()->back();
        }
    }
}
