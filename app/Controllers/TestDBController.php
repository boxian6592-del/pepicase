<?php

namespace App\Controllers;
use App\Models\CustomSession;
use App\Models\User;

class TestDBController extends BaseController
{

public function Testdb()
    {
        $userModel = new User(); //Chưa thấy hàm lấy Id của Current User theo session_id
            $testdb1 = $userModel->testdb();
            return view('testdb', ['data' => $testdb1]);
    }
}