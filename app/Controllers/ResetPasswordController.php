<?php

namespace App\Controllers;
use App\Models\CustomSession;
use App\Models\User;

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
        if($this->validate($rules))
        {
            $curr = new User(null,null);
            if ($curr->check_email($mail)) 
            {
                //Gửi mail
                return redirect() -> to ('/pepicase/public/resetPassword/pending');
            } 
            else {
                // Email does not exist
                $message = [
                    'msg' => '',
                ];
                return view('ResetPassword1', $message);
            }
        }
        else
        {
            $data['validation'] = $this->validator;
            return view('ResetPassword1', $data);
        }
    }
    
    public function pending()
    {
        //làm 1 trang front-end kêu ngta check mail / đợi
        return view('');
    }
}
