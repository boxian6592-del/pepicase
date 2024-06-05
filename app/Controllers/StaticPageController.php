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
            $userModel = new User();
            $purchases = $userModel->getPurchases($curr_session->get_id());
            if ($purchases == null) {
                $purchases = [];
                return view('purchases', ['purchases' => $purchases]);
            }
            return view('purchases', ['purchases' => $purchases]);
        }
        else {
            return view('login');
        }
    }

    public function DeletePurchase($invoiceId) {
        $curr_session = new CustomSession(null);
        if ($curr_session->isSessionSet()) {
            $userModel = new User();
            $userModel->deletePurchase($invoiceId);
                $purchases = $userModel->getPurchases($curr_session->get_id());
            if ($purchases == null) {
                $purchases = [];
            }
            
            return view('purchases', ['purchases' => $purchases]);
        }
    }
    
}

