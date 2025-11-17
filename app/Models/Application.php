<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Application extends Pivot
{
    protected $table = 'candidate_job';
    protected $fillable = ['message', 'candidate_id', 'job_offer_id'];
    protected $appends = ['status_label'];
    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y'
    ];
    public function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
    public function jobOffer(){
        return $this->belongsTo(JobOffer::class, 'job_offer_id', 'id');
    }
    

    public function getStatusLabelAttribute()
    {
        return [
            'applied'   => 'Em análise',
            'interview' => 'Entrevista',
            'approved'  => 'Aprovado',
            'rejected'  => 'Rejeitado',
        ][$this->status] ?? 'Desconhecido';
    }
}
