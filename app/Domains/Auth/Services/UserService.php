<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\Events\User\UserCreated;
use App\Domains\Auth\Events\User\UserDeleted;
use App\Domains\Auth\Events\User\UserDestroyed;
use App\Domains\Auth\Events\User\UserRestored;
use App\Domains\Auth\Events\User\UserStatusChanged;
use App\Domains\Auth\Events\User\UserUpdated;
use App\Domains\Auth\Models\User;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Customer\Repositories\CustomerRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

/**
 * Class UserService.
 */
class UserService extends BaseService
{
    protected $customer;
    /**
     * UserService constructor.
     *
     * @param  User  $user
     */
    public function __construct(User $user, CustomerRepository $customer)
    {
        $this->model = $user;
        $this->customer = $customer;
    }

    /**
     * @param $type
     * @param  bool|int  $perPage
     * @return mixed
     */
    public function getByType($type, $perPage = false)
    {
        if (is_numeric($perPage)) {
            return $this->model::byType($type)->paginate($perPage);
        }

        return $this->model::byType($type)->get();
    }

    public function FirstStepRegisterUser(array $data = []): User
    {
        DB::beginTransaction();

        try {
            $user = $this->createUser($data);

        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your account.'));
        }

        DB::commit();

        return $user;
    }

    /**
     * @param  array  $data
     * @return mixed
     *
     * @throws GeneralException
     */
    public function registerUser(array $data = []): User
    {
        DB::beginTransaction();

        try {
            $user = $this->createUser($data);

        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your account.'));
        }

        DB::commit();

        return $user;
    }

    /**
     * @param $info
     * @param $provider
     * @return mixed
     *
     * @throws GeneralException
     */
    public function registerProvider($info, $provider): User
    {
        $user = $this->model::where('provider_id', $info->id)->first();

        if (! $user) {
            DB::beginTransaction();

            try {
                $user = $this->createUser([
                    'name' => $info->name,
                    'email' => $info->email,
                    'provider' => $provider,
                    'provider_id' => $info->id,
                    'email_verified_at' => now(),
                ]);
            } catch (Exception $e) {
                DB::rollBack();

                throw new GeneralException(__('There was a problem connecting to :provider', ['provider' => $provider]));
            }

            DB::commit();
        }

        return $user;
    }

