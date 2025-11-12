<?php

namespace App\Http\Repositories;

use App\Models\Candidate;

class CandidateRepository extends BaseRepository
{
    public function __construct(Candidate $model){
        parent::__construct($model);
    }
    public function me(string $user_id){
        return $this->model
        ->with(['city:id,name', 'state:id,name'])
        ->findOrFail($user_id);
    }
}
