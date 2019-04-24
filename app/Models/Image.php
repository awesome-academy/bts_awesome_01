<?php

namespace App\Models;

use App\Models\Day;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name',
    ];

    public function days(){
        return $this->belongsToMany(Day::class, 'day_images');
    }
}
