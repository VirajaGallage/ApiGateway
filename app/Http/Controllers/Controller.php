<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponse;
use App\Traits\RequestService;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use ApiResponse;
    use RequestService;
}
