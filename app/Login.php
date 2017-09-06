<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Login extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_login';

    protected $dates = ['deleted_at'];

    public $timestamps = false;

    protected $guarded = ['id',];
}
