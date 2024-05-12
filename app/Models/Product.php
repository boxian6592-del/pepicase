<?php
namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'ID';
    protected $name = null;
    protected $price = null;
    protected $productID = null;
    protected $imgPath = null;
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

    public function getFullInfo()
    {
        $data_bundle =
        [
            'name' => $this->name,
            'price'=> $this->price,
        ];
        return $data_bundle;
    }
}