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

    public function send_signup_mail()
    {
        $rules = [
            'email' => 'valid_email',
        ];

        $data = [
            'validation' => '',
        ];

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $data = array (
            'email' => $email,
            'password' => $password,
        );

        if($this->validate($rules))
        {
            $user = new User($email, $password);
            {
                if ($user->check_if_authorized()) 
                {
                    $message = [
                        "message"=> "User already exist!",
                    ];
                    return view('signup_fail', $message);
                }
                else
                {
                    $encryptedEmail = $this->encrypt($email);
                    $encryptedPassword = $this->encrypt($password);
                    $token = rand(0000,9999);
                    $new_url = 'localhost/pepicase/public/signup/' . $encryptedEmail .'/'. $encryptedPassword;
                    

                    //khởi tạo và gửi mail tại đây Quỳnh!
                    $title = "[Pepicase] - Xác nhận đăng ký tài khoản";
                    $content1 = "Xin chào ... ,";
                    $content2 = "Bạn vui lòng kích hoạt tài khoản tại đây giúp chúng mình nhé: ".FCPATH.'?token='.$token.'&email'.$email;
                    $content3 = "Pepicase xin cảm ơn bạn!";
                    $to_email = $email;
                    $this->send_signup_mail($to_email, $content1, $content2, $content3);
                }
            };
        }
        else
        {
            $message = [
                "message"=> "Please enter a valid email!",
            ];
            return view('signup_fail', $message);
        }
        
    }

    public function signup($encryptedEmail, $encryptedPassword)
    {
        $decryptedEmail = $this->decrypt($encryptedEmail);
        $decryptedPassword = $this->decrypt($encryptedPassword);
        $user = new User($decryptedEmail, $decryptedPassword);
        if(!$user->check_if_authorized())
        {
            $user->create($decryptedEmail, $decryptedPassword); //chưa code hàm create!
            //tìm hiểu làm sao để biết create thành công hay không, sau đó check, nếu thành công thì về '/' nếu không thì về signup_fail
            //tìm hiểu làm sao để biết create thành công hay không, sau đó check, nếu thành công thì về '/' nếu không thì về signup_fail
            //tìm hiểu làm sao để biết create thành công hay không, sau đó check, nếu thành công thì về '/' nếu không thì về signup_fail
            redirect()->to('/');
        }
        else 
        {
            return redirect()->to ('/');
        }
    }

    public function index(): string
    {
        return view ('signup_new');
    }
}