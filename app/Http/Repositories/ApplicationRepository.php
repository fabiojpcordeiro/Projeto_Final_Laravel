<?php

namespace App\Http\Repositories;

use App\Models\Application;

class ApplicationRepository extends BaseRepository{

    public function __construct(Application $model){
        parent::__construct($model);
    }

    public function show($id){
        return $this->model
        ->with('jobOffer.dates')
        ->findOrFail($id);
    }
}