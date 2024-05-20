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
        parent::__construct();
        if($id != null)
        {
            $db = Database::connect();
            $result = $db->query("SELECT * FROM $this->table WHERE $this->primaryKey = ".$id)->getResult();
            if (empty($result))
            {
                $this->productID = "not_found";
            }
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

    public function check_if_found()
    {
        if ($this->productID == "not_found") return false;
        else return true;
    }

    public function check_favorited($user_id)
    {
        $db = Database::connect();
        $result = $db->query("SELECT * FROM wishlist where Product_ID = '$this->productID' and  User_ID = ".$user_id)->getResult();
        if (empty($result)) return false;
        else return true;
    }

    public function getFullInfo()
    {
        $data_bundle =
        [
            'id' => $this->productID,
            'name' => $this->name,
            'price'=> $this->price,
            'path' => $this->imgPath,
        ];
        return $data_bundle;
    }
    public function getProducts($limit = 6)
    {
        return $this->limit($limit)->find();
    }
    public function filterProducts($collections, $materials, $colors)
    {
        $db = Database::connect();
        $builder = $db->table($this->table);

        if (!empty($collections)) {
            $builder->whereIn('Collect_ID', $collections);
        }
        if (!empty($materials)) {
            // Assuming materials filtering logic goes here
            // Example: $builder->whereIn('Material_ID', $materials);
        }
        if (!empty($colors)) {
            $builder->whereIn('Color_ID', $colors);
        }

        return $builder->get()->getResultArray();
    }
    
}
