<?php

namespace App\services;

use App\Services\CustomerService;
use App\Traits\RequestService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CustomerService
{
    use RequestService;
    public $baseUri;
    public $secret;
    public function __construct()
    {
        $this->baseUri = config('services.customer.base_uri');
        $this->secret = config('services.customer.secret');
    }
    public function fetchads()
    {
        return $this->request('GET', '/api/Ad/index');
    }
    public function fetchAdById($ads)
    {
        return $this->request('GET', "/api/Ad/index/{$ads}");
    }
    public function createAd($data)
    {
        return $this->request('POST', '/api/Ad/create-ad', $data);
    }
    public function update($ads, $data)
    {
        return $this->request('PUT', "/api/Ad/{$customer}", $data);
    }
    public function deleteAd($ads)
    {
        return $this->request('DELETE', "/api/Ad/{$ads}");
    }
    public function sendEmail()
    {
        return $this->request('POST', "/api/Ad/");
    }
} 