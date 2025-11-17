<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'public_email',
        'state',
        'city',
        'street',
        'number',
        'sector',
        'about',
        'logo',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'company_id', 'id');
    }
    public function jobs()
    {
        return $this->hasMany(JobOffer::class, 'company_id', 'id');
    }
    public function reviews(){
        return $this->hasMany(CompanyReview::class);
    }
    public function getCity(){
        return $this->belongsTo(City::class, 'city', 'id');
    }
    
}
