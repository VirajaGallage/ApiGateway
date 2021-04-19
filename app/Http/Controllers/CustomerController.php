<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use App\Services\StaffService; 
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $CustomerService;
    private $StaffService;
    public function __construct(CustomerService $CustomerService, StaffService $StaffService)
    {
        $this->CustomerService = $CustomerService;
        $this->StaffService = $StaffService;
    }
    public function index()
    {
        return $this->successResponse($this->CustomerService->fetchads());
    }
    public function show($Customer)
    {
        return $this->successResponse($this->CustomerService->fetchAdById($Customer));
    }
    public function store(Request $request)
    {
        return $this->successResponse($this->CustomerService->createAd($request->all()));
    }
    public function update(Request $request, $Ad)
    {
        return $this->successResponse($this->CustomerService->updateCustomer($Ad, $request->all()));
    }
    public function destroy($Customer)
    {
        return $this->successResponse($this->CustomerService->deleteAd($Ad));
    }
}