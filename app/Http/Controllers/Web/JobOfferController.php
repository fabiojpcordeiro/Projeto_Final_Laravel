<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobOffer\CreateJobOfferRequest;
use App\Http\Requests\JobOffer\UpdateJobOfferRequest;
use App\Http\Services\JobOfferService;
use App\Models\JobOffer;
use Auth;

class JobOfferController extends Controller
{

    public function __construct(private JobOfferService $service) {}

    public function index()
    {
        $jobs = $this->service->getOffers(Auth::user()->company_id);
        return view('jobs/jobs', compact('jobs'));
    }

    public function create()
    {
        $company = Auth::user()->company;
        return view('jobs/create', compact('company'));
    }

    public function store(CreateJobOfferRequest $request)
    {
        $this->service->store($request->validated());
        return back()->with('success', 'Vaga criada com sucesso!');
    }

    public function edit(JobOffer $job_offer)
    {
        $company = Auth::user()->company;
        $job = $this->service->viewOffer($job_offer);
        return view('jobs.edit', compact('job_offer', 'company'));
    }
    public function update(UpdateJobOfferRequest $request, JobOffer $job_offer){
        $this->service->update($job_offer, $request->validated());
        return redirect()->route('dashboard')->with('success', 'Vaga atualizada com sucesso!');
    }
}
