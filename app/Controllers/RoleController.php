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

        return view('roles.index', compact('roles'));
    }

    // Hiển thị form thêm
    public function create ()
    {
        return view('roles.create');
    }

    // Xử lý thêm dữ liệu
    public function store ()
    {
        $data = [
            'name' => $_POST['name']
        ];

        $this->modelRole->create($data);

        redirect('/roles');
    }

    // Hàm xóa chức vụ
    public function destroy($id)
    {
        $this->modelRole->delete($id);
        redirect('/roles');
    }
}
