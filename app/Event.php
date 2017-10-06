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

}
