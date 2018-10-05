<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\addproduct;
use Illuminate\Support\Facades\Input;
use Auth;
use Hash;
use App\cart;


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // dd("dd");
        $this->middleware('auth')->except('index');
        $this->middleware('isEmailVerified')->except('index');
    }

    public function index(){
        $add  = addproduct::with(['admin'])->where('is_deleted','no')->paginate(8);
        return view('product.index',compact(['add']));
    }

    public function show(addproduct $add)
    {
    	$KEY = env('PAYU_KEY', 'gA02ES');
        $SALT = env('PAYU_SALT', 'RleaotGo');
        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        $user = Auth::user();
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|||||SALT";
        
        $posted = [
            'key' => 'gA02ES',
            'txnid' => $txnid,
            'amount' => $add->p_price,
            'productinfo' => $add->p_discription,
            'firstname' => $user->name,
            'email' => $user->email,
            'udf1' => '',
            'udf2' => '',
            'udf3' => '',
            'udf4' => '',
            'udf5' => '',
        ];
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';    
        foreach($hashVarsSeq as $hash_var) {
          $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
          $hash_string .= '|';
        }
        $hash_string .= $SALT;
        $hash = hash('SHA512', $hash_string);
        cart::create([
            'user_id' => $user->id,
            'key' => $KEY,
            'txnid' => $txnid,
            'amount' => $add->p_price,
            'Pro_id' => $add->id,
            'productinfo' => $add->p_discription,
            'firstname' => $user->name,
            'email' => $user->email,
            'hash' => $hash,
            'udf1' => '',
            'udf2' => '',
            'udf3' => '',
            'udf4' => '',
            'udf5' => '',
            'SALT' => $SALT,
        ]);
        return view('product.view',compact(['add','KEY','txnid','hash']));
    }
}