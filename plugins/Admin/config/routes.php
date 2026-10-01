<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\Router;

Router::plugin(
    'Admin',
    ['path' => '/admin'],
    function ($routes) {
        $routes->get('/dashboard', ['controller' => 'Dashboard']);
       // $routes->get('/pages/:id', ['controller' => 'Pages', 'action' => 'view']);
       // $routes->put('/pages/:id', ['controller' => 'Pages', 'action' => 'update']);
    }
);