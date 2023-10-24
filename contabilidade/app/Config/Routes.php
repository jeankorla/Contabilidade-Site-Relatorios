<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/trocar', 'Home::trocar');

$routes->get('/abertura', 'Home::abertura');

$routes->get('/cliente', 'Home::cliente');

$routes->get('/login', 'logincontroller::index');


$routes->setAutoRoute(true);
