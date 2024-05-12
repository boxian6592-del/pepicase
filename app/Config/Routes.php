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
$routes->get('/signup','LoginController::signup');
$routes->get('/resetPassword','LoginController::resetPassword');