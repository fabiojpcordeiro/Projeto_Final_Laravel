<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Candidate extends Authenticatable
{
    use HasApiTokens;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'state',
        'city',
        'bio',
        'profile_photo',
        'birthdate',
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
        'password' => 'hashed',
        'birthdate' => 'date:Y-m-d',
        'rating' => 'decimal:2',
    ];
}
