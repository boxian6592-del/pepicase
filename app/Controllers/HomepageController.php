<?php

namespace App\Controllers;
use App\Models\CustomSession;

class HomepageController extends BaseController
{
    public function index()
    {
        $current_session = new CustomSession(null);
        $data = [ 'id' => null ];
        if($current_session->isSessionSet())
        {
            $data = [ 'id' => $current_session->get_id() ];
        }
        return view('index', $data);
    }

    public function testing(): string
    {
        return view('signup_new');
    }
}
