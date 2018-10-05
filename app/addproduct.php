<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addproduct extends Model
{
    protected $table = 'add_products';

    protected $fillable=[
    	'p_name',
        'p_discription',
        'p_d_discription',
    	'p_price',
        'p_logo',
        'exam_url',
        'admin_id',
    	'is_deleted',
    ];

    public function admin(){
    	return $this->belongsTo('App\Admin');
    }
}
