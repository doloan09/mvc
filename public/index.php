<?php

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Load Env
 */
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('\App\Core\Error::errorHandler');
set_exception_handler('\App\Core\Error::exceptionHandler');

/**
 * Routing
 */
$router = new \App\Core\Router();

// Add the routes

$router->add('/login', [
    'controller' => 'AuthController',
    'action' => 'login'
]);

$router->add('/doLogin', [
    'controller' => 'AuthController',
    'action' => 'doLogin'
]);

$router->add('/logout', [
    'controller' => 'AuthController',
    'action' => 'logout'
]);

//User
$router->add('/', [
    'controller' => 'UserController',
    'action' => 'create'
]);

$router->add('/users', [
    'controller' => 'UserController',
    'action' => 'index'
]);

$router->add('/users/create', [
    'controller' => 'UserController',
    'action' => 'create'
]);

$router->add('/user', [
    'controller' => 'UserController',
    'action' => 'store'
]);

$router->add('/users/edit/{id}', [
    'controller' => 'UserController',
    'action' => 'edit'
]);

$router->add('/update/{id}/{per}', [
    'controller' => 'UserController',
    'action' => 'update'
]);

$router->add('/delete/{id}', [
    'controller' => 'UserController',
    'action' => 'destroy'
]);

$router->add('/user/info', [
    'controller' => 'UserController',
    'action' => 'show'
]);

$router->dispatch($_SERVER['REQUEST_URI']);