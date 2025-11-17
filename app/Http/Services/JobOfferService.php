<?php

namespace App\Http\Services;

use App\Http\Repositories\JobDatesRepository;
use App\Http\Repositories\JobOfferRepository;

use function PHPSTORM_META\map;

class JobOfferService extends BaseService
{
    private JobOfferRepository $job_repository;
    private JobDatesRepository $dates_repository;

    public function __construct(JobOfferRepository $job_repository, JobDatesRepository $dates_repository){
        $this->job_repository = $job_repository;
        $this->dates_repository = $dates_repository;
        parent::__construct($job_repository);
    }

    public function index(){
        return $this->job_repository->index();
    }

    public function store(array $data){
        $jobOffer = $this->job_repository->store($data);

        if (!empty($data['dates'])) {
            foreach ($data['dates'] as $date) {
                $this->dates_repository->store([
                    'job_offer_id' => $jobOffer->id,
                    'work_date' => $date
                ]);
            }
        }
        return $jobOffer->load('dates');
    }

    public function getOffers(string $company_id){
        return $this->job_repository->getOffers($company_id);
    }


    public function findForCandidate(string $id){
        return $this->job_repository->findForCandidate($id);
    }

    public function findForCompany(string $id){
        return $this->job_repository->findForCompany($id);
    }

    public function update($job, $data){
        $jobOffer = $this->job_repository->update($job, $data);

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

    public function getByCity(string $query){
        return $this->job_repository->getByCity($query);
    }

    public function getCandidatesByOffer(string $job_offer_id){
        return $this->repository->getCandidatesByOffer($job_offer_id);
    }
}
