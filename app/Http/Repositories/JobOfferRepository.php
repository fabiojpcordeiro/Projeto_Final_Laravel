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
    public function viewOffer(string $job_id){
        return $this->model->with('dates')->find($job_id);
    }

}