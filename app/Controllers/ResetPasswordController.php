<?php

namespace App\Controllers;

use App\Models\User;
use Config\Database;
require_once 'C:\xampp\htdocs\pepicase\app\Libraries\PHPMailer\src\PHPMailer.php';
require_once 'C:\xampp\htdocs\pepicase\app\Libraries\PHPMailer\src\Exception.php';
require_once 'C:\xampp\htdocs\pepicase\app\Libraries\PHPMailer\src\SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use App\Models\CustomSession;

class ResetPasswordController extends BaseController
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
                $encrypted_email = $this->encrypt($mail);
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
                $content ='
<html>
    <body>
        <div style="font-family: Arial, sans-serif; line-height: 1.6; color: black; max-width: 50vw; margin: auto; padding: 20px; border: 1px solid black; border-radius: 10px; background-color: white;">
            <div style="background-color: #FFF3C0; color: black; padding: 10px 0; text-align: center; border-radius: 10px 10px 0 0;">
                <h1>You have initiated a password reset attempt.</h1>
            </div>
            <div style="padding: 20px;">
                <p>PEPICASE has received a signup request from a user with this email. If this is not you, <strong>ignore this message!</strong></p>

                <p>Otherwise, please click the link below to initiate a password reset.</p>

                <div style="display: flex; justify-content: center; align-items: center; margin: 20px 0; border: 1px solid black;">
                    <div style="height: 50px;" align="center">
                        <a style="text-decoration: none; color: black;" href="http://localhost/pepicase/public/resetPassword/confirmed/'.$encrypted_email.'">
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
        $auth_email->Body = $content;
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
        return view('email_pending');
    }

    public function showResetPassword($encrypted_email)
    {
        $data = [
            'encrypted_email' => $encrypted_email,
        ];
        return view('resetPassword3',$data);
    }

    public function ResetPassword($encrypted_email)
    {
        $new_password = $this->request->getPost("password");
        $decrypted_email = $this->decrypt($encrypted_email);

        $db = Database::connect();
        $updatePassword = "UPDATE user SET Password = '" . $new_password . "' WHERE Email = '" . $decrypted_email . "'";
        $db->query($updatePassword);
        $get_id = "SELECT ID FROM user WHERE Email = '$decrypted_email'";
        $result = $db->query($get_id)->getResult();
        if(count($result) == 1) {
            $row = $result[0];
            $new_session = new CustomSession($row->ID);
            return redirect()->to("/login")-> with("okay", "Password reset successfully, login with new credentials.");
        }
        else {return redirect()->to("/login")-> with("okay", "Something went wrong.");}
    }
}