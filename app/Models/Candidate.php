<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Candidate extends Authenticatable
{
    protected $fillable = [
        'bio',
        'profile_photo',
        'password',
        'state',
        'city',
    ];

    public function skills()
    {
        return $this
            ->belongsToMany(Skill::class, 'candidate_skill')
            ->withTimestamps();
    }
    public function jobs()
    {
        return $this
            ->belongsToMany(JobOffer::class, 'candidate_job')
            ->withPivot('status')
            ->withTimestamps();
    }
    protected $hidden = ['password'];
    protected $casts = [
        'password' => 'hashed'
    ];
}
