<?php

use App\Controllers\HomeController;
use App\Controllers\RoleController;
use App\Controllers\UserController;
use Bramus\Router\Router;

$router = new Router();

// Đây là nơi khai báo các route

$router->get('/', HomeController::class . '@index');

// Route quản lý chức vụ
$router->get('/roles', RoleController::class . '@index');

// Route quản lý người dùng
$router->get('/users', UserController::class . '@index');

// ------------------------

$router->run();
