<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Event extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at',];

    protected $guarded = ['id',];

    public function setDateAttribute($value) {
      $this->attributes['date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function nicedate() {
        return Carbon::parse($this->date)->format('M jS');
    }

    public function getLocationName(){
        return "Activetotz " . ["Kinyerezi", "Mikocheni"][$this->location];
    }


    public function getLocationCoords(){
        return ["{lat: -6.8468984, lng: 39.153128}", "{lat: -6.76263, lng: 39.2501917}"][$this->location];
    }
}
