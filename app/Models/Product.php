<?php

namespace App\Models;

use App\Model;

class Product extends Model
{
    public function getAll()
    {
        $query = $this->connection->createQueryBuilder();

        $products = $query->select('p.*', 'c.name AS category_name')
                ->from('products', 'p')
                ->innerJoin('p', 'categories', 'c' , 'p.category_id = c.id')
                ->orderBy('p.id', 'DESC')
                ->fetchAllAssociative();

        return $products;
    }

    public function getById($id)
    {
        $query = $this->connection->createQueryBuilder();

        $product = $query->select('p.*', 'c.name AS category_name')
                ->from('products', 'p')
                ->innerJoin('p', 'categories', 'c' , 'p.category_id = c.id')
                ->where('p.id = :id')
                ->setParameter('id', $id)
                ->fetchAssociative();

        return $product;
    }

    public function create($data)
    {
        return $this->connection->insert('products', [
            'category_id'       => $data['category_id'],
            'name'              => $data['name'],
            'description'       => $data['description'],
            'img_thumbnail'     => $data['img_thumbnail'],
        ]);
    }

    public function update($id, $data)
    {
        return $this->connection->update('products', [
            'category_id'       => $data['category_id'],
            'name'              => $data['name'],
            'description'       => $data['description'],
            'img_thumbnail'     => $data['img_thumbnail'],
        ], ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->connection->delete('products', ['id' => $id]);
    }
}