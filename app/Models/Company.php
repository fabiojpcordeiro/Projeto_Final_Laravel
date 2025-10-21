<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'company_email',
        'city',
        'sector',
        'about'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function jobs()
    {
        return $this->hasMany(JobOffer::class, 'company_id', 'id');
    }
}
