<?php

use App\Core\Router;

return function (Router $router) {

  $router->get('/', ['HomeController', 'index'], 'home');

  $router->get('/users/{id}', ['UserController', 'show'], 'users.show');

  $router->post('/users', ['UserController', 'store'], 'users.store');
};