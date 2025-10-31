<?php
namespace App\Http\Repositories;

use App\Models\Company;
use App\Models\JobOffer;

class JobOfferRepository extends BaseRepository{
    public function __construct(JobOffer $jobOffer){
        parent::__construct($jobOffer);
    }
}