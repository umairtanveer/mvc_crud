<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */

$router = new Core\Router();
// Add the routes

$router->add('', ['controller' => 'HomeController', 'action' => 'index']);

$router->add('customers/list', ['controller' => 'Customers', 'action' => 'listCustomers']);
$router->add('create/customer', ['controller' => 'Customers', 'action' => 'createCustomer']);
$router->add('update/customer', ['controller' => 'Customers', 'action' => 'updateCustomer']);
$router->add('detail/customer/{id:\d+}', ['controller' => 'Customers', 'action' => 'detailCustomer']);
$router->add('delete/customer/{id:\d+}', ['controller' => 'Customers', 'action' => 'deleteCustomer']);

$router->add('{controller}/{action}');
// echo $_SERVER['QUERY_STRING'];
// exit();

$router->dispatch($_SERVER['QUERY_STRING']);

// $klein = new \Klein\Klein();
//
// $klein->respond('GET', '/test', function () {
//     return 'Hello World!';
// });
//
// $klein->dispatch();
