<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Resource
$routes->resource('api/v1/users',['controller' => 'Api\V1\Users']);

$routes->get('/', 'Home::index');
