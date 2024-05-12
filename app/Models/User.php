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
    protected $isAdmin = null;

    public $id = null;

    public function __construct($email, $password)
    {
        $db = Database::connect();
        $result = $db->query("SELECT * FROM $this->table WHERE EMAIL = $email")->getResult();
        if (empty($result));
        else
        {
            $row = $result[0];
            $this->id = $row->ID;
            $this->email = $row->Email;
            $this->password = $row->Password;
            $this->isAdmin = $row->Is_Admim;
        }
    }

    public function check_if_logged_in()
    {
        if (empty($this->id)) return false;
        else return true;
    }
}