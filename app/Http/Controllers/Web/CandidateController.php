<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\CandidateService;
use Illuminate\Http\Request;

class CandidateController extends Controller
{   
    protected CandidateService $service;

    public function __construct(CandidateService $cand_service){
        parent::__construct($cand_service);
        $this->service = $cand_service;
    }
}
