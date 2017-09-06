<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
  use SoftDeletes;

  protected $table = 'tbl_video';

  protected $dates = ['deleted_at'];

  public $timestamps = false;

  protected $guarded = ['id',];
}
