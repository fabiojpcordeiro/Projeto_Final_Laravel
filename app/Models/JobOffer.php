<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'description',
        'city',
        'sector',
        'salary',
        'is_temporary'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function applicants(){
        return $this->belongsToMany(Candidate::class, 'candidate_job')->withTimestamps(); 
    }
}
