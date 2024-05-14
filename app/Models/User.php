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
    

    public function __construct($email, $password)
    {
        $db = Database::connect();
        $result = $db->query("SELECT * FROM $this->table WHERE email ='$email' ")->getResult();
        if (empty($result))
        {
            $id = null;
        }
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

    public function check_if_logged_in()
    {
        if (empty($this->id)) return false;
        else return true;
    }
}