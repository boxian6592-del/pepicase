<?php

namespace App\Controllers;
use App\Models\CustomSession;
use App\Models\User;
use App\Models\Session;
use CodeIgniter\Services;

class LoginController extends BaseController
{
    public function login() // hàm chạy khi người dùng ấn "Login"
    {
        // lấy thông tin từ 2 thanh mail vs pass từ login
        $email = $this->request->getPost("email");
        $password = $this->request->getPost("password");

        // luật về email
        $rules = [
            'email' => 'valid_email',
        ];

        $data = [
            'validation' => '',
        ];
        // luật về email

        $user = new User($email, $password); //gọi hàm khởi tạo User
        if($this->validate($rules)) // nếu thỏa luật thì qua chốt 1
        {
            if ($user->id != null) { // nếu sau khởi tạo user->id khác null thì đích thị là user đó
                $new_session = new CustomSession($user->id);
                $result = $new_session->get_previous_url();
                if($result == null) return redirect() -> to('/');
                else return redirect() -> to ($result);
            }
            else // nếu không thì không phải, return view login với data tạm là họ đã sai 
            {
                $message = [
                    'msg' => 'Wrong email or password!',
                ];
                return view('login', $message);
            } 
        }
        
        else // không thỏa luật email thì sẽ báo họ phải nhập email đúng
        {
            $data['validation'] = $this->validator;
            return view('login', $data);
        }
    }

    public function logout() // sau khi ấn nút Log Out
    {
        $current_session = new CustomSession(null); // khởi tạo new CustomSession để chỉ chạy các function
        $current_session->delete_session_cookie(); // gọi hàm xóa session + xóa cookie
        return redirect() -> to('/'); // redirect về trang chủ
    }


    public function index() // khi vào trang login
    {
        $curr_session = new CustomSession(null); // khởi tạo new CustomSession để chỉ chạy các function
        if ($curr_session->isSessionSet()) return redirect() -> to('/'); // nếu đã có session (tương đương đã login) thì redirect về trang chủ
        else 
        {
            $previousUrl = $this->request->getServer('HTTP_REFERER');
            if (strpos($previousUrl, '/pepicase/public/product/') === 0)
                $curr_session->set_previous_url((string)$previousUrl);
            return view('login'); // nếu session chưa có => user chưa đăng nhập => cho vào trang
        }
    }
}