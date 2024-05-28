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
$routes->get('get_more_products', 'GetProductController::getMoreProducts');
//sản phẩm


//thao tác login
$routes->get('/login','LoginController::index');
$routes->post('/login','LoginController::login');
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
$routes->get('/checkout','CartController::checkout');
//khu để test layout
$routes->get('/testing','HomepageController::testing');
//khu để test layout

$routes->get('/purchases','StaticPageController::Purchases');

//quản lý tài khoản
$routes->get('/user/cart','CartController::index');
$routes->post('/user/cart','CartController::process_cart_edit');
$routes->get('/user','StaticPageController::account');
//quản lý tài khoản
