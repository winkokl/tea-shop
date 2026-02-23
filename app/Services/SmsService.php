<?php 
namespace App\Services;

use Modules\Sms\Entities\Sms;
/**
 * 
 */
class SmsService
{
	
	public static function sendVerifySms($type)
	{
		$message = auth()->user()->confirmation_code . 'is Your '.appName().' verification code.';

		$class = 1;
		$priority = 16;
		$description = 'Send Verify SMS!';

		return send_sms(auth()->user()->mobile,$message,$class,$priority,$description);
	}

	public static function requestNewPassSms($user, $pass)
	{
		$message     = 'Your Requested New Password From '.appName().' is: '.$pass;
		$class       = 1;
		$priority    = 16;
		$description = 'Send New Pass SMS!';

		return send_sms($user->mobile,$message,$class,$priority,$description);
	}
}