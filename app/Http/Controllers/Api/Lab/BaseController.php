<?php

namespace App\Http\Controllers\Api\Lab;

use App\Http\Controllers\Controller;
use App\Services\LabService;

abstract class BaseController extends Controller
{
    public LabService $service;

    public function __construct(LabService $service) {
        $this->service = $service;
    }
}
