<?php
namespace App\Models;
use Config\Database;
use App\Models\Cart;

class Invoice_Delivery
{
    function generate_invoice_via_cash($user_id, $total_price, $actual_price, $voucher_id, $note)
    {
        $db = Database::connect();
        $query = "INSERT INTO invoice (User_ID, Voucher_ID, Total_Price, Actual_Price, Status, Note)
                    VALUES ({$user_id},{$voucher_id},{$total_price},{$actual_price}, 0, '{$note}')";
        $db->query($query);
        $new_invoice_id = $db->insertID();
        $cart = new Cart($user_id);
        $item_arrays = $cart->get();
        foreach ($item_arrays as $item) {
            /*
            echo $item['Image'] . "\n";
            echo $item['Name'] . "\n";
            echo $item['Price'] . "\n";
            echo $item['Product_ID'] . "\n";
            echo $item['Quantity'] . "\n";
            echo $item['Size'] . "\n";
            echo $item['User_ID'] . "\n\n";
            */

            $cart_details_query = "INSERT INTO invoice_details (Invoice_ID, Product_ID, Name_Product, Quantity, Price, Size) 
                                    VALUES ({$new_invoice_id}, {$item->Product_ID}, '{$item->Name}', {$item->Quantity}, {$item->Price}, '{$item->Size}')";
            $db->query($cart_details_query);
        }
        $cart->clear();
    }
}