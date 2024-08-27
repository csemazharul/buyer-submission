<?php

use App\Controllers\BuyerController;
use App\Router;

$router = new Router();

// $router->get('/', HomeController::class, 'index');
$router->get('/buyer-create', BuyerController::class, 'create');

$router->post('/buyer-store', BuyerController::class, 'store');

$router->dispatch();
