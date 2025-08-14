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

    public function getById($id)
    {
        $query =  $this->connection->createQueryBuilder();

        $role = $query->select('*')->from('roles')
                ->where('id = :id')
                ->setParameter('id', $id)
                ->fetchAssociative(); // Lấy ra 1 dữ liệu
                
        return $role;
    }

    // Hàm thêm dữ liệu
    public function create($data)
    {
        return $this->connection->insert('roles', [
            'name' => $data['name']
        ]);
    }

    // Hàm cập nhật dữ liệu
    public function update($id, $data)
    {
        return $this->connection->update('roles', [
            'name' => $data['name']
        ], ['id' => $id]);
    }

    // Hàm xóa dữ liệu
    public function delete ($id)
    {
        return $this->connection->delete('roles', ['id' => $id]);
    }
}
// Ôn tập: Xây dựng chức năng thêm người dùng