<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkSheetSubSubject extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at',];

  protected $guarded = ['id', ];

  public function workSheetSubject() {
    return $this->belongsTo('App\WorkSheetSubject');
  }

  public function workSheets() {
    return $this->hasMany('App\WorkSheet');
  }
}
