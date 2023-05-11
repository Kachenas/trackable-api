<?php

namespace App\Services;

use App\Models\Payments;
use App\Services\BaseService;
use Illuminate\Support\Arr;

class PaymentsService extends BaseService
{
    protected $payments;

    public function __construct(Payments $payments)
    {
        $this->payments = $payments;
    }

    public function index()
    {
        return $this->executeFunction(function () {
            return $this->payments->all();
        });
    }

    public function create($data)
    {
        return $this->executeFunction(function () use ($data) {
            return $this->payments->create($data);
        });
    }

    public function update($data)
    {
        return $this->executeFunction(function () use ($data) {
            $this->payments->findOrFail($data['id'])->update($data);
            return Payments::findOrFail($data['id']);
        });
    }

    public function delete($data)
    {
        return $this->executeFunction(function () use ($data) {
            return $this->payments->find($data['id'])->delete();
        });
    }
}
