<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

$routes->group('user',  function ($routes){
    $routes->presenter('regular',['namespace' => 'App\Modules\Regular\Controller']);
    $routes->presenter('other',['namespace' => 'App\Modules\Other\Controller']);
    $routes->presenter('admin',['namespace' => 'App\Modules\Admin\Controller']);
    $routes->get('dashboard', '\App\Modules\Dashboard\Controller\Dashboard::index');
});

