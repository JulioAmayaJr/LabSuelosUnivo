<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/user', 'Users::index');
$routes->post('/user/save', 'Users::save');


$routes->get('/customer', 'Customer::index');
