<?php

namespace App\Http\Services;

use App\Http\Repositories\ApplicationRepository;

class ApplicationService extends BaseService{

    public function __construct(ApplicationRepository $repository){
        parent::__construct($repository);
    }
}