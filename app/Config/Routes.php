<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//Users
$routes->get('/user', 'Users::index');
$routes->post('/user/save', 'Users::save');
$routes->get("user/getById/(:num)", "Users::getById/$1");
$routes->post("user/update/(:num)", "Users::updateUser/$1");
$routes->get("user/delete/(:num)", "Users::deleteUser/$1");

//profile
$routes->get("/profile", "Profile::index");
$routes->post("profile/updateInfo", "Profile::updateInfo");
$routes->post("profile/updatePass", "Profile::updatePassword");

//Customer
$routes->get('/customer', 'Customer::index');
//route to add customer
$routes->post('/customer/save', 'Customer::saveCustomer');
//route to get customer by id
$routes->get("customer/getById/(:num)", "Customer::getById/$1");
//route to udpate customer
$routes->post("customer/update/(:num)", "Customer::updateCustomer/$1");
//route to delete customer
$routes->get("customer/delete/(:num)", "Customer::deleteCustomer/$1");

//route para obtener municipios
$routes->get("customer/municipality/(:num)", "Customer::getMunicipalities/$1");

//route to get department
$routes->get("customer/department/(:num)", "Customer::getDepartment/$1");

//Sample
$routes->get('/sample', 'Sample::index');
$routes->get('/sample/method/(.*)', 'Sample::method/$1');
$routes->post("/sample/saveField", "Sample::saveField");
$routes->get('/sample/methodId/(.*)','Sample::methodID/$1');

//groupSample
$routes->get('/groupSample', 'GroupSample::index');
$routes->post("/groupSample/save", "GroupSample::save");
$routes->get("groupSample/getById/(:num)", "GroupSample::getById/$1");
$routes->post("groupSample/update/(:num)", "GroupSample::update/$1");
$routes->get("groupSample/delete/(:num)", "GroupSample::delete/$1");
//Project
$routes->get('/project', 'Project::index');
$routes->post('/project/save', 'Project::save');
$routes->get("project/getById/(:num)", "Project::getById/$1");
$routes->post("project/update/(:num)", "Project::updateProject/$1");
$routes->get("project/delete/(:num)", "Project::deleteProject/$1");
$routes->get("project/getNumberProject", "Project::getNumberProject");

$routes->get('/error', 'Error::index');

//Login
$routes->get('/login', 'Login::index');
$routes->post("/login/validate", "Login::do_login");
$routes->get("/login/logout", "Login::logout");
