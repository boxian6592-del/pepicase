<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// web tĩnh
$routes->get('/', 'HomepageController::index');
$routes->get('/about-us','StaticPageController::AboutUs');
$routes->get('/policy','StaticPageController::Policy');
$routes->get('/terms-of-use','StaticPageController::TermsOfUse');
// web tĩnh

//sản phẩm
$routes->get('/product', 'GetProductController::index');
$routes->get('/product/(:num)','GetProductController::get_with_id/$1');
$routes->get('/wishlist','GetProductController::wishlist');
$routes->post('/product/add','GetProductController::add_to_cart');
$routes->get('/collections','GetProductController::get_through_collections');
$routes->post('/product/toggleFavorite','GetProductController::toggleFavorite');
$routes->post('/get_filtered_products', 'GetProductController::getFilteredProducts');
$routes->get('/get_all_products', 'GetProductController::getAllProducts');
$routes->get('/get_more_products', 'GetProductController::getMoreProducts');
$routes->post('/post_comment','GetProductController::post_comment');
//sản phẩm


//thao tác login
$routes->get('/login','LoginController::index');
$routes->post('/login','LoginController::login');
$routes->get('/loginWithGoogle','LoginController::loginWithGoogle');
$routes->get('/loginWithFacebook','LoginController::loginWithFB');
//thao tác login

//thao tác logout
$routes->get('/logout','LoginController::logout');
//thao tác logout

//thao tác đăng ký
$routes->get('/signup','SignUpController::index');
$routes->post('/signup','SignUpController::send_signup_email');
$routes->get('/signup/pending','SignUpController::pending');
$routes->get('/signup/confirmed/(:any)/(:any)','SignUpController::signup/$1/$2');
//thao tác đăng ký

//resetPassword
$routes->get('/resetPassword','ResetPasswordController::index');
$routes->post('/resetPassword','ResetPasswordController::check_and_send');
$routes->get('/resetPassword/pending','ResetPasswordController::pending');
$routes->get('/resetPassword/confirmed/(:any)','ResetPasswordController::showResetPassword/$1');
$routes->post('/resetPassword/confirmed/(:any)','ResetPasswordController::ResetPassword/$1');
//resetPassword


//checkout
//////checkout cơ bản
$routes->get('/checkout','CheckoutController::index');
$routes->post('/checkout/check_discount','CheckoutController::check_discount');
$routes->get('/checkout/done','StaticPageController::checkout_done_cash');
$routes->post('/checkout/generate_invoice','CheckoutController::generate_invoice');
$routes->post('/checkout/create_delivery','CheckoutController::create_delivery');
$routes->get('/checkout/pending','StaticPageController::await_payment');
//////checkout cơ bản

//////checkout momo
$routes->post('/checkout/momo','CheckoutController::momo_generate');
$routes->post('/checkout/momo/ipn','CheckoutController::momo_ipn_handle');
$routes->get('/checkout/momo_return','CheckoutController::momo_return');
//////checkout momo


//////checkout vnpay
$routes->post('/checkout/vnpay','CheckoutController::vnpay_generate');
$routes->get('/IPN','CheckoutController::vnpay_ipn_handle');
$routes->get('/checkout/vnpay_return','CheckoutController::vnpay_return');
//////checkout vnpay
//checkout


//khu test layout
$routes->get('/testing','HomepageController::testing');
//khu test layout

$routes->get('/purchases','StaticPageController::purchases');

//quản lý tài khoản
$routes->get('/user/cart','CartController::index');
$routes->post('/user/cart','CartController::process_cart_edit');
$routes->get('/user','StaticPageController::account');
$routes->post('/user/update','StaticPageController::account_info_update');
$routes->get('/user/changePassword/pending','ResetPasswordController::check_and_send_user');
$routes->post('/user/delete_account','StaticPageController::delete_user');
$routes->get('/purchases','StaticPageController::Purchases');
$routes->post('/purchases/deleteOrder','StaticPageController::deletePurchase');
//quản lý tài khoản



//Admin side
$routes->get('/redirect','AdminController::redirect');
$routes->post('/redirect/check/','AdminController::check_secret');
$routes->get('/admin/dashboard/','AdminController::show_dashboard');


$routes->get('/admin/get_delivery','AdminController::get_delivery');
$routes->post('/admin/set_delivery_status', 'AdminController::set_delivery_status');
$routes->post('/admin/get_delivery_status', 'AdminController::get_delivery_status');
$routes->post('/admin/get_invoice_details', 'AdminController::get_invoice_details');


$routes->get('/admin/get_products','AdminController::get_products');
$routes->post('/admin/delete_product','AdminController::delete_product');
$routes->post('/admin/add_product','AdminController::add_product');
$routes->post('/admin/edit_product','AdminController::edit_product');
//Admin side