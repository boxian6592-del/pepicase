<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomepageController::index');
$routes->get('/product', 'GetProductController::index');
$routes->get('/product/(:num)/','GetProductController::get_with_id/$1');
$routes->get('/about-us','StaticPageController::AboutUs');
$routes->get('/policy','StaticPageController::Policy');
$routes->get('/terms-of-use','StaticPageController::TermsOfUse');
$routes->get('/collections','GetProductController::get_through_collections');
$routes->get('/login','LoginController::index');
$routes->post('/login','LoginController::login');
$routes->get('/signup','LoginController::signup');
$routes->get('/resetPassword','LoginController::resetPassword');
$routes->get('/testing','HomepageController::testing');
$routes->post('/signup/(:string)/(:string)','SignUpController::send_signup_email/$1/$2');
$routes->get('/signup/confirm/(:string)/(:string)','SignUpController::signup/$1/$2');
