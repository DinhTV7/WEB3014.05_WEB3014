<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    private $modelUser;
    private $modelRole;

    public function __construct()
    {
        $this->modelUser = new User();
        $this->modelRole = new Role();
    }
    
    // Hiển thị danh sách người dùng
    public function index () 
    {
        $users = $this->modelUser->getAll();

        return view('users.index', compact('users'));
    }

    // Hiển thị chi tiết người dùng
    public function show ($id)
    {
        $user = $this->modelUser->getById($id);
        
        return view('users.show', compact('user'));
    }

    // Hiển thị form thêm
    public function create ()
    {
        $roles = $this->modelRole->getAll();

        return view('users.create', compact('roles'));
    }

    // Xử lý thêm dữ liệu
    public function store ()
    {
        // Lấy dữ liệu gửi từ form
        $data = [
            'name'          => $_POST['name'],
            'phone'         => $_POST['phone'],
            'email'         => $_POST['email'],
            'date_birth'    => $_POST['date_birth'],
            'role_id'       => $_POST['role_id'],
            'status'        => $_POST['status'],
        ];

        // Xử lý hình ảnh
        if (is_upload('avatar')) {
            $data['avatar'] = $this->uploadFile($_FILES['avatar'], 'users');
        }

        $this->modelUser->create($data);

        redirect('/users');
    }

    // Hiển thị form sửa
    public function edit ($id) 
    {
        $user = $this->modelUser->getById($id);
        $roles = $this->modelRole->getAll();

        return view('users.edit', compact('user', 'roles'));
    }

    // Xử lý cập nhật dữ liệu
    public function update ($id) 
    {
        // Lấy dữ liệu gửi từ form
        $data = [
            'name'          => $_POST['name'],
            'phone'         => $_POST['phone'],
            'email'         => $_POST['email'],
            'date_birth'    => $_POST['date_birth'],
            'role_id'       => $_POST['role_id'],
            'status'        => $_POST['status'],
        ];

        $user = $this->modelUser->getById($id);

        // Xử lý hình ảnh
        if (is_upload('avatar')) { // Nếu có hình ảnh mới
            // Thì xóa ảnh cũ và thêm ảnh mới
            if (!empty($user['avatar']) && file_exists($user['avatar'])) {
                unlink($user['avatar']);
            }
            $data['avatar'] = $this->uploadFile($_FILES['avatar'], 'users');
        } else {
            // Ngược lại ko có ảnh mới thì lấy ảnh cũ
            $data['avatar'] = $user['avatar'];
        }

        $this->modelUser->update($id, $data);
        redirect('/users');
    }

    // Hàm xóa thông tin người dùng
    public function destroy ($id)
    {
        $this->modelUser->delete($id);
        redirect('/users');
    }
}