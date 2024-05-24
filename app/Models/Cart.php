<?php
namespace App\Models;
use Config\Database;

class Cart
{
    public $user_id = null;
    public $db = database::connect();
    // các giá trị như tổng số lượng, tổng giá trị giỏ hàng đều sẽ được database chạy trigger để tự tính hết
    public function __construct($userID) // hàm khởi tạo đối tượng cart
    {
        $this->user_id = $userID; // set user_id của đối tượng = đối số $userID
        $stmt = $this->db->mysqli->prepare("SELECT * FROM cart WHERE User_ID = ?");
        $stmt->bind_param("iss", $this->user_id);
        // tiến hành kiểm tra giỏ hàng này đã có tồn tại chưa
        $stmt->execute();
        $result = $stmt->get_result();
        if (empty($result)) // nếu chưa tồn tại, tiến hành khởi tạo
        {
            $stmt1 = $this->db->mysqli->prepare("INSERT INTO cart (User_ID, Total_Amount, Total_Price) VALUES ('? ,0 ,0)");
            $stmt1->bind_param("iss", $this->user_id);
            $stmt1->execute();   
        }
    }

    public function add_item($productID, $quantity, $size)
    {
        //kiểm tra xem trong cart đã có item loại đó size đó chưa
        $check = $this->db->mysqli->prepare("SELECT * FROM cart_details WHERE User_ID = ? AND Product_ID = ? and Size = ?");
        $check->bind_param("iss", $this->user_id, $productID, $size);
        $check->execute();
        $result = $check->get_result();
        //kiểm tra xem trong cart đã có item loại đó size đó chưa
        if (empty($result)) { // nếu k tìm thấy hàng nào thì insert item đó
            // query insert
            $stmt = $this->db->mysqli->prepare("INSERT INTO cart_details (User_ID, Product_ID, Size, Quantity) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iss", $this->user_id, $productID, $quantity, $size);
            if($stmt->execute()) return true; else return false;
            // query insert
        }
        else{ // nếu có tìm thấy, thay vì thêm sẽ update quantity của item đó
            $row = $result->fetch_assoc();
            $new_quantity = $row['quantity'] + $quantity; // lấy giá trị cũ cộng thêm quantity mới
            if($this->updateCartItem($new_quantity, $productID, $size)) return true; else return false;
        }
    }

    public function delete_item($productID, $size)
    {
        $db = Database::connect();
        $stmt = $this->db->mysqli->prepare("DELETE FROM cart_details WHERE User_ID = ? AND Product_ID = ? AND Size = ?");
        $stmt->bind_param("iss", $this->user_id, $productID, $size);
        $stmt->execute();
        $result = $stmt->affected_rows();
        if ($result == 0) 
        return false;
        else return true;
    }
    public function updateCartItem($productID,$size,$newQuantity)
    {
        $builder = $this->db->table('cart_details');
        $data = [
            'Quantity' => $newQuantity
        ];
        $builder->where('User_ID', $this->user_id);
        $builder->where('Product_ID', $productID);
        $builder->where('Size', $size);
        $result = $builder->update($data);
        if ($result > 0) return true;
        else return false;
    }
}