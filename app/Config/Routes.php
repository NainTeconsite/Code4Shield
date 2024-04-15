<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

$routes->get('other', '\App\Modules\Other\Controller\Other::contact');
$routes->group('user',  function ($routes){
    $routes->presenter('regular',['namespace' => 'App\Modules\Regular\Controller']);
    $routes->presenter('other',['namespace' => 'App\Modules\Other\Controller']);
    $routes->presenter('admin',['namespace' => 'App\Modules\Admin\Controller']);
    $routes->get('dashboard', '\App\Modules\Dashboard\Controller\Dashboard::index');
    $routes->get('dashboard/(:num)', '\App\Modules\Dashboard\Controller\Dashboard::show/$1', ['as' => 'usuario.show']);
    $routes->get('dashboard/(:num)/(:any)', '\App\Modules\Dashboard\Controller\Dashboard::manageGroups/$1/$2');
    $routes->post('dashboard/(:num)', '\App\Modules\Dashboard\Controller\Dashboard::managePermissions/$1');
});

