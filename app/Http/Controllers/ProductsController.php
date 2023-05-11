<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Services\ProductsService;


class ProductsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $productService;

    public function __construct(ProductsService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->productService->index();
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function create(CreateProductRequest $request)
    {
        return $this->productService->create($request->all());
        
    }

    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, Products $products)
    public function update(Request $request)
    {
        //return "This is for update";
        return $this->productService->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(Products $products)
    public function delete(Request $request)
    {
        //return "This is for destroy";
        return $this->productService->delete($request->all());
    }
}
//https://www.youtube.com/watch?v=GTiBa9bPCZc