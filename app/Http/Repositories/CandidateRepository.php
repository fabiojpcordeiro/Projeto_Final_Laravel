<?php

namespace App\Http\Repositories;

use App\Models\Candidate;

class CandidateRepository extends BaseRepository
{
    public function __construct(Candidate $model){
        parent::__construct($model);
    }
}
