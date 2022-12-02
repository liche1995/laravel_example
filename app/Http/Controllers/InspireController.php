<?php

namespace App\Http\Controllers;

use App\Services\InspireService;
use Illuminate\Http\Request;

class InspireController extends Controller
{   
    private $service;
    public function __construct(InspireService $inspireService)
    {
        $this->service = $inspireService;
    }
    public function inspire()
    {
        # direct print method
        # return 'inspire';

        # return (new InspireService())->inspire();

        return $this->service->inspire();
    }
}
