<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\CustomSession;
use App\Models\Cart;
use Config\Database;
use App\Models\User;
use App\Models\Invoice_Delivery;

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
                $user = new User();
                $info = $user->get_info($curr_session->get_id());
                if($info == false)
                {
                    return view('checkout', [
                        'cart_items' => json_encode($cart_items),
                        'total_price' => $curr_cart->get_price()
                    ]);    
                }
                else
                {
                    return view('checkout', [
                        'cart_items' => json_encode($cart_items),
                        'total_price' => $curr_cart->get_price(),
                        'info' => $info,
                    ]);    
                }
            }
        }
        else return redirect() -> to ('/login');
    }
    
    function check_discount()
    {
        $code = $this->request->getPost('voucher_code');
        $db = Database::connect();
        $query = "SELECT Discount_Value, ID
                  FROM voucher 
                  WHERE Name = '{$code}' 
                    AND End_Date > CURRENT_DATE
                    AND CURRENT_DATE > Start_Date
                    AND Current_Usage < Max_Usage";
        $result = $db->query($query)->getResult();
    
        if (!empty($result)) {
            $discount_value = $result[0]->Discount_Value;
            $voucher_id = $result[0]->ID;
        } else {
            $discount_value = 0;
            $voucher_id = 0;
        }
    
        $response = [
            'discount_value' => $discount_value,
            'voucher_id' => $voucher_id,
        ];
    
        $this->response->setContentType('application/json');
        return $this->response->setBody(json_encode($response));
    }

    function create_delivery()
    {
        $invoice_id = $this->request->getPost('Invoice_ID');
        $firstName = $this->request->getPost('firstName');
        $lastName = $this->request->getPost('lastName');
        $address = $this->request->getPost('Address');
        $apartment = $this->request->getPost('Apartment');
        $country = $this->request->getPost('Country');
        $city = $this->request->getPost('City');
        $zipcode = $this->request->getPost('Zipcode');
        $phone = $this->request->getPost('Phone');
        $ship = $this->request->getPost('Ship');

        $invoice = new Invoice_Delivery();
        $invoice->create_delivery($invoice_id, $firstName, $lastName, $address, $apartment, $country, $zipcode, $phone, $ship, $city);
        return $this->response->setJSON([
            'url' => 'http://localhost/pepicase/public/checkout/done',
            'url_vnpay' => 'http://localhost/pepicase/public/checkout/pending',
        ]);
    }

    function generate_invoice()
    {
        $user = $this->request->getPost('user');
        $total_price = $this->request->getPost('Total_Price');
        $actual_price = $this->request->getPost('Actual_Price');
        $voucher_id = $this->request->getPost('Voucher_ID');
        $note = $this->request->getPost('Note');
        $method = $this->request->getPost('Method');
        $method_id = $this->request->getPost('Method_ID');

        if($method_id == '') $method_id = 0;
        
        if($voucher_id !== 0)
        {
            $db = Database::connect();
            $query = 
            "UPDATE voucher
            SET Current_Usage = Current_Usage + 1
            WHERE ID = {$voucher_id}";
            $db->query($query);
        }

        $invoice = new Invoice_Delivery();
        $new_invoice_id = $invoice->generate_invoice($user, $total_price, $actual_price, $voucher_id, $note, $method, $method_id);
        return $this->response->setJSON([
            'new_invoice_id' => $new_invoice_id,
        ]);
    }

    //////////MOMO
    public function momo_generate() 
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() ."";
        $redirectUrl = "http://localhost/pepicase/public/checkout/momo_return";
        $ipnUrl = "http://localhost/pepicase/public/checkout/momo/ipn";
        $extraData =  '';
        $partnerCode = $partnerCode;
        $accessKey = $accessKey;
        $serectkey = $secretKey;
        $orderId = $orderId; // Mã đơn hàng
        $orderInfo = $orderInfo;
        $amount = $amount;
        $ipnUrl = $ipnUrl;
        $redirectUrl = $redirectUrl;
        $extraData = $extraData;

        $requestId = time() . "";
        $requestType = "payWithATM";
        $extraData = ($extraData ? $extraData : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);

            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            if (isset($jsonResult['payUrl'])) {
                // Trả về URL thanh toán cho client
                echo json_encode(['payUrl' => $jsonResult['payUrl'], 'Method_ID' => $orderId]);
            } else {
                // Xử lý lỗi nếu cần
                echo json_encode(['error' => 'Không thể tạo URL thanh toán.']);
            }
            exit;
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    function momo_ipn_handle()
    {
        header("content-type: application/json; charset=UTF-8");
        http_response_code(204);
        if (!empty($this->request->getPost())) {
            $orderId = $this->request->getPost("orderId");
            $resultCode = $this->request->getPost("resultCode");
            $invoice = new Invoice_Delivery();
            if($resultCode == 0)
            {
                $invoice->confirm_api_payment($orderId);
                $curr_session = new CustomSession();
                $cart = new Cart($curr_session->get_id());
                $cart->clear();
            }
            else
            {
                $invoice->cancel_api_payment($orderId);
            }
        }
    }

    function momo_return() 
    {
        $request = \Config\Services::request();
    
        /*$scheme = $_SERVER['REQUEST_SCHEME'];
    
        // Lấy tên host
            $host = $_SERVER['HTTP_HOST'];
        
            // Lấy đường dẫn của trang
            $path = $_SERVER['REQUEST_URI'];
        
        // Tạo URL đầy đủ
            $url = $scheme . '://' . $host . $path;
        
        // Phân tích URL
            $parsed_url = parse_url($url);
        
        // Phân tích chuỗi truy vấn
        parse_str($parsed_url['query'], $query_array);
    
        $result  = $query_array['resultCode'];
        $transaction_id  = $query_array['transId'];
        */
    
        
        $result = $request->getGet('resultCode');
        $orderId = $request->getGet('orderId');
    
        
        $invoice = new Invoice_Delivery();
    
        if($invoice->check_api_payment($orderId))
        {
            if($result == 0) 
            {
                $invoice->confirm_api_payment($orderId);
                $curr_session = new CustomSession();
                $cart = new Cart($curr_session->get_id());
                $cart->clear();
            }
            else
            {
                $result != 0;
                $invoice->cancel_api_payment($orderId);
            }
    
            return view('checkoutDone', [
                'protocol' => 'momo',
                'result' => $result,
            ]);
            
        }
        else return redirect() -> to ('/');
    }    
    //////////MOMO


    //////////VNPAY
    function vnpay_generate()
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        /**
         * 
         *
        * @author CTT VNPAY
        */
        require_once 'C:\xampp\htdocs\pepicase\app\Config\Config_VNPAY.php';

        $vnp_TxnRef = rand(1,10000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $this->request->getPost('amount'); // Số tiền thanh toán
        $vnp_BankCode = $this->request->getPost('bankCode'); //Mã phương thức thanh toán
        $vnp_IpAddr = $this->request->getIPAddress(); //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => 'en',
            "vnp_OrderInfo" => "Thanh toan GD:". $vnp_TxnRef,
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
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        header('Location: ' . $vnp_Url);
        $response = [
            'url' => $vnp_Url,
            'method_id' => $vnp_TxnRef,
        ];
        $this->response->setContentType('application/json');
        return $this->response->setBody(json_encode($response));
    }
    
    function vnpay_ipn_handle()
    {
        /* Payment Notify
        * IPN URL: Ghi nhận kết quả thanh toán từ VNPAY
        * Các bước thực hiện:
        * Kiểm tra checksum 
        * Tìm giao dịch trong database
        * Kiểm tra số tiền giữa hai hệ thống
        * Kiểm tra tình trạng của giao dịch trước khi cập nhật
        * Cập nhật kết quả vào Database
        * Trả kết quả ghi nhận lại cho VNPAY
        */
        
        require_once 'C:\xampp\htdocs\pepicase\app\Config\Config_VNPAY.php';
        $inputData = array();
        $returnData = array();
        
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $vnpTranId = $inputData['vnp_TransactionNo']; //Mã giao dịch tại VNPAY
        $vnp_BankCode = $inputData['vnp_BankCode']; //Ngân hàng thanh toán
        $vnp_Amount = $inputData['vnp_Amount']/100; // Số tiền thanh toán VNPAY phản hồi
        
        $Status = 0; // Là trạng thái thanh toán của giao dịch chưa có IPN lưu tại hệ thống của merchant chiều khởi tạo URL thanh toán.
        $orderId = $inputData['vnp_TxnRef'];
        
            //Check Orderid    
            //Kiểm tra checksum của dữ liệu
            if ($secureHash == $vnp_SecureHash) {
                //Lấy thông tin đơn hàng lưu trong Database và kiểm tra trạng thái của đơn hàng, mã đơn hàng là: $orderId            
                //Việc kiểm tra trạng thái của đơn hàng giúp hệ thống không xử lý trùng lặp, xử lý nhiều lần một giao dịch
                //Giả sử: $order = mysqli_fetch_assoc($result);   
                $orderModel = new Invoice_Delivery();
                $order = $orderModel->check_api_payment($orderId);
                if ($order !== NULL) {
                    if($order) //Kiểm tra số tiền thanh toán của giao dịch: giả sử số tiền kiểm tra là đúng. //$order["Amount"] == $vnp_Amount
                    {
                        if ($order["Status"] != NULL && $order["Status"] == 0) {
                            if ($inputData['vnp_ResponseCode'] == '00' || $inputData['vnp_TransactionStatus'] == '00') {
                                $Status = 1; // Trạng thái thanh toán thành công
                                $orderModel->confirm_api_payment($orderId);
                                $curr_session = new CustomSession();
                                $cart = new Cart($curr_session->get_id());
                                $cart->clear();
                            } else {
                                $Status = 0; // Trạng thái thanh toán thất bại / lỗi
                                $orderModel->cancel_api_payment($orderId);
                            }
                            //Cài đặt Code cập nhật kết quả thanh toán, tình trạng đơn hàng vào DB
                            //
                            //
                            //
                            //Trả kết quả về cho VNPAY: Website/APP TMĐT ghi nhận yêu cầu thành công                
                            $returnData['RspCode'] = '00';
                            $returnData['Message'] = 'Confirm Success';
                        } else {
                            $returnData['RspCode'] = '02';
                            $returnData['Message'] = 'Order already confirmed';
                        }
                    }
                    else {
                        $returnData['RspCode'] = '04';
                        $returnData['Message'] = 'invalid amount';
                    }
                } else {
                    $returnData['RspCode'] = '01';
                    $returnData['Message'] = 'Order not found';
                }
            } else {
                $returnData['RspCode'] = '97';
                $returnData['Message'] = 'Invalid signature';
            }
        //Trả lại VNPAY theo định dạng JSON
        echo json_encode($returnData);
    }

    function vnpay_return()
    {
        $request = \Config\Services::request();

        $vnp_ResponseCode = $request->getGet('vnp_ResponseCode');
        $vnp_TxnRef = $request->getGet('vnp_TxnRef');

        $result = '';
        $invoice = new Invoice_Delivery();
        if($invoice->check_api_payment($vnp_TxnRef))
        {
            if($vnp_ResponseCode == '00') 
            {
                $invoice->confirm_api_payment($vnp_TxnRef);
                $result = 0;
                $curr_session = new CustomSession();
                $cart = new Cart($curr_session->get_id());
                $cart->clear();
            }
            else
            {
                $result = 2;
                $invoice->cancel_api_payment($vnp_TxnRef);
            }
    
            return view('checkoutDone', [
                'protocol' => 'vnpay',
                'result' => $result,
            ]);    
        }
        else return redirect() -> to ('/');
    }
}