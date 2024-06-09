<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Resource
$routes->resource('api/v1/users',['controller' => 'Api\V1\Users']);
$routes->resource('api/v1/categories',['controller' => 'Api\V1\Categories']);
$routes->resource('api/v1/tags',['controller' => 'Api\V1\Tags']);

$routes->get('/', 'Home::index');
