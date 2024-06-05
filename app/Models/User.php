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
    protected $oauth_id = null;
    protected $isAdmin = null;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['email', 'password', 'Google_ID'];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    
    public function __construct($email = null, $password = null, $oauth_id = null )
    {
        if (!($email && $password && $oauth_id)) {}
        if ($oauth_id !== null) 
        {
            $db = Database::connect();
            $result = $db->query("SELECT * FROM $this->table WHERE Google_ID = '$oauth_id'")->getResult();            
            $row = $result[0];
            $this->id = $row->ID;
            $this->email = $row->Email;
            $this->password = $row->Password;
            $this->isAdmin = $row->Is_Admin;           
        }
        else
        {
            $db = Database::connect();
            $result = $db->query("SELECT * FROM $this->table WHERE email ='$email' AND password = '$password' ")->getResult();
            if ($result == null) $id = null;
            else
            {
                $row = $result[0];
                if($row->Password != $password)
                {
                    $this->id = null;
                    $this->oauth_id = null;
                }
                else{
                    $this->id = $row->ID;
                    $this->email = $row->Email;
                    $this->password = $row->Password;
                    $this->isAdmin = $row->Is_Admin;
                    $this->oauth_id = $row->Google_ID;
                }
            }
        }
    } 

    public function check_if_authorized()
    {
        if (empty($this->id) && empty($this->oauth_id)) return false;
        else return true;
    }


    public function create($mail, $pass, $oauth_id = null)
    {
        $db = Database::connect();
        $result = $db->query("INSERT INTO user (Email, Password, Google_ID, Is_Admin) VALUES ('$mail', '$pass', '$oauth_id', 0);");
        if ($result !== null)
        {
            $new_user = new User($mail, $pass, $oauth_id);
            return $new_user->id;
        }
        else return 0;
    } 

    public function check_email($mail)
    {
        $db = Database::connect();
        $result = $db->query("SELECT * FROM user WHERE Email = '$mail' ")->getResult();
        return ($result !== []);
    }

    public function get_email($id)
    {
        $db = Database::connect();
        $result = $db->query("SELECT Email FROM user WHERE ID = '{$id}' ")->getRow();
        return $result->Email;
    }

    public function fetch_wishlist($id)
    {
        $db = Database::connect();
        $fetch_query = "SELECT Product_ID, Name, Price, Image from wishlist 
        LEFT JOIN product on wishlist.Product_ID = product.ID WHERE User_ID = {$id};";
        $wishlist_items = $db->query($fetch_query)->getResult();

        if (empty($wishlist_items)) return [];
        else return $wishlist_items;
    }

    public function testdb() {
        $db = Database::connect();
        $sql = "SELECT * from cart";
        $query = $db->query($sql);
        if (!$query) {
            echo "Error: " . $db->error();
            return false;
        }
        $result = $query->getResult();
        if (empty($result)) return false;
        return $result;
    }

    public function getPurchases($id) {
        $db = Database::connect();
        $sql = "
        SELECT order_date, invoice.id, product_id, name_product, price, quantity
        FROM invoice_details
        INNER JOIN invoice ON invoice_details.invoice_id = invoice.id
        WHERE User_ID = ?
    ";
    $result = $db->query($sql, [$id])->getResultArray();
    if (empty($result)) return false;
    return $result;
    }

    public function isAlreadyRegister($authid){ //check đã đăng nhập oauth_id chưa
    return $this->where('oauth_id', $authid)->first() !== null;
	}
	public function updateUserData($userdata, $authid){ //cập nhật thông tin
        $db = Database::connect();
        $this->update(['oauth_id' => $authid], $userdata);
        $result = $db->query("INSERT INTO user_info (Email, Password, oauth_id, Is_Admin) VALUES ('$mail', '$pass', '$oauth_id', 0);");
        if ($result !== null)
        {
            $new_user = new User($mail, $pass, $oauth_id);
            return $new_user->id;
        }
        else return 0;

		//$this->db->table("user")->where(['oauth_id'=>$authid])->update($userdata);
	}
	public function insertUserData($userdata){ //thêm thông tin
        $this->insert($userdata);
	}

    public function update_info($id, $isFound, $object)
    {
        $db = Database::connect();
        $sql = "SELECT * FROM user_info WHERE User_ID = {$id}";
        $result = $db->query($sql)->getResult();
        if(empty($result))
        {
            $add = "INSERT INTO user_info (User_ID, First_Name, Last_Name, Area_Code, Phone, Address, Apartment, Country, City, Zipcode)
                    VALUES ('{$id}','{$object->firstName}','{$object->lastName}','{$object->areaCode}','{$object->phone}','{$object->address}'
                    ,'{$object->apartment}','{$object->country}','{$object->city}','{$object->zipCode}')";
            $db->query($add);
        }
        else
        {
            $update = "UPDATE user_info
                        SET First_Name = '{$object->firstName}',
                            Last_Name = '{$object->lastName}',
                            Area_Code = '{$object->areaCode}',
                            Phone = '{$object->phone}',
                            Address = '{$object->address}',
                            Apartment = '{$object->apartment}',
                            Country = '{$object->country}',
                            City = '{$object->city}',
                            Zipcode = '{$object->zipCode}'
                        WHERE User_ID = '{$id}'";
            $db->query($update);
        }
    }

    public function get_info($id)
    {
        $db = Database::connect();
        $sql = "SELECT * FROM user_info WHERE User_ID = {$id}";
        $result = $db->query($sql)->getResult();
        if(!empty($result)) return $result;
        else return false;
    }

    public function add_comment($id ,$product_id, $comment, $stars)
    {
        $db = Database::connect();
        $query = $db->table('feedback')
                ->insert([
                    'User_ID' => $id,
                    'Product_ID' => $product_id,
                    'Comment' => $comment,
                    'Star' => $stars
                ]);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function clear($id)
    {
        $db = Database::connect();
        $clear_info = "DELETE FROM user_info WHERE User_ID = '{$id}'";
        $db->query($clear_info);
        $clear_user = "DELETE FROM user WHERE ID = '{$id}'";
        $db->query($clear_user);
    }
}