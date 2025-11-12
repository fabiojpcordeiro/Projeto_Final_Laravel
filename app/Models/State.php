<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $incrementing = false;
    protected $keyType = 'int';
    protected $table = 'states';
    protected $fillable = ['id', 'abbr', 'name'];

    public function cities()
    {
        return $this->hasMany(City::class, 'state_id', 'id');
    }
    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'state_id', 'id');
    }
}
