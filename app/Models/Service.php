<?php

namespace App\Models;

use App\Models\Day;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function days(){
        return $this->belongsToMany(Day::class, 'day_services');
    }
}
