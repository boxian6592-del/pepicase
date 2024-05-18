<?php
namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $email = null;
    protected $password = null;
    public $id = null;
    protected $isAdmin = null;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['email', 'password'];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;
    

    public function __construct($email = null, $password = null)
    {
        if ($email === null || $password === null) {}
        else
        {
            $db = Database::connect();
            $result = $db->query("SELECT * FROM $this->table WHERE email ='$email' AND password = '$password' ")->getResult();
            if ($result == null) $id = null;
            else
            {
                $row = $result[0];
                if($row->Password != $password)
                {
                    $id = null;
                }
                else{
                    $this->id = $row->ID;
                    $this->email = $row->Email;
                    $this->password = $row->Password;
                    $this->isAdmin = $row->Is_Admin;
                }
            }
        }
    }

    public function check_if_authorized()
    {
        if (empty($this->id)) return false;
        else return true;
    }

    public function create($mail, $pass)
    {
        $db = Database::connect();
        $result = $db->query("INSERT INTO user (Email, Password, Is_Admin) VALUES ('$mail', '$pass', 0);");
        if ($result !== null)
        {
            $new_user = new User($mail, $pass);
            return $new_user->id;
        }
        else return 0;
    }

    public function check_email($mail)
    {
        $db = Database::connect();
        $result = $db->query("SELECT * FROM user WHERE Email = '$mail' ")->getResult();
        return ($result !== []);
    }
}