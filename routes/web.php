<?php

use Bramus\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\RoleController;
use App\Controllers\UserController;
use App\Controllers\ProductController;

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
$router->get('/users/edit/{id}',    UserController::class . '@edit');
$router->post('/users/update/{id}', UserController::class . '@update');
$router->get('/users/destroy/{id}', UserController::class . '@destroy');

// Route quản lý người dùng
$router->get('/products',              ProductController::class . '@index');
$router->get('/products/create',       ProductController::class . '@create');
$router->post('/products/store',       ProductController::class . '@store');
$router->get('/products/edit/{id}',    ProductController::class . '@edit');
$router->post('/products/update/{id}', ProductController::class . '@update');
$router->get('/products/destroy/{id}', ProductController::class . '@destroy');

// ------------------------

$router->run();
