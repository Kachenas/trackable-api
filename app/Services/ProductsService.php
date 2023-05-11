<?php

namespace App\Services;

use App\Models\Products;
use App\Services\BaseService;
use Illuminate\Support\Arr;

class ProductsService extends BaseService
{
    protected $products;

    public function __construct(Products $products)
    {
        $this->products = $products;
    }

    public function index()
    {
        return $this->executeFunction(function () {
            return $this->products->all();
        });
    }

    public function create($data)
    {
        return $this->executeFunction(function () use ($data) {
            return $this->products->create($data);
        });
    }

    //public function update($data, $id)
    public function update($data)
    {
        //return $this->executeFunction(function () use ($data, $id) {
        return $this->executeFunction(function () use ($data) {
            //return tap($this->show($data['id']))->update($data);
            $this->products->findOrFail($data['id'])->update($data);
            return Products::findOrFail($data['id']);
        });
    }

    public function delete($data)
    {
        return $this->executeFunction(function () use ($data) {
            // $data = $this->show($id);
            // if ($data->delete()) {
            //     return "ok";
            // }
            return $this->products->find($data['id'])->delete();
        });
    }
}
