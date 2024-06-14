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
        $db = \Config\Database::connect();
        $builder = $db->table('delivery');
        $builder->set('Status', $status);
        $builder->where('Invoice_ID', $invoice_id);
        $builder->update();
        $affectedRows = $db->affectedRows();

        if($status == 2) {
            $builder = $db->table('invoice');
            $builder->set('Status', 1);
            $builder->where('ID', $invoice_id);
            $builder->update();
            $affectedRows += $db->affectedRows();
        }

        return $affectedRows > 0;
    }

    function get_deliveries()
    {
        $db = Database::connect();
        $result = $db->query("SELECT * FROM delivery WHERE STATUS NOT IN (2, -1)")->getResult();
        if(empty($result)) return [];
        else return $result;
    }

    function get_all_invoices()
    {
        $db = Database::connect();
        $builder = $db->table('delivery');
        $builder->select('delivery.Invoice_ID, CONCAT(delivery.First_Name, " ", delivery.Last_Name) as Customer, user.Email, 
        delivery.Shipping_Method as Method, invoice.Order_date as Date, invoice.Total_Price as Total, 
        invoice.Method as Payment, delivery.Status, delivery.Phone, delivery.Country, CONCAT(delivery.Address, ", ",delivery.City) as Address');
        $builder->join('invoice', 'delivery.Invoice_ID = invoice.ID');
        $builder->join('user', 'invoice.User_ID = user.ID');
        $builder->whereNotIn('delivery.Status', [2, -1]);
        $query = $builder->get();
        return $query->getResult();
    }
    //delivery space



    //product space
    function get_all_products()
    {
        $db = Database::connect();
        $result = $db->query("SELECT * FROM product")->getResult();
        return $result;
    }

    function delete_product($product_id)
    {
        $db = Database::connect();
        $db->query("UPDATE product SET IsDeleted = 1 WHERE ID = '{$product_id}'");
        $db->query("DELETE FROM cart_details WHERE Product_ID = '{$product_id}'");
    }
    //product space

    function get_invoice_details($invoice_id)
    {
        $db = Database::connect();
        $query = "SELECT invoice_details.Name_Product as Name, invoice_details.Size as Size, product.ID as ID,
        invoice_details.Quantity as Quantity, invoice_details.Price as Price, product.Image as Image
        FROM invoice_details INNER JOIN product ON invoice_details.Product_ID = product.ID WHERE Invoice_ID = '{$invoice_id}';";
        $result = $db->query($query)->getResult();
        return $result;
    }

    function get_delivery_status($invoice_id)
    {
        $db = Database::connect();
        $result = $db->query("SELECT Status FROM delivery WHERE Invoice_ID = '{$invoice_id}'")->getResult();
        return $result[0]->Status;
    }

    function add_product_to_database($name, $price, $quantity, $path, $color, $collection)
    {
        $db = Database::connect();
        $db->query("INSERT INTO product(Name, Price, Description, Image, QuantityInStock, IsInStock, IsDeleted, Color_ID, Collect_ID)
                VALUES ('{$name}', $price, 'Added after', '$path', '{$quantity}', 1, 0, {$color}, {$collection})");
        $affectedRows = $db->affectedRows();
        if ($affectedRows > 0) {
            // The product was added successfully
            return true;
        } else {
            // There was an error adding the product
            return false;
        }
    }
}

