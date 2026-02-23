<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PadesarEncryption extends Model
{
    use HasFactory;

    public static function encode($value)
    {
        if (!$value) {
            return false;
        }

        $secretKey = config('app.key');
        $encryptMethod = config('app.cipher');
        $secretIv =openssl_cipher_iv_length($encryptMethod);
     
        $key = hash('sha256', $secretKey);
        $iv = substr(hash('sha256', $secretIv), 0, 16);
        $output = base64_encode(openssl_encrypt($value, $encryptMethod, $key, 0, $iv));

        return $output;
    }

    
    public static function decode($value)
    {
        if (!$value) {
            return false;
        }

        $secretKey = config('app.key');
        $encryptMethod = config('app.cipher');
        $secretIv =openssl_cipher_iv_length($encryptMethod);
     
        $key = hash('sha256', $secretKey);
        $iv = substr(hash('sha256', $secretIv), 0, 16);

        $output = openssl_decrypt(base64_decode($value), $encryptMethod, $key, 0, $iv);

        return $output;
    }
}
