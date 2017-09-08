<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'date',];

    protected $guarded = ['id',];

    /**
    * The storage format of the model's date columns.
    *
    * @var string
    */
   protected $dateFormat = 'Y-m-d';

}
