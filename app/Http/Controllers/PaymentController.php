<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\addproduct;
use DB;
use App\User;
use App\cart;
use Carbon\Carbon;

class PaymentController extends Controller
{


    public function show($status,$request)
    {
        
        return $hash;
    }
    public function status(Request $request)
    {
        $findCart = cart::where('Pro_id',$request->lastname)->get();
        foreach ($findCart as $value) {
            $id = $value->id;
        }
        $cart = cart::findOrFail($id);
        $amo = number_format($cart->amount, 2, '.', '');
        $hashSequence = "status||||||udf5|udf4|udf3|udf2|udf1|email|firstname|productinfo|amount|txnid|key";
        $posted = [
            'key' => $cart->key,
            'txnid' => $cart->txnid,
            'amount' => $amo,
            'productinfo' => $cart->productinfo,
            'firstname' => $cart->firstname,
            'email' => $cart->email,
            'udf1' => '',
            'udf2' => '',
            'udf3' => '',
            'udf4' => '',
            'udf5' => '',
            'status' => $request->status,
        ];
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';    
        $hash_string .= $cart->SALT;
        foreach($hashVarsSeq as $hash_var) {
          $hash_string .= '|';
          $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
        }
        $hash = hash('SHA512', $hash_string);
        // dd($cart, $amo, $request->All(), $hash == $request->hash);
        $dataSet = [
            'mihpayid' => $request->mihpayid ,
            'mode' => $request->mode ,
            'status' => $request->status,
            'unmappedstatus' => $request->unmappedstatus ,
            'key' => $request->key ,
            'txnid' => $request->txnid ,
            'amount' => $request->amount ,
            'cardCategory' => $request->cardCategory ,
            'discount' => $request->discount ,
            'net_amount_debit' => $request->net_amount_debit ,
            'addedon' => $request->addedon ,
            'productinfo' => $request->productinfo,
            'firstname' => $request->firstname ,
            'email' => $request->email ,
            'phone' => $request->phone ,
            'hash' => $request->hash ,
            'payment_source' => $request->payment_source ,
            'PG_TYPE' => $request->PG_TYPE ,
            'bank_ref_num' => $request->bank_ref_num ,
            'bankcode' => $request->bankcode ,
            'error' => $request->error ,
            'error_Message' => $request->error_Message ,
            'name_on_card' => $request->name_on_card ,
            'cardnum' => $request->cardnum ,
            'cardhash' => $request->cardhash ,
            'user_id' => $cart->user_id,
        ];
        if ($cart->key == $request->key && $cart->txnid == $request->txnid && $amo == $request->amount && $cart->productinfo == $request->productinfo && $cart->email == $request->email && $hash == $request->hash) {
            if ($request->status == 'success') {
                DB::table('payments')->insert($dataSet);                
                $dataSet['created_at'] = Carbon::now();
                $payment = $dataSet;
                $pro_id = $cart->Pro_id;
                $pro = addproduct::findOrFail($pro_id);
                $user = \Auth::user();         
                $us = new User();
                $us->mailSend($user, $pro);
                session()->flash('success','Online examination link send to '.$user->email);
                return view('payment.success',compact(['pro', 'user', 'payment', 'cart']));
            }
            else{
                DB::table('payments')->insert($dataSet);                
                $dataSet['created_at'] = Carbon::now();
                $payment = $dataSet;
                $pro_id = $cart->Pro_id;
                $pro = addproduct::findOrFail($pro_id);
                $user = \Auth::user();
                session()->flash('message','Sorry, your payment failed. No charges were made.');
                return view('payment.fail',compact(['pro', 'user', 'payment', 'cart']));
            }
        }        
        else{
            return view('payment.failure');
        }
    }
}
