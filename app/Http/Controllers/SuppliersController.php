<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SuppliersService;
use App\Http\Requests\CreateSupplierRequest;

class SuppliersController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $supplierService;

    public function __construct(SuppliersService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index()
    {
        return $this->supplierService->index();
    }

    public function create(CreateSupplierRequest $request)
    {
        return $this->supplierService->create($request->all());
    }

    public function update(Request $request)
    {
        return $this->supplierService->update($request->all());
    }

    public function delete(Request $request)
    {
        return $this->supplierService->delete($request->all());
    }
}
