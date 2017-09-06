<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use softDeletes;

    protected $table = 'tbl_team';

    protected $dates = ['deleted_at'];

    public $timestamps = false;

    protected $guarded = ['id',];
}
