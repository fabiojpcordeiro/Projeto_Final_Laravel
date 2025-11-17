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
        'state_id',
        'city_id',
        'bio',
        'profile_photo',
        'birthdate',
        'resume'
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
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    protected $hidden = ['password', 'pivot'];
    protected $casts = [
        'password' => 'hashed',
        'birthdate' => 'date:Y-m-d',
        'rating' => 'decimal:2',
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y'
    ];
}
