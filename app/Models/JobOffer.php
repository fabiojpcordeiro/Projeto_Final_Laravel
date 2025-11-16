<?php

namespace App\Models;

use Carbon\Carbon;
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
        'open_until',
        'is_temporary'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function candidates()
    {
        return $this
            ->belongsToMany(Candidate::class, 'candidate_job')
            ->using(Application::class)
            ->withPivot(['id', 'status', 'message', 'company_message'])
            ->withTimestamps();
    }
    public function dates(){
        return $this->hasMany(JobDates::class, 'job_offer_id', 'id');
    }

    public function formattedDates() :array
    {
        return $this->dates
        ->pluck('date')
        ->map(fn($date)=>Carbon::parse($date)->format('Y-m-d'))
        ->toArray();
    }

    protected $casts = [
        'open_until'=>'datetime:d/m/Y',
        'created_at'=> 'datetime:d/m/Y',
        'updated_at'=> 'datetime:d/m/Y'
    ];
}
