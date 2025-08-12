<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;

class UserController extends Controller
{
    private $modelUser;

    public function __construct()
    {
        $this->modelUser = new User();
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

    // Hàm xóa thông tin người dùng
    public function destroy ($id)
    {
        $this->modelUser->delete($id);
        redirect('/users');
    }
}