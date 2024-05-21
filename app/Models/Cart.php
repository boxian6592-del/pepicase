<?php
namespace App\Models;
use Config\Database;

class Cart
{
    public $user_id = null;
    public $quantity = null;
    public $total_price = null;
    public function __construct($userID, $protocol = null )
    {
        $user_id = $userID;
        if ($protocol == null) 
        {
            $db = Database::connect();
            $generate = "INSERT INTO cart (User_ID, Total_Amount, Total_Price) VALUES ('{$user_id}',0 ,0)";
            $db->query($generate);
        }
        else 
        {
            $this->user_id = $user_id;
            $db = Database::connect();
        }
    }

    public function add_item($productID, $quantity)
    {
        $db = Database::connect();
        $product = new Product($productID);
        $data = $product->getFullInfo();
        $query = "INSERT INTO cart_details (User_ID, {$productID}, {$quantity}";
    }
}