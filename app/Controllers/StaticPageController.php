<?php

namespace App\Controllers;
use App\Models\CustomSession;
use App\Models\User;
use App\Models\Cart;

class StaticPageController extends BaseController
{
    // trang để trả view các trang tĩnh
    public function Policy(): string
    {
        return view('policy');
    }
    
    public function AboutUs(): string
    {
        return view('about-us');
    }

    public function TermsOfUse():string
    {
        return view('terms-of-use');
    }

    public function account()
    {
        $curr_session = new CustomSession(null);
        $curr_session->fetch_session_cookie();
        if($curr_session->isSessionSet()) // nếu có
        {
            $user = new User();
            $info = $user->get_info($curr_session->get_id());
            if($info == false) return view ('account');
            else return view('account', [ 'info' => $info ]);
        }
        else return redirect() -> to ('/login');
    }

    public function account_info_update()
    {
        $message = $this->request->getJSON();
        $isFound = $message->isFound;
        $data = $message->data;
        $curr_session = new CustomSession(null);
        $user = new User();
        $user->update_info($curr_session->get_id(), $isFound, $data);
        return $this->response->setJSON([
            'message' => 'Updated information successfully!'
        ]);
    }

    public function purchases() // purchases cũng tĩnh nhưng tĩnh ở một mức nhất định
    {
        $curr_session = new CustomSession(null);
        if($curr_session->isSessionSet())
        {
            
        }
        else
        {
            return redirect() -> to ('/login');
        }
    }

    public function checkout_done_cash()
    {
        $curr_session = new CustomSession(null);
        if($curr_session->isSessionSet())
        return view('checkoutDone', ['protocol' => 'cash']);
        else return redirect() -> to ('/');
    }

    public function await_payment()
    {
        $curr_session = new CustomSession(null);
        if($curr_session->isSessionSet())
        return view('await_payment');
        else return redirect() -> to ('/');
    }

    public function delete_user()
    {
        $id = $this->request->getPost('user_id');
        $cart = new Cart($id);
        $cart->clear();
        $user = new User();
        $user->clear($id);
        $curr_session = new CustomSession();
        $curr_session->delete_session_cookie();
        return 'http://localhost/pepicase/public';
    }
}

