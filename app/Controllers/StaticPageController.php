<?php

namespace App\Controllers;
use App\Models\CustomSession;
use App\Models\User;

class StaticPageController extends BaseController
{
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

    public function Purchases()
    {
        $curr_session = new CustomSession(null);
        if ($curr_session->isSessionSet()) {
            $userModel = new User(); //Chưa thấy hàm lấy Id của Current User theo session_id
            $purchases = $userModel->getPurchases($userModel->id);
            return view('purchases', $purchases);
        }
        else {
            return view('login');
        }
    }
}

