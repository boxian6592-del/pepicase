<?php

namespace App\Controllers;
use App\Models\CustomSession;
use App\Models\User;
use Google_Client;
use Google\Service\Oauth2 as Google_Service_Oauth2;

require_once 'vendor/autoload.php';

class LoginController extends BaseController
{
    private $userModel = null;
    private $googleClient = null;
    function __construct() {
        $this->userModel = new User();
        require_once APPPATH . 'Libraries/vendor/autoload.php';
        $this->googleClient = new Google_Client();
        $this->googleClient->setClientId('940988695510-20vnmeqjd2hrqg717q0clbpmsd0nsq8l.apps.googleusercontent.com');
        $this->googleClient->setClientSecret('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');
        $this->googleClient->setRedirectUri('http://localhost/pepsicase/loginWithGoogle');
        $this->googleClient->addScope("email");
        $this->googleClient->addScope("profile");


    }
    public function login()
    {
        $email = $this->request->getPost("email");
        $password = $this->request->getPost("password");

        $rules = [
            'email' => 'valid_email',
        ];

        $data = [
            'validation' => '',
        ];

        $user = new User($email, $password);
        if($this->validate($rules))
        {
            if ($user->id != null) {
                new CustomSession($user->id);
                return redirect() -> to('/');
            }
            else
            {
                $message = [
                    'msg' => 'Wrong email or password!',
                ];
                return view('login', $message);
            } 
        }
        else 
        {
            $data['validation'] = $this->validator;
            return view('login', $data);
        }
    }

    public function logout()
    {
        $currentSession = new CustomSession(null);
        $currentSession->delete_session_cookie();
        return redirect() -> to('/');
    }


    public function index()
    {
        $curr_session = new CustomSession(null);
        if ($curr_session->isSessionSet()) return redirect() -> to('/');
        else return view('login');
    }

    public function loginWithGoolge() {
        $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if (!isset($token['error'])) {
            $session = new CustomSession(null);
            $this->googleClient->setAccessToken($token['access_token']);
            $session->set_field("AccessToken", $token['access_token'] );
            require_once 'vendor/autoload.php';
            $googleService = new Google_Service_Oauth2($this->googleClient);
            $data = $googleService->userinfo->get(); //email, name, etc
            $userdata = array();
            if(!($this->userModel->isAlreadyRegister($data['id']))){
				//new User login
				$userdata = [
					'oauth_id'=>$data['id'],
                    'email'=>$data['email']
				];
				$this->userModel->insertUserData($userdata);
			}
			$session->set_field("LoggedUserData", $userdata);
        }
		//Successfull Login
		return redirect()->to('/');
	}



}