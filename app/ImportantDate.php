<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class ImportantDate extends Model
{
    use SoftDeletes;

    protected $guarded = ['id', ];

    public function setDateAttribute($value) {
      $this->attributes['date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function nicedate() {
        return Carbon::parse($this->date)->format('d M');
    }
}
