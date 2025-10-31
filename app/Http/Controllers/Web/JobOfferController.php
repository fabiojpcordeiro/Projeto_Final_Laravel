<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\JobOfferService;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{

    public function __construct(private JobOfferService $service){}
    public function index(){
        $jobs = $this->service->all();
        return view('jobs', compact('jobs'));
    }
}
