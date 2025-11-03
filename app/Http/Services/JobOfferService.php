<?php

namespace App\Http\Services;

use App\Http\Repositories\JobDatesRepository;
use App\Http\Repositories\JobOfferRepository;

class JobOfferService extends BaseService
{
    private JobOfferRepository $job_repository;
    private JobDatesRepository $dates_repository;

    public function __construct(JobOfferRepository $job_repository, JobDatesRepository $dates_repository)
    {
        $this->job_repository = $job_repository;
        $this->dates_repository = $dates_repository;
        parent::__construct($job_repository);
    }
    public function store(array $data)
    {
        $jobOffer = $this->job_repository->store([
            'company_id'   => $data['company_id'],
            'title'        => $data['title'],
            'description'  => $data['description'],
            'city'         => $data['city'],
            'sector'       => $data['sector'],
            'salary'       => $data['salary'],
            'open_until'   => $data['open_until'],
            'is_temporary' => $data['is_temporary']
        ]);

        if (!empty($data['dates'])) {
            foreach ($data['dates'] as $date) {
                $this->dates_repository->store([
                    'job_offer_id' => $jobOffer->id,
                    'work_date' => $date
                ]);
            }
        }
        return $jobOffer;
    }

    public function getOffers(string $company_id){
        return $this->job_repository->getOffers($company_id);
    }
    public function viewOffer($job_offer){
        return $this->job_repository->viewOffer($job_offer);
    }
    public function update($job, $data){
        $jobOffer = $this->job_repository->update($job, 
        [
            'company_id'   => $data['company_id'],
            'title'        => $data['title'],
            'description'  => $data['description'],
            'city'         => $data['city'],
            'sector'       => $data['sector'],
            'salary'       => $data['salary'],
            'open_until'   => $data['open_until'],
            'is_temporary' => $data['is_temporary']
        ]);

        if (!empty($data['dates'])) {
            $jobOffer->dates()->delete();
            foreach ($data['dates'] as $date) {
                $this->dates_repository->store([
                    'job_offer_id' => $jobOffer->id,
                    'work_date' => $date
                ]);
            }
        }
        return $jobOffer;
    }
}
