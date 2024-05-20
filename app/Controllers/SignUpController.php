<?php

namespace App\Controllers;

require_once 'C:\xampp\htdocs\pepicase\app\Libraries\PHPMailer\src\PHPMailer.php';
require_once 'C:\xampp\htdocs\pepicase\app\Libraries\PHPMailer\src\Exception.php';
require_once 'C:\xampp\htdocs\pepicase\app\Libraries\PHPMailer\src\SMTP.php';

use App\Models\User;
use App\Models\CustomSession;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SignUpController extends BaseController
{
    private function encrypt($data)
    {
        $key = 'encryption-key'; // Replace with your encryption key
        $iv = 'd2a1b9c0e9f7a5de';
        $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
        $encoded = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($encrypted));
        return $encoded;
    }

    private function decrypt($encryptedData)
    {
        $iv = 'd2a1b9c0e9f7a5de';
        $key = 'encryption-key'; // Replace with your encryption key
        $decoded = base64_decode(str_replace(['-', '_'], ['+', '/'], $encryptedData));
        $decrypted = openssl_decrypt($decoded, 'AES-256-CBC', $key, 0, $iv);
        return $decrypted;
    }

    public function send_signup_email()
    {
        $mail = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');

        $rules = [
            'email' => 'valid_email',
        ];

        $data = [
            'validation' => '',
        ];
        // setting rules

        if($this->validate($rules)) //rule check argument
        {
            $user = new User($mail, $password);
            if ($user->check_if_authorized()) //account existant argument
            {
                $message = [
                    "error"=> "User already exist!",
                ];
                return view('signup_new', $message);
            }
            else //if the credentials pass the rule check and does not exist in the database then we start sending the mail
            {
                $encrypted_password = $this->encrypt($password);
                $encrypted_email = $this->encrypt($mail);
                $auth_email = new PHPMailer(true);
                $auth_email->SMTPDebug = SMTP::DEBUG_SERVER;
                $auth_email->Debugoutput = 'html'; 
                $auth_email->isSMTP();
                $auth_email->CharSet = "utf-8";
                $auth_email->Host = 'smtp.gmail.com';
                $auth_email->Port = 465;
                $auth_email->SMTPAuth = true;
                $auth_email->Username = 'ndat34035@gmail.com'; 
                $auth_email->Password = 'nnvr tkbp yzlc kbny';  
                $auth_email->SMTPSecure = 'ssl';  
                $auth_email->setFrom('ndat34035@gmail.com', 'Pepicase');
                $auth_email->addAddress($mail, 'Recipient Name');
                $auth_email->isHTML(true);
                $auth_email->Subject = 'PEPICASE - SIGN UP VERIFICATION';
                $content ='
<html>
    <body>
        <div style="font-family: Arial, sans-serif; line-height: 1.6; color: black; max-width: 50vw; margin: auto; padding: 20px; border: 1px solid black; border-radius: 10px; background-color: white;">
            <div style="background-color: #FFF3C0; color: black; padding: 10px 0; text-align: center; border-radius: 10px 10px 0 0;">
                <h1>You have initiated a password reset attempt.</h1>
            </div>
            <div style="padding: 20px;">

                <p>PEPICASE has detected that you are signing up for an account. If this is not you, <strong>ignore this message!</strong></p>
                <p>Otherwise, please click the link below to confirm your signup!</p>

                <div style="display: flex; justify-content: center; align-items: center; margin: 20px 0; border: 1px solid black;">
                    <div style="height: 50px;" align="center">
                        <a style="text-decoration: none; color: black;" href="http://localhost/pepicase/public/signup/confirmed/'.$encrypted_email.'/'.$encrypted_password.'">
                        <button style="background-color: #FFF3C0; height: 100%;">Sign up here!</button>
                        </a>
                     </div>
                </div>
    
            </div>
        </div>
        <div class="footer" style="text-align: center; padding: 10px 0; color: #777; font-size: 12px;">
            <p>© Pepicase</p>
        </div>
    </body>
</html>';
                $auth_email->Body = $content;
                try 
                {
                    $auth_email->smtpConnect(array(
                        "ssl" => array(
                            "verify_peer" => true,
                            "verify_peer_name" => false,
                            "allow_self_signed" => false)));
                    if ($auth_email->send()) //if its sent then it'll redirect the user to pending
                    {
                        return redirect()->to('/signup/pending');
                    } 
                    else //if not it'll return an error
                    {
                        $error = [
                            'error' => $auth_email->ErrorInfo,
                            ];
                        return view('signup_new', $error);
                    }
                } 
                catch (Exception $e) 
                {
                     $error = [
                        'error' => $e->getMessage(), // Get the exception error message
                    ];
                    return view('signup_new', $error);
                }
            };
        }
        else //if mess up the validation check
        {
            $error = [
                "error"=> "Please enter a valid email!",
            ];
            return view('signup_new', $error);
        }

    }

    public function signup($encrypted_email, $encrypted_password)
    {
        $email = $this->decrypt($encrypted_email);
        $password = $this->decrypt($encrypted_password);
        $new_user = new User($email,$password);
        if( $new_user->check_if_authorized())
        {
            return redirect() -> to ('/');
        }
        else
        {
            $outcome = $new_user->create($email, $password);
            if( $outcome )
            {
                $new_session = new CustomSession($outcome);
                return redirect() -> to ('/');
            }
            else return redirect()->to('/signup');
        }
    }

    public function index()
    {
        $curr_session = new CustomSession(null);
        if ($curr_session->isSessionSet()) return redirect() -> to('/');
        return view ('signup');
    }

    public function pending()
    {
        return view('email_pending');
    }
}