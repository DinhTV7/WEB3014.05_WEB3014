<?php

namespace App\Models;

use App\Model;

class Role extends Model 
{
    // Hàm lấy ra danh sách chức vụ
    public function getAll ()
    {
        $query =  $this->connection->createQueryBuilder();

        $roles = $query->select('*')->from('roles')->fetchAllAssociative();

        return $roles;
    }
}