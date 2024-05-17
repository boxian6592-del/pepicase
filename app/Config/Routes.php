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

//lấy thông tin sản phẩm
$routes->get('/product', 'GetProductController::index');
$routes->get('/product/(:num)/','GetProductController::get_with_id/$1');
$routes->get('/collections','GetProductController::get_through_collections');
//lấy thông tin sản phẩm


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
$routes->get('/signup/confirm/(:string)/(:string)','SignUpController::signup/$1/$2');
//thao tác đăng ký

//resetPassword
$routes->get('/resetPassword','ResetPasswordController::index');
$routes->post('/resetPassword','ResetPasswordController::check_and_send');
$routes->get('/resetPassword/pending','ResetPasswordController::pending');
//resetPassword

//khu để test layout
$routes->get('/testing','HomepageController::testing');
//khu để test layout