    /**
     * @param  array  $data
     * @return User
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): User
    {
        DB::beginTransaction();

        try {
            $user = $this->createUser([
                'type' => $data['type'],
                'name' => $data['name'],
                'email' => isset($data['email']) ? $data['email'] : null,
                'mobile' => isset($data['mobile']) ? $data['mobile'] : null,
                'password' => $data['password'],
                // 'email_verified_at' => isset($data['email_verified']) && $data['email_verified'] === '1' ? now() : null,
                'email_verified_at' => now(),
                'active' => isset($data['active']) && $data['active'] == 1,
                'is_vendor' => isset($data['is_vendor']),
                'is_customer' => isset($data['is_customer']),
                'date_of_birth' => isset($data['date_of_birth']) ? $data['date_of_birth'] : null,
            ]);
           
            $user->syncRoles($data['roles'] ?? []);
            $user->syncPermissions($data['permissions'] ?? []);

        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this user. Please try again.'));
        }

        event(new UserCreated($user));

        DB::commit();

        // They didn't want to auto verify the email, but do they want to send the confirmation email to do so?
        if (! isset($data['email_verified']) && isset($data['send_confirmation_email']) && $data['send_confirmation_email'] === '1') {
            // $user->sendEmailVerificationNotification();
            $this->info('skip email verification');
        }

        return $user;
    }

    /**
     * @param  User  $user
     * @param  array  $data
     * @return User
     *
     * @throws \Throwable
     */
    public function update(User $user, array $data = []): User
    {
        DB::beginTransaction();

        try {
            $user->update([
                'type' => $user->isMasterAdmin() ? $this->model::TYPE_ADMIN : $data['type'] ?? $user->type,
                'name' => $data['name'],
                'email' => isset($data['email']) ? $data['email'] : null, // 23-01-2023 update
            ]);

            if (! $user->isMasterAdmin()) {
                // Replace selected roles/permissions
                $user->syncRoles($data['roles'] ?? []);

                if (! config('boilerplate.access.user.only_roles')) {
                    $user->syncPermissions($data['permissions'] ?? []);
                }
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this user. Please try again.'));
        }

        event(new UserUpdated($user));

        DB::commit();

        return $user;
    }

    /**
     * @param  User  $user
     * @param  array  $data
     * @return User
     */
    public function updateProfile(User $user, array $data = []): User
    {
        $user->name = $data['name'] ?? null;

        if ($user->canChangeEmail() && $user->email !== $data['email']) {
            $user->email = $data['email'];
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
            session()->flash('resent', true);
        }

        return tap($user)->save();
    }

    /**
     * @param  User  $user
     * @param $data
     * @param  bool  $expired
     * @return User
     *
     * @throws \Throwable
     */
    public function updatePassword(User $user, $data, $expired = false): User
    {
        if (isset($data['current_password'])) {
            throw_if(
                ! Hash::check($data['current_password'], $user->password),
                new GeneralException(__('That is not your old password.'))
            );
        }

        // Reset the expiration clock
        if ($expired) {
            $user->password_changed_at = now();
        }

        $user->password = $data['password'];

        return tap($user)->update();
    }

    /**
     * @param  User  $user
     * @param $status
     * @return User
     *
     * @throws GeneralException
     */
    public function mark(User $user, $status): User
    {
        if ($status === 0 && auth()->id() === $user->id) {
            throw new GeneralException(__('You can not do that to yourself.'));
        }

        if ($status === 0 && $user->isMasterAdmin()) {
            throw new GeneralException(__('You can not deactivate the administrator account.'));
        }

        $user->active = $status;

        if ($user->save()) {
            event(new UserStatusChanged($user, $status));

            return $user;
        }

        throw new GeneralException(__('There was a problem updating this user. Please try again.'));
    }

    /**
     * @param  User  $user
     * @return User
     *
     * @throws GeneralException
     */
    public function delete(User $user): User
    {
        if ($user->id === auth()->id()) {
            throw new GeneralException(__('You can not delete yourself.'));
        }

        if ($this->deleteById($user->id)) {
            event(new UserDeleted($user));

            return $user;
        }

        throw new GeneralException('There was a problem deleting this user. Please try again.');
    }

    /**
     * @param  User  $user
     * @return User
     *
     * @throws GeneralException
     */
    public function restore(User $user): User
    {
        if ($user->restore()) {
            event(new UserRestored($user));

            return $user;
        }

        throw new GeneralException(__('There was a problem restoring this user. Please try again.'));
    }

    /**
     * @param  User  $user
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(User $user): bool
    {
        if ($user->forceDelete()) {
            event(new UserDestroyed($user));

            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this user. Please try again.'));
    }

    /**
     * @param  array  $data
     * @return User
     */
    protected function createUser(array $data = []): User
    {
        return $this->model::create([
            'type' => $data['type'] ?? $this->model::TYPE_USER,
            'name' => $data['name'] ?? null,
            'email' => $data['email'] ?? null,
            'password' => $data['password'] ?? null,
            'provider' => $data['provider'] ?? null,
            'provider_id' => $data['provider_id'] ?? null,
            'email_verified_at' => $data['email_verified_at'] ?? null,
            'mobile' => $data['mobile'] ?? null,
            'active' => $data['active'] ?? true,
            'is_vendor' => $data['is_vendor'] ?? true,
            'is_customer' => $data['is_customer'] ?? true,
            'confirmation_code' => $data['confirmation_code'] ?? null,
            'date_of_birth' => date('Y-m-d', strtotime($data['date_of_birth'])) ?? null,
            'gender' => $data['gender'] ?? null,
        ]);
    }

    public function sendOtpEmailOrSms($user)
    {
        //$user can be user instance or id
        if (! $user instanceof User) {
            $user = $this->find($user);
        }

        $otpCode = Str::random(6);

        \Cache::put($user->id.'_opt_code',$otpCode,300);
        
        if ($user->mobile) {
            $class = 1;
            $priority = 6;
            $description = 'OTP SMS!';
            $sender = appName();
            $mobile = $user->mobile;
            $message = appName()." OTP code is: ".$otpCode;

            send_sms($mobile,$message,$class,$priority,$description,$sender);
            
        } else {
            $body = view('frontend.auth.otp.otp', ['otp_code' => $otpCode])->render();

            $response = Mail::send([], [], function ($message) use ($user, $body) {
                        $message->setBody($body, 'text/html');
                        $message->to($user->email, $user->name)->subject(app_name() . ': OPT Code');
            });

            if (count(Mail::failures()) > 0) {
                throw new GeneralException("There was a problem sending the OPT code e-mail");
            }
        }

        return true;
    }
}
