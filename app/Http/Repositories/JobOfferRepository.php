<?php
namespace App\Http\Repositories;

use App\Models\JobOffer;

class JobOfferRepository extends BaseRepository{
    public function __construct(JobOffer $jobOffer){
        parent::__construct($jobOffer);
    }

    public function getOffers(string $company_id){
        return $this->model->where('company_id', $company_id)->with('dates')->get();
    }

    public function search(string $query){
        return $this->model
        ->where('title', 'like', "%$query%")
        ->orWhere('city', 'like', "%$query%")
        ->with('company')
        ->get();
    }

    public function findForCandidate(string $id){
        return $this->model
            ->with(['company', 'dates'])
            ->findOrFail($id);
    }
    
    public function findForCompany(string $id){
        return $this->model
            ->with(['candidates', 'dates'])
            ->findOrFail($id);
    }
}