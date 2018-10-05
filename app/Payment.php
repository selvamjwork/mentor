<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tzsk\Payu\Fragment\Payable;

class Payment extends Model
{
    protected $table = 'payments';
    /**
     * Assignable array.
     *
     * @var array
     */
    protected $fillable = [
        'mihpayid','mode','status','unmappedstatus','key','txnid','amount','cardCategory','discount','net_amount_debit','addedon','productinfo','firstname','email','phone','hash','payment_source','PG_TYPE','bank_ref_num','bankcode','error','error_Message','name_on_card','cardnum','cardhash','user_id',
    ];

    /**
     * Manage Timestamps.
     *
     * @var bool
     */
    public $timestamps = true;
}
