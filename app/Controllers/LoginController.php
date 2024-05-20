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
    private $facebook = null;
    private $fb_helper = null;
    private $googleClient = null;
    function __construct() {
        $this->userModel = new User();
    }

    private function initFacebook() {
        if ($this->facebook === null) {
            $this->facebook = new \Facebook\Facebook([
                'app_id' => getenv('FB_APP_ID'), //for example, 774527684780044
                'app_secret' => getenv('FB_APP_SECRET'), //for example, 85b5b8bc72a01831f09e35984826a215
                'default_graph_version' => 'v5.1'
            ]);
            $this->fb_helper = $this->facebook->getRedirectLoginHelper();
        }
    }

    private function initGoogle() {
        if ($this->googleClient === null) {
            $this->googleClient = new Google_Client();
            $this->googleClient->setClientId(getenv('GOOGLE_CLIENT_ID')); //for example, 940988695510-20vnmeqjd2hrqg717q0clbpmsd0nsq8l.apps.googleusercontent.com
            $this->googleClient->setClientSecret(getenv('GOOGLE_CLIENT_SECRET')); //for example, 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
            $this->googleClient->setRedirectUri(getenv('GOOGLE_REDIRECT_URI')); //for example, http://localhost/pepsicase/loginWithGoogle
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

    public function loginWithFB()
	{
        $this->initFacebook();
		if($this->request->getVar('state')){
			$this->fb_helper->getPersistentDataHandler()->set('state', $this->request->getVar('state'));
		}

		if($this->request->getVar('code')){
            $currentSession = new CustomSession(null);
			if($currentSession->get_field("access_token")){
				$access_token = $currentSession->get_field("access_token"); 
			}else{
				$access_token = $this->fb_helper->getAccessToken();
				$currentSession->set_field("access_token", $access_token);
				$this->facebook->setDefaultAccessToken($currentSession->get_field('access_token'));
			}
			$graph_response = $this->facebook->get('/me?field=name,email', $access_token);
			$fb_user_info = $graph_response->getGraphUser();
            /* usage
            $user_id = $fb_user_info->getId();
            $user_name = $fb_user_info->getName();
            $user_email = $fb_user_info->getEmail();
            ...
            */
			if(!empty($fb_user_info)){
				$userData = array( //for adding to db
					'authid'=>$fb_user_info['id'],
					'profile_pic' => 'http://graph.facebook.com/'.$fb_user_info['id'].'/picture',
					'user_name' => $fb_user_info['name']
                    //add more feilds if needed
                );
				$currentSession->set_field('LoggedUser', $userData);
			}
		}
		return redirect()->to('/');
	}

    public function loginWithGoogle() {
        $this->initGoogle();
        $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if (!isset($token['error'])) {
            $session = new CustomSession(null);
            $this->googleClient->setAccessToken($token['access_token']);
            $session->set_field("AccessToken", $token['access_token'] );
            require_once 'vendor/autoload.php';
            $googleService = new Google_Service_Oauth2($this->googleClient);
            $data = $googleService->userinfo->get(); //email, name, etc
            /*usage:
            $user_id = $data->getId(); 
            $user_name = $data->getName(); 
            $user_email = $data->getEmail(); 
            */
            $userdata = array();
            if(!($this->userModel->isAlreadyRegister($data['id']))){
                $userdata = [ //for adding to db
                    'oauth_id'=>$data['id'], 
                    'email'=>$data['email']
                    //add more feilds if needed
                ];
                $this->userModel->insertUserData($userdata);
            }
            $session->set_field("LoggedUserData", $userdata);
        }
        //Successfull Login
        return redirect()->to('/');
    }
    }
