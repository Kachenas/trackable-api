<?php

namespace App\Services;

use App\Models\Orders;
use App\Services\BaseService;
use Illuminate\Support\Arr;

class OrdersService extends BaseService
{
    protected $orders;

    public function __construct(Orders $orders)
    {
        $this->orders = $orders;
    }

    public function index()
    {
        return $this->executeFunction(function () {
            return $this->orders->all();
        });
    }

    public function create($data)
    {
        return $this->executeFunction(function () use ($data) {
            return $this->orders->create($data);
        });
    }

    //public function update($data, $id)
    public function update($data)
    {
        //return $this->executeFunction(function () use ($data, $id) {
        return $this->executeFunction(function () use ($data) {
            $this->orders->findOrFail($data['id'])->update($data);
            return Orders::findOrFail($data['id']);
        });
    }

    public function delete($data)
    {
        return $this->executeFunction(function () use ($data) {
            return $this->orders->find($data['id'])->delete();
        });
    }
}
