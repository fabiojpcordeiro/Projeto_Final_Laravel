<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'user_id', 'bio', 'profile_photo'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function skills(){
        return $this->belongsToMany(Skill::class, 'candidate_skill')->withTimestamps();
    }
    public function jobs(){
        return $this->belongsToMany(JobOffer::class, 'candidate_job')->withTimestamps();
    }
}
