<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrdersService;
use App\Http\Requests\CreateOrderRequest;

class OrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $orderService;

    public function __construct(OrdersService $orderService)
    {
        $this->orderService = $orderService;
    }

     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->orderService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(CreateOrderRequest $request)
    {
        return $this->orderService->create($request->all());
    }

    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, Products $products)
    public function update(Request $request)
    {
        //return "This is for update";
        return $this->orderService->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(Products $products)
    public function delete(Request $request)
    {
        //return "This is for destroy";
        return $this->orderService->delete($request->all());
    }


}
