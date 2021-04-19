<?php

namespace App\Http\Controllers;

use App\Services\StaffService;
use App\Services\CustomerService;
use App\Traits\ApiResponse;
use App\Traits\RequestService;

class StaffController extends Controller
{
    use ApiResponse;
    use RequestService;

    private $StaffService;
    public function __construct(StaffService $StaffService, CustomerService $CustomerService)
    {
        $this->StaffService = $StaffService;
    }
    public function index()
    {
        return $this->successResponse($this->StaffService->index());
    }
    public function show($Ad)
    {
        return $this->successResponse($this->StaffService->getAdbyID($Ad));
    }
    public function store(Request $request)
    {
        return $this->successResponse($this->StaffService->insertliveAd($request->all()));
    }
    public function update(Request $request, $Staff)
    {
        return $this->successResponse($this->StaffService->updateStaff($Staff, $request->all()));
    }
    public function destroy($Staff)
    {
        return $this->successResponse($this->StaffService->deleteStaff($Staff));
    }
}