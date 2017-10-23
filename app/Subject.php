<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at',];

  protected $guarded = ['id', ];

  public function subSubjects() {
    return $this->hasMany('App\SubSubject');
  }

  public function books() {
    return $this->hasMany('App\Book');
  }
}
