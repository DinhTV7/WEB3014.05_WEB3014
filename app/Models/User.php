<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    // Hàm lấy ra danh sách người dùng
    public function getAll ()
    {
        $query =  $this->connection->createQueryBuilder();

        $users = $query->select('u.*', 'r.name AS role_name')
                ->from('users', 'u')
                ->innerJoin('u', 'roles', 'r', 'u.role_id = r.id') // INNER FOIN roles r ON u.role_id = r.id
                ->orderBy('u.id', 'DESC')
                ->fetchAllAssociative();

        return $users;
    }
}