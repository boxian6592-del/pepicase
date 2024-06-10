<?php
namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class Admin extends User
{
    function check_admin($id = null)
    {
        if($id !== null)
        {
            $db = Database::connect();
            $query = "SELECT * FROM User WHERE ID = '{$id}' AND Is_Admin = '1'";
            $results = $db->query($query)->getResult();
            if(count($results) > 0) return true;
            else return false;
        }
        else if ($id == null)
        {
            if($this->isAdmin == 1)
            return true;
            else return false;
        }
    }

    function check_secret()
    {
    
    }
}

