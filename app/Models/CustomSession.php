<?php
namespace App\Models;

use CodeIgniter\Services;
use CodeIgniter\Session\Session;
use CodeIgniter\Encryption\Encryption;

class CustomSession
{
    public function encrypt($data)
    {
        $key = 'your-encryption-key'; // Replace with your encryption key
        $cipher = 'AES-256-CBC';
        $ivLength = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivLength);
        $encrypted = openssl_encrypt($data, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $result = base64_encode($iv . $encrypted);
        return $result;
    }

    public function decrypt($encryptedData)
    {
        $key = 'your-encryption-key'; // Replace with your encryption key
        $cipher = 'AES-256-CBC';
        $ivLength = openssl_cipher_iv_length($cipher);
        $encryptedData = base64_decode($encryptedData);
        $iv = substr($encryptedData, 0, $ivLength);
        $encrypted = substr($encryptedData, $ivLength);
        $decrypted = openssl_decrypt($encrypted, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        return $decrypted;
    }

    public function __construct($id)
    {
        if ($id === null) {
            \Config\Services::session();
        }
        else
        {
            $session = \Config\Services::session();
            helper('cookie');
            $identifier = $this->encrypt($id);
            $session->set('identifier', $id);
            set_cookie('id', $identifier, 3600 * 12);
        }
    }

    public function isSessionSet()
    {
        $session = \Config\Services::session();
        return ($session->get('identifier') !== null);
    }

    public function get_id()
    {
        $session = \Config\Services::session();
        return $session->get('identifier');
    }

    public function fetch_session_cookie()
    {
        helper('cookie');
        $cookie = get_cookie('id');
        if ($cookie === null) {
            return null;
        }
        else
        {
            $identifier = $this->decrypt($cookie);
            delete_cookie('id');
            $this->__construct($identifier);
            return $identifier;
        }     
    }
    
    public function delete_session_cookie()
    {
        helper('cookie');
        delete_cookie('id');
        $session = \Config\Services::session();
        $session->destroy();
    }

    public function set_field($field, $value)
    {
    $session = \Config\Services::session();
    $session->set($field, $value);
}
public function get_field($field)
    {
    $session = \Config\Services::session();
    return $session->get($field);
}
}