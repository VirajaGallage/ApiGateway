<?php

namespace App\Services;

use App\Http\Controllers\StaffController;
use App\Traits\ApiResponse;
use App\Traits\RequestService;
use Illuminate\Http\Request;

class StaffService
{
    use RequestService;
    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.Staffs.base_uri');
        $this->secret = config('services.Staffs.secret');
    }
    public function index()
    {
        return $this->request('GET', '/api/staff/index');
    }
    public function getAdbyID($Ad)
    {
        return $this->request('GET', "/api/staff/index/{$Ad}");
    }
    public function insertliveAd($data)
    {
        return $this->request('POST', '/api/staff/insertliveAd', $data);
    }
    public function updateliveAds($ads, $data)
    {
        return $this->request('PUT', "/api/staff/live-ad/{$Staff}", $data);
    }
    public function deleteliveAds($ads)
    {
        return $this->request('DELETE', "/api/staff/{$ads}");
    }
}