<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubSubject extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at',];

  protected $guarded = ['id', ];

  public function subject() {
    return $this->belongsTo('App\Subject');
  }

  public function books() {
    return $this->hasMany('App\Book');
  }
}
