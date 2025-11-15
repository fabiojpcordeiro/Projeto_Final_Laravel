<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'candidate_job';
    protected $fillable = ['message', 'candidate_id', 'job_offer_id'];

    public function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
    public function jobOffer(){
        return $this->belongsTo(JobOffer::class, 'job_offer_id', 'id');
    }
    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y'
    ];
}
