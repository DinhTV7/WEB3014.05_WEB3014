<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    // Kết nối tới model cần dùng
    private $modelRole;

    public function __construct()
    {
        $this->modelRole = new Role();
    }

    // Hàm hiển thị danh sách
    public function index()
    {
        $roles = $this->modelRole->getAll();

        debug($roles);
    }
}