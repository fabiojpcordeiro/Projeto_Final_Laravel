<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'company_email',
        'city',
        'sector',
        'about'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'company_id', 'id');
    }
    public function jobs()
    {
        return $this->hasMany(JobOffer::class, 'company_id', 'id');
    }
}
