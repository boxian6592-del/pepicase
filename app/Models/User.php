<?php
namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $email = null;
    protected $password = null;
    protected $remember_token = null;


    public function checkCreds($email, $password)
    {
        $db = Database::connect();
        $result = $db->query("SELECT * FROM $this->table WHERE EMAIL = $email")->getResult();
        if (empty($result)) return false;
        else if($result[0]->password != $password) return false;
        else return true;
    }
    public function __construct($id = null)
    {
        if($id != null)
        {
            $db = Database::connect();
            $result = $db->query("SELECT * FROM $this->table WHERE $this->primaryKey = ".$id)->getResult();
            if (empty($result)) ;
            else
            {
                $row = $result[0];
                $this->productID = $row->ID;
                $this->price = $row->Price;
                $this->name = $row->Name;
                $this->imgPath = $row->Image;
            }
        }
    }

}