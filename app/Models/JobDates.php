<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobDates extends Model
{
    protected $fillable = ['job_offer_id', 'work_date'];
    protected $casts = ['work_date'=> 'date'];

    public function jobOffer(){
        return $this->belongsTo(JobOffer::class, 'job_offer_id', 'id');
    }
}