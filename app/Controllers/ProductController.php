<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Category;
use App\Models\Product;
use Rakit\Validation\Validator;

class ProductController extends Controller
{
    private $modelProduct;
    private $modelCategory;
    private $validator;

    public function __construct()
    {
        $this->modelProduct = new Product();
        $this->modelCategory = new Category();
        $this->validator = new Validator();
    }

    public function index()
    {
        $products = $this->modelProduct->getAll();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->modelCategory->getAll();

        return view('products.create', compact('categories'));
    }

    public function store()
    {
        $data = [
            'category_id' => $_POST['category_id'],
            'name' => $_POST['name'],
            'description' => $_POST['description'],
        ];

        $rules = [
            'category_id' => 'required',
            'name' => 'required',
        ];

        $errors = $this->validate($this->validator, $data, $rules);

        if (!empty($errors)) {
            setFlash('error', reset($errors));
            redirect('/products/create');
        }

        if (is_upload('img_thumbnail')) {
            $data['img_thumbnail'] = $this->uploadFile($_FILES['img_thumbnail'], 'products');
        }

        $this->modelProduct->create($data);

        redirect('/products');
    }

    public function edit($id)
    {
        $categories = $this->modelCategory->getAll();

        $product = $this->modelProduct->getById($id);

        return view('products.edit', compact('categories', 'product'));
    }

    public function update($id)
    {
        $data = [
            'category_id' => $_POST['category_id'],
            'name' => $_POST['name'],
            'description' => $_POST['description'],
        ];

        $rules = [
            'category_id' => 'required',
            'name' => 'required',
        ];

        $errors = $this->validate($this->validator, $data, $rules);

        if (!empty($errors)) {
            setFlash('error', reset($errors));
            redirect('/products/edit/' . $id);
        }

        $product = $this->modelProduct->getById($id);

        if (is_upload('img_thumbnail')) {
            // Xóa hình ảnh cũ
            if (!empty($product['img_thumbnail']) && file_exists($product['img_thumbnail'])) {
                unlink($product['img_thumbnail']);
            }
            $data['img_thumbnail'] = $this->uploadFile($_FILES['img_thumbnail'], 'products');
        } else {
            $data['img_thumbnail'] = $product['img_thumbnail'];
        }

        $this->modelProduct->update($id, $data);

        redirect('/products');
    }

    public function destroy($id)
    {
        $product = $this->modelProduct->getById($id);

        $deleted = $this->modelProduct->delete($id);

        if ($deleted) {
            if (!empty($product['img_thumbnail']) && file_exists($product['img_thumbnail'])) {
                unlink($product['img_thumbnail']);
            }
        }

        redirect('/products');
    }
}