<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobOfferResource;
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
        $jobs = $this->service->index();
        return JobOfferResource::collection($jobs);
    }

    public function show(JobOffer $job_offer){
        return response()->json(['data' => $this->service->findForCandidate($job_offer->id)]);
    }

    public function search(Request $request){
        $query = $request->input('query');
        if(!$query || $query == ''){
            return $this->index();
        }
        $jobs = $this->service->getBycity($query);
        return JobOfferResource::collection($jobs);
    } 
}
