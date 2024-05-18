<?php

namespace App\Controllers;
use App\Models\User;
use Config\Database;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SignUpController extends BaseController
{
    public function encrypt($data)
    {
        $key = 'your-encryption-key'; // Replace with your encryption key
        $cipher = 'AES-256-CBC';
        $ivLength = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivLength);
        $encrypted = openssl_encrypt($data, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $result = base64_encode($iv . $encrypted);
        return $result;
    }

    public function decrypt($encryptedData)
    {
        $key = 'your-encryption-key'; // Replace with your encryption key
        $cipher = 'AES-256-CBC';
        $ivLength = openssl_cipher_iv_length($cipher);
        $encryptedData = base64_decode($encryptedData);
        $iv = substr($encryptedData, 0, $ivLength);
        $encrypted = substr($encryptedData, $ivLength);
        $decrypted = openssl_decrypt($encrypted, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        return $decrypted;
    }

    public function send_signup_email()
    {
        $mail = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmedPassword = $this->request->getPost('confirm_password');
        return redirect() -> to ('/collections');
    }

    public function index(): string
    {
        return view ('signup');
    }
}