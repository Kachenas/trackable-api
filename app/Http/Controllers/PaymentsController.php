<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentsService;
use App\Http\Requests\CreatePaymentRequest;

class PaymentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $paymentService;

    public function __construct(PaymentsService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        return $this->paymentService->index();
    }

    public function create(CreatePaymentRequest $request)
    {
        return $this->paymentService->create($request->all());
    }

    public function update(Request $request)
    {
        return $this->paymentService->update($request->all());
    }

    public function delete(Request $request)
    {
        return $this->paymentService->delete($request->all());
    }

}
