<?php

namespace App\Controllers;

use App\Models\CustomSession;
use App\Models\User;
use Google\Service\Oauth2 as Google_Service_Oauth2;
use Facebook\Facebook as Facebook;
 
class LoginController extends BaseController
{
    private $userModel = null;
    private $facebook = null;
    private $fb_helper = null;
    private $googleClient = null;
    function __construct()
    {
        if ($this->facebook === null) {
            require 'C:\xampp\htdocs\pepicase\app\Libraries\vendor\autoload.php';
            $this->facebook = new \Facebook\Facebook([
                'app_id' => '774527684780044', //for example, 774527684780044
                'app_secret' => '5653abdd091dd9ca04afa8a7dbb16f0d', //for example, 85b5b8bc72a01831f09e35984826a215
                'default_graph_version' => 'v5.1'
            ]);
            $this->fb_helper = $this->facebook->getRedirectLoginHelper();
        }

        $this->userModel = new User();
        if ($this->googleClient === null) {
            require 'C:\xampp\htdocs\pepicase\app\Libraries\vendor\autoload.php';
            $this->googleClient = new \Google_Client();
            $this->googleClient->setClientId('940988695510-20vnmeqjd2hrqg717q0clbpmsd0nsq8l.apps.googleusercontent.com'); //for example, 940988695510-20vnmeqjd2hrqg717q0clbpmsd0nsq8l.apps.googleusercontent.com
            $this->googleClient->setClientSecret('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'); //for example, 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
            $this->googleClient->setRedirectUri('http://localhost/pepicase/public/loginWithGoogle'); //for example, https://localhost/pepicase/loginWithGoogle
            $this->googleClient->addScope("email");
            $this->googleClient->addScope("profile");
        }
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
        if ($this->validate($rules)) {
            if ($user->id != null) {
                new CustomSession($user->id);
                return redirect()->to('/');
            } else {
                $message = [
                    'msg' => 'Wrong email or password!',
                ];
                return view('login', $message);
            }
        } else {
            $data['validation'] = $this->validator;
            return view('login', $data);
        }
    }

    public function logout()
    {
        $currentSession = new CustomSession(null);
        $currentSession->delete_session_cookie();
        return redirect()->to('/');
    }  


    public function index()
    {
        $curr_session = new CustomSession(null);
        if ($curr_session->isSessionSet()) return redirect() -> to('/');

        $fb_permission = ['email'];
        $data['fb_btn'] = $this->fb_helper->getLoginUrl('http://localhost/pepicase/public/loginWithFacebook?', $fb_permission);
        $data['googleButton'] = $this->googleClient->createAuthUrl();
        return view('login', $data);
    }

/*
    public function loginWithFB()
    {
        if ($this->request->getVar('state')) {
            $this->fb_helper->getPersistentDataHandler()->set('state', $this->request->getVar('state'));
        }

        if ($this->request->getVar('code')) {
            if (session()->get("access_token")) {
                $access_token = session()->get("access_token");
            } else {
                $access_token = $this->fb_helper->getAccessToken();
                session()->set("access_token", $access_token);
                $this->facebook->setDefaultAccessToken(session()->get('access_token'));
            }
            $graph_response = $this->facebook->get('/me?fields=name,email', $access_token);
            $fb_user_info = $graph_response->getGraphUser();
            if (!empty($fb_user_info)) {
                $userData = array(
                    'user_name' => $fb_user_info['name'],
                    'user_email' => $fb_user_info['email'],
                    'authid' => $fb_user_info['id'],
                );
                session()->set('LoggedUser', $userData);
            }
            return redirect()->to('/');
        }
    } */

    public function loginWithFB()
	{
		if($this->request->getVar('state')){
			$this->fb_helper->getPersistentDataHandler()->set('state', $this->request->getVar('state'));
		}

		if($this->request->getVar('code')){
			if(session()->get("access_token")){
				$access_token = session()->get('access_token');
			}else{
                $access_token = "EAALAbceFIAwBO8sa1cdjis2Pgo3xIjhmEL0dK57b1IenFFFY8jq8ZC8NSiYYTMm5y6MazUQ0VJUp73W4MF01XNt3t65OzjBenAJAFsIAsv4ZCasQINPa5wgTsZBqht39QlFJ6rZAGh1ZAR7hxfzB2GQ9oYahGs9ydLRneiZA2djraqun2bWX0EyJBD4g1aJe3yGBZCOKJvwIqTkZBPggPYu1ZCZB2jPAZCmxVpBCsrFv1eExNlTGP2kCJiBgbTnyVwb7AZDZD";
				session()->set("access_token", $access_token);
				$this->facebook->setDefaultAccessToken(session()->get('access_token'));
			}
			$graph_response = $this->facebook->get('/me?fields=name,email', $access_token);
			$fb_user_info = $graph_response->getGraphUser();
			if(!empty($fb_user_info)){
				$fbdata = array(
					'authid'=>$fb_user_info['id'],
					'profile_pic' => 'http://graph.facebook.com/'.$fb_user_info['id'].'/picture',
					'user_name' => $fb_user_info['name']
				);

				//here you can insert user data in database
				
				session()->set('LoggedUser', $fbdata);
			}
		}else{
			session()->setFlashData('error', 'Something Wrong');
			return redirect()->to(base_url());
		}
		return redirect()->to(base_url().'/profile');
	}
    /*

    public function logout()
	{
		if(session()->has('LoggedUser')){
			session()->remove('LoggedUser');
			session()->setFlashData('success', 'Logout Successful');
			return redirect()->to(base_url());
		}else{
			session()->setFlashData('error', 'Failed to Logout, Please Try again...');
			return redirect()->to(base_url());
		}
	} */

    public function loginWithGoogle()
    {
        $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if (!isset($token['error'])) {
            $this->googleClient->setAccessToken($token['access_token']);
            session()->set("AccessToken", $token['access_token']);
            $googleService = new \Google\Service\Oauth2($this->googleClient);
            $data = $googleService->userinfo->get();
            $userdata = array();
            $userModel = new User($data['id']);
            if ($userModel->check_if_authorized()) {
                $userdata = [
                    'First_Name' => $data['givenName'],
                    'Last_Name' => $data['familyName'],
                    'email' => $data['email'],
                ];
                $userModel->updateUserData($userdata, $data['id']);
                new CustomSession($userModel->id);
                //session()->set("LoggedUserData", $userdata);
                return redirect()->to('/');
            } else {
                //new User want to Login
                $userdata = [
                    'oauth_id' => $data['id'],
                    'First_Name' => $data['givenName'],
                    'Last_Name' => $data['familyName'],
                    'email' => $data['email'],
                ];
                $userModel->create($data['email'], 'password', $data['id']);
                $userModel = new User($data['id']);
                //session()->set("LoggedUserData", $userdata);
                return redirect()->to('/');
            }
        } else {
            session()->setFlashData("Error", "Something went Wrong");
            return redirect()->to('/login');
        }
    }
}
