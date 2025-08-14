<?php

use App\Controllers\HomeController;
use App\Controllers\RoleController;
use App\Controllers\UserController;
use Bramus\Router\Router;

$router = new Router();

// Đây là nơi khai báo các route

$router->get('/', HomeController::class . '@index');

// Route quản lý chức vụ
$router->get('/roles',              RoleController::class . '@index');
$router->get('/roles/create',       RoleController::class . '@create');
$router->post('/roles/store',       RoleController::class . '@store');
$router->get('/roles/edit/{id}',    RoleController::class . '@edit');
$router->post('/roles/update/{id}', RoleController::class . '@update');
$router->get('/roles/destroy/{id}', RoleController::class . '@destroy');

// Route quản lý người dùng
$router->get('/users',              UserController::class . '@index');
$router->get('/users/show/{id}',    UserController::class . '@show');
$router->get('/users/create',       UserController::class . '@create');
$router->post('/users/store',       UserController::class . '@store');
$router->get('/users/destroy/{id}', UserController::class . '@destroy');

// ------------------------

$router->run();
