<?php

namespace App\Http\Repositories;

use App\Models\JobOffer;

class JobOfferRepository extends BaseRepository
{

    public function __construct(JobOffer $jobOffer)
    {
        parent::__construct($jobOffer);
    }

    public function index()
    {
        return $this->model::select('id', 'title', 'city', 'salary', 'company_id', 'open_until')
            ->with([
                'company:id,name,logo',
                'dates:id,job_offer_id,work_date'
            ])
            ->latest()
            ->get();
    }

    public function getOffers(string $company_id)
    {
        return $this->model->where('company_id', $company_id)->with('dates')->get();
    }

    public function getByCity(string $query)
    {
        return $this->model::select('id', 'title', 'city', 'salary', 'company_id', 'open_until')
            ->with([
                'company:id,name,logo',
                'dates:id,job_offer_id,work_date'
            ])
            ->where('city', $query)
            ->latest()
            ->get();
    }

    public function findForCandidate(string $id)
    {
        return $this->model
            ->with(['company', 'dates'])
            ->findOrFail($id);
    }

    public function findForCompany(string $id)
    {
        return $this->model
            ->with(['candidates', 'dates'])
            ->findOrFail($id);
    }
}
