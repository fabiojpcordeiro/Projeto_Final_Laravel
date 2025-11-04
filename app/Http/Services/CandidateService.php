<?php
namespace App\Http\Services;

use App\Http\Repositories\CandidateRepository;

class CandidateService extends BaseService{

    public function __construct(CandidateRepository $repository)
    {
        parent::__construct($repository);
    }
}