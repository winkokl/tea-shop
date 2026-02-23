<?php

return [
    'sms_poh_enable' => env('SMS_POH_ENABLE', true),
    'sms_poh_token'  => env('SMS_POH_TOKEN', 'uYEqFC9tvLUx35is07e4ziK9fe5m403fwv4TimkqQwYRSmu4unC3HFDOPZ6fw5PH'),
    'sms_poh_host' => env('SMS_POH_HOST','https://smspoh.com/api/v2/send'),
	'sms_poh_sender_name'=> env('SMS_POH_SENDER_NAME', ''),
	'verification_sms'=> env('VERIFICATION_SMS', ''),
];
