<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailVerify extends Model
{
    protected $table = 'email_verify';


    protected $fillable =  ['email','token','role'];
}
