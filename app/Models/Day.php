<?php

namespace App\Models;

use App\Models\Tour;
use App\Models\Image;
use App\Models\Service;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        'description',
        'start_at',
        'end_at',
        'province_id',
        'tour_id',
    ];

    public function tours(){
        return $this->belongsTo(Tour::class);
    }

    public function images(){
        return $this->belongsToMany(Image::class, 'day_images');
    }

    public function provinces(){
        return $this->hasOne(Province::class);
    }
    
    public function services(){
        return $this->belongsToMany(Service::class, 'day_services');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($day) {
            $day->images()->detach();
            $day->services()->detach();
            $day->images()->delete();
        });
    }
}
