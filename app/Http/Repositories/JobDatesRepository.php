<?php
namespace App\Http\Repositories;
use App\Models\JobDates;

class JobDatesRepository extends BaseRepository{
    public function __construct(JobDates $model)
        {
            parent::__construct($model);
        }
}