<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = 'cart';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','key','txnid','amount','Pro_id','productinfo','firstname','email','hash','udf1','udf2','udf3','udf4','udf5','SALT',
    ];
}
