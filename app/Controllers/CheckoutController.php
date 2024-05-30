<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\CustomSession;
use App\Models\Cart;
use Config\Database;
use App\Models\User;

class CheckoutController extends BaseController
{
    function index()
    {
        $curr_session = new CustomSession(null);
        if ($curr_session->isSessionSet())
        {
            $curr_cart = new Cart($curr_session->get_id());
            $cart_items = $curr_cart->get();
            if (empty($cart_items)) return redirect() -> to ('/user/cart');
            else 
            {
                return view('checkout', [
                    'cart_items' => json_encode($cart_items),
                    'total_price' => $curr_cart->get_price()
                ]);
            }
        }
        else return redirect() -> to ('/login');
    }
    
    function check_discount()
    {
        $code = $this->request->getPost('voucher_code');
        $db = Database::connect();
        $query = "SELECT Discount_Value 
                  FROM voucher 
                  WHERE Name = '{$code}' 
                    AND End_Date > CURRENT_DATE
                    AND CURRENT_DATE > Start_Date
                    AND Current_Usage < Max_Usage";
        $result = $db->query($query)->getResult();
    
        if (!empty($result)) {
            $discount_value = $result[0]->Discount_Value;
        } else {
            $discount_value = 0;
        }
    
        $response = [
            'discount_value' => $discount_value
        ];
    
        $this->response->setContentType('application/json');
        return $this->response->setBody(json_encode($response));
    }

    function vnpay_generate()
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        /**
         * 
         *
        * @author CTT VNPAY
        */
        require_once("C:\xampp\htdocs\pepicase\app\Config\Config_VNPAY.php");

        $vnp_TxnRef = rand(1,10000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $_POST['amount']; // Số tiền thanh toán
        $vnp_Locale = $_POST['language']; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = $_POST['bankCode']; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" + $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        header('Location: ' . $vnp_Url);
        die();
        
    }    
}