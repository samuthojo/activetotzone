<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkSheet extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at',];

    protected $guarded = ['id', ];

    public function workSheetGrade() {
      return $this->belongsTo('App\WorkSheetGrade');
    }

    public function workSheetSubject() {
      return $this->belongsTo('App\WorkSheetSubject');
    }

    public function workSheetSubSubject() {
      return $this->belongsTo('App\WorkSheetSubSubject');
    }
}
