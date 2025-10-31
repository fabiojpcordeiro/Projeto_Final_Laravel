<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $incrementing = false;
    protected $keyType = 'int';
    protected $table = 'cities';
    protected $fillable = ['id', 'name', 'state_id'];

    public function state(){
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
