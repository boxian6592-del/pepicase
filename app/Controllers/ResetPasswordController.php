<?php

namespace App\Controllers;

use App\Models\User;

require_once 'C:\xampp\htdocs\pepicase\app\Libraries\PHPMailer\src\PHPMailer.php';
require_once 'C:\xampp\htdocs\pepicase\app\Libraries\PHPMailer\src\Exception.php';
require_once 'C:\xampp\htdocs\pepicase\app\Libraries\PHPMailer\src\SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ResetPasswordController extends BaseController
{
    public function index()
    {
        return view("resetPassword1");
    }

    public function check_and_send()
    {
        $mail = $this->request->getPost("email");
        $rules = [
            'email' => 'valid_email',
        ];

        $data = [
            'validation' => '',
        ];
        if ($this->validate($rules)) {
            $curr = new User(null, null);
            if ($curr->check_email($mail)) {
                $auth_email = new PHPMailer(true);
                $auth_email->SMTPDebug = SMTP::DEBUG_SERVER;
                $auth_email->Debugoutput = 'html'; // Set debug output format to HTML
                $auth_email->isSMTP();
                $auth_email->CharSet = "utf-8";
                $auth_email->Host = 'smtp.gmail.com';
                $auth_email->Port = 465;
                $auth_email->SMTPAuth = true;
                $auth_email->Username = 'ndat34035@gmail.com'; // SMTP username
                $auth_email->Password = 'nnvr tkbp yzlc kbny';   // SMTP password
                $auth_email->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $auth_email->setFrom('ndat34035@gmail.com', 'Pepicase');
                $auth_email->addAddress($mail, 'Recipient Name');
                $auth_email->isHTML(true);  // Set email format to HTML
                $auth_email->Subject = 'PEPICASE - RESET PASSWORD VERIFICATION';
                $noidungthu ='
<html>
    <body>
        <div style="font-family: Arial, sans-serif; line-height: 1.6; color: black; max-width: 50vw; margin: auto; padding: 20px; border: 1px solid black; border-radius: 10px; background-color: white;">
            <div style="background-color: #FFF3C0; color: black; padding: 10px 0; text-align: center; border-radius: 10px 10px 0 0;">
                <h1>You have initiated a password reset attempt.</h1>
            </div>
            <div style="padding: 20px;">
                <p>PEPICASE has detected your attempt to reset your password. If this is not you, <strong>ignore this message!</strong></p>

                <p>Otherwise, please click the link below to initiate a password reset.</p>

                <div style="display: flex; justify-content: center; align-items: center; margin: 20px 0; border: 1px solid black; width: 100%;">
                    <div style="height: 50px;" align="center">
                        <a style="text-decoration: none; color: black;" href="youtube.com">
                            <button style="background-color: #FFF3C0; height: 100%;">Reset password here</button>
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
        $auth_email->Body = $noidungthu;
                try {
                    $auth_email->smtpConnect(
                        array(
                            "ssl" => array(
                                "verify_peer" => true,
                                "verify_peer_name" => false,
                                "allow_self_signed" => false
                            )
                        )
                    );
                    if ($auth_email->send()) {
                        return redirect()->to('/resetPassword/pending');
                    } else {
                        $error = [
                            'error' => $auth_email->ErrorInfo,
                        ];
                        return view('resetPassword1', $error);
                    }
                } catch (Exception $e) {
                    $error = [
                        'error' => $e->getMessage(), // Get the exception error message
                    ];
                    return view('resetPassword1', $error);
                }
            } else {
                // Email does not exist
                $message = [
                    'msg' => '',
                ];
                return view('ResetPassword1', $message);
            }
        } else {
            $data['validation'] = $this->validator;
            return view('ResetPassword1', $data);
        }
    }

    public function pending()
    {
        //làm 1 trang front-end kêu ngta check mail / đợi
        return view('reset-email-sent');
    }
}