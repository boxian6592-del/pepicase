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

    function check_secret($secret)
    {
        if ($secret == "banana") return true;
        else return false;
    }

    //admin space
    function get_admins()
    {
        $db = Database::connect();
        $result = $db->query("SELECT Email, Phone, Password FROM User WHERE Is_Admin = 1")->getResult();
        if(empty($result)) return [];
        else return $result;
    }

    function create_admin($mail, $pass)
    {
        $db = Database::connect();
        $outcome = $db->query("INSERT INTO user (Email, Password, Is_Admin) VALUES ('{$mail}', '{$pass}', 1);");
        $outcome = $db->query("SELECT Is_Admin FROM user WHERE Email = '{$mail}' AND Is_Admin = 1")->getResult();
        if($outcome[0] == 1) return true;
        else return false;
    }

    function edit_admin($initial_mail, $mail, $pass, $phone)
    {
        $db = Database::connect();
        $db->query("UPDATE user SET Email = '{$mail}' AND Password = '{$pass}' WHERE Email = '{$initial_mail}' AND Is_Admin = 1");
        $outcome = $db->query("SELECT * FROM user WHERE Email = '{$mail}' AND Is_Admin = 1")->getResult();
        if(!empty($outcome)) return true;
        else return false;
    }
    //admin space


    //delivery space
    function set_delivery_status($invoice_id, $status)
    {
        //-1 là cancelled, 0 là pending, 1 là shipping, 2 là delivered
        $db = Database::connect();
        $db->query("UPDATE delivery SET Status = {$status} WHERE Invoice_ID = '{$invoice_id}'");
        if($status == 2) $db->query("UPDATE invoice SET Status = 1 WHERE ID = '{$invoice_id}'");
        $result = $db->query("SELECT * FROM delivery WHERE Invoice_ID = '{$invoice_id}' AND Status = {$status}")->getResult();
        if(!empty($result)) return true;
        else return false;
    }

    function get_deliveries()
    {
        $db = Database::connect();
        $result = $db->query("SELECT * FROM delivery WHERE STATUS NOT IN (2, -1)")->getResult();
        if(empty($result)) return [];
        else return $result;
    }
    //delivery space

    //product space
    function get_all_products()
    {
        $db = Database::connect();
        $result = $db->query("SELECT * FROM product")->getResult();
        return $result;
    }

    function remove_product($product_id)
    {
        $db = Database::connect();
        $db->query("DELETE FROM product WHERE ID = '{$product_id}'")->getResult();

    }
    //product space
}

