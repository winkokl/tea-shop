<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Jenssegers\Agent\Agent;
use App\Http\Requests\Frontend\User\PasswordResetRequest;
use GMBF\MyanmarPhoneNumber;
use App\Domains\Auth\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\SmsService;
use Illuminate\Support\Facades\Mail;
/**
 * Class ForgotPasswordController.
 */
class ForgotPasswordController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        $agent = new Agent();

        $checkDevice = $agent->isMobile() ? 'mobile':'frontend';

        return view($checkDevice.'.auth.passwords.email');
    }

    public function sendNewPassToEmailOrMobile(PasswordResetRequest $request)
    {
        if (is_numeric($request->email_or_mobile)) {
            $phoneNumber = new MyanmarPhoneNumber();
            $value       = $phoneNumber->add_prefix($request->email_or_mobile);
            $user = User::where('mobile',$value)->first();
            if (is_null($user)) {
                return redirect()->back()->withFlashDanger(__('We can not find a user with that mobile.'));
            }
            $newPassword = rand(123456, 999999);

            $user->password = Hash::make($newPassword);
            $user->password_changed_at = now();
            tap($user)->update();
            SmsService::requestNewPassSms($user,$newPassword);
            return redirect()
                    ->route('frontend.auth.login')
                    ->withFlashSuccess(__('Our System will post new password code to your phone. Please login with this password code.'));
        } else {
            $user = User::where('email',$request->email_or_mobile)->first();
            if (is_null($user)) {
                return redirect()->back()->withFlashDanger(__('We can not find a user with that e-mail address.'));
            }

            $newPassword = rand(123456, 999999);
            $user->password = Hash::make($newPassword);
            $user->password_changed_at = now();
            tap($user)->update();

            $body = view('frontend.auth.passwords.password-email', ['newPassword' => $newPassword])->render();

            $response = Mail::send([], [], function ($message) use ($user, $body) {
                        $message->setBody($body, 'text/html');
                        $message->to($user->email, $user->name)->subject(app_name() . ': New Password Code');
            });

            if (count(Mail::failures()) > 0) {
                throw new GeneralException("There was a problem sending the new password code e-mail");
            }

            return redirect()
                    ->route('frontend.auth.login')
                    ->withFlashSuccess(__('Our System will post new password code to your email. Please login with this password code.'));
        }


    }
}
