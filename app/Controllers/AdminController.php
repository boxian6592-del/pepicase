<?php

namespace App\Controllers;
use App\Models\CustomSession;
use App\Models\Admin;

class AdminController extends BaseController
{
    function redirect() // hàm chuyển qua trang điều hướng để kiểm tra biến Secret
    {
        $curr_session = new CustomSession();
        $previousUrl = $this->request->getServer('HTTP_REFERER');
        if (strpos($previousUrl, 'http://localhost/pepicase/public/login') === 0) // nếu user đến từ trang login
        {
            if($curr_session->isSessionSet()) // nếu session đã được set từ trang user
            {
                $curr_user = new Admin();
                if($curr_user->check_admin($curr_session->get_id())) // nếu user thật sự là admin
                {
                    return view ('redirect');
                }
            }
            else 
            {
                $curr_session->delete_session_cookie();
                return redirect() -> to ('/login');
            }
        }
        else 
        {
            $curr_session->delete_session_cookie();
            return redirect() -> to ('/login');
        }
    }

    function check_secret()
    {
        $secret = $this->request->getPost('secret');
        $secret_check = new Admin();
        if($secret_check->check_secret($secret)) return redirect() -> to ('/admin/dashboard');
        else
        {
            $curr_session = new CustomSession();
            $curr_session->delete_session_cookie();
            return redirect() -> to ('/login');
        } 
    }


    function show_dashboard()
    {
        $previousUrl = $this->request->getServer('HTTP_REFERER');
        if (strpos($previousUrl, 'http://localhost/pepicase/public/redirect') === 0) // nếu user đến từ trang redirect
        return view('dashboard');
        else
        {
            $curr_session = new CustomSession();
            $curr_session->delete_session_cookie();
            return redirect() -> to ('/login');
        }
    }

    ///////////////PRODUCT
    function get_products()
    {
        $previousUrl = $this->request->getServer('HTTP_REFERER');
        if (strpos($previousUrl, 'http://localhost/pepicase/public/admin/dashboard') === 0)
        {
            $admin = new Admin();
            return json_encode($admin->get_all_products());
        }
    }

    function delete_product()
    {
        $previousUrl = $this->request->getServer('HTTP_REFERER');
        if (strpos($previousUrl, 'http://localhost/pepicase/public/admin/dashboard') === 0)
        {
            $product_id = $this->request->getPost('product_id');
            $admin = new Admin();
            $admin->delete_product($product_id);
            return 'success';
        }
    }

    function add_product()
    {
        $previousUrl = $this->request->getServer('HTTP_REFERER');
        if (strpos($previousUrl, 'http://localhost/pepicase/public/admin/dashboard') === 0)
        {
            $request = $this->request;
            if ($request->getMethod() == 'POST') {
                $file = $request->getFile('file');
        
                if ($file->isValid() && !$file->hasMoved()) {
                    $name = $request->getPost('name');        
                    $productName = $request->getPost('name');
                    $sku = $request->getPost('sku');
                    $color = $request->getPost('color');
                    $collection = $request->getPost('collection');
                    if($collection == 1) $extra = 'cinnamonroll/';
                    if($collection == 2) $extra = 'mymelody/';
                    if($collection == 3) $extra = 'pochacco/';
                    if($collection == 4) $extra = 'pompompurin/';
                    $price = $request->getPost('price');
                    $path = '/pepicase/public/product-pics/' . $extra . $name . '.svg';
                    $admin = new Admin();
                    $var = $admin->add_product_to_database($name, $price, $sku, $path, $color, $collection);
                    if($var == 'Insertion failure!' || $var == 'Item name is duplicated!') return $var;
                    else 
                    {
                        $file->move(FCPATH . 'product-pics/'. $extra, $name.'.svg');
                        return "Added successfuly! New product's ID: " . $var;
                    }
                } else {
                    return "File is invalid!";
                }            
            }
        }
    }

    function edit_product()
    {
        $previousUrl = $this->request->getServer('HTTP_REFERER');
        if (strpos($previousUrl, 'http://localhost/pepicase/public/admin/dashboard') === 0)
        {
            
        }
    }
    ///////////////PRODUCT






    ///////////////DELIVERY
    function get_delivery()
    {
        $previousUrl = $this->request->getServer('HTTP_REFERER');
        if (strpos($previousUrl, 'http://localhost/pepicase/public/admin/dashboard') === 0)
        {
            $admin = new Admin();
            return json_encode($admin->get_all_invoices());
        }
    }

    function set_delivery_status()
    {
        $previousUrl = $this->request->getServer('HTTP_REFERER');
        if (strpos($previousUrl, 'http://localhost/pepicase/public/admin/dashboard') === 0)
        {
            $invoice_id = $this->request->getPost('invoice_id');
            $status = $this->request->getPost('status');
            $admin = new Admin();
            $result = $admin->set_delivery_status($invoice_id, $status);
            return $this->response->setJSON(['success' => $result]);
        }
    }

    function get_delivery_status()
    {
        $previousUrl = $this->request->getServer('HTTP_REFERER');
        if (strpos($previousUrl, 'http://localhost/pepicase/public/admin/dashboard') === 0)
        {
            $invoice_id = $this->request->getPost('invoice_id');
            $admin = new Admin();
            return $admin->get_delivery_status($invoice_id);
        }
    }

    function get_invoice_details()
    {
        $previousUrl = $this->request->getServer('HTTP_REFERER');
        if (strpos($previousUrl, 'http://localhost/pepicase/public/admin/dashboard') === 0)
        {
            $invoice_id = $this->request->getPost('invoice_id');
            $admin = new Admin();
            return json_encode($admin->get_invoice_details($invoice_id));
        }
    }
    ///////////////DELIVERY
}