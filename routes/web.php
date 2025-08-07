<?php

use App\Controllers\HomeController;
use App\Controllers\RoleController;
use Bramus\Router\Router;

$router = new Router();

// Đây là nơi khai báo các route

$router->get('/', HomeController::class . '@index');

// Route quản lý chức vụ
$router->get('/roles', RoleController::class . '@index');

// ------------------------

$router->run();
