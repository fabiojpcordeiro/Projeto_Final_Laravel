<?php

namespace App\Http\Services;

use App\Http\Repositories\JobOfferRepository;

class JobOfferService extends BaseService
{
    private JobOfferRepository $job_repository;

    public function __construct(JobOfferRepository $repository)
    {
        $this->job_repository = $repository;
        parent::__construct($repository);
    }
}
