<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkSheetSubject extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at',];

  protected $guarded = ['id', ];

  public function workSheets() {
    return $this->hasMany('App\WorkSheet');
  }

  public function workSheetSubSubjects() {
    return $this->hasMany('App\WorkSheetSubSubject');
  }
}
