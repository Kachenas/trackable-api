<?php

namespace App\Services;

use App\Models\Suppliers;
use App\Services\BaseService;
use Illuminate\Support\Arr;

class SuppliersService extends BaseService
{
    protected $suppliers;

    public function __construct(Suppliers $suppliers)
    {
        $this->suppliers = $suppliers;
    }

    public function index()
    {
        return $this->executeFunction(function () {
            return $this->suppliers->all();
        });
    }

    public function create($data)
    {
        return $this->executeFunction(function () use ($data) {
            return $this->suppliers->create($data);
        });
    }

    public function update($data)
    {
        return $this->executeFunction(function () use ($data) {
            $this->suppliers->findOrFail($data['id'])->update($data);
            return Suppliers::findOrFail($data['id']);
        });
    }

    public function delete($data)
    {
        return $this->executeFunction(function () use ($data) {
            return $this->suppliers->find($data['id'])->delete();
        });
    }
}
