<?php

namespace App\Models;

use App\Model;

class Category extends Model
{
    public function getAll()
    {
        $query = $this->connection->createQueryBuilder();

        $categories = $query->select('*')
                ->from('categories')
                ->fetchAllAssociative();

        return $categories;
    }
}