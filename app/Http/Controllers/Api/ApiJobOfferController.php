<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Services\JobOfferService;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class ApiJobOfferController extends Controller
{   
    private JobOfferService $service;

    public function __construct(JobOfferService $service){
        $this->service = $service;
    }

    public function index(){
        return response()->json(['data'=>$this->service->all()]);
    }

    public function show(JobOffer $job_offer){
        return response()->json(['data' => $this->service->findForCandidate($job_offer->id)]);
    }

    public function search(Request $request){
        $query = $request->input('query');
        if(!$query){
            return response()->json(['data'=>$this->service->all()]);
        }
        return response()->json(['data' => $this->service->search($query)]);
    }
    
}
