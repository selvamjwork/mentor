<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use App\Notifications\sendEmailVerifyToken;
use App\Notifications\confrimMail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'password', 'address1', 'address2', 'city', 'pincode', 'gst', 'email_verified', 'payment_complited',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRole($role){
        
        $userRoles = json_decode(\Auth::User()->UserRole,true);

        foreach ($userRoles as $Role) 
        {
            if($Role['role'] == $role)
            {
              return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function sendEmail($user)
    {
        $EmailVerifyToken = Str::random(60);

        $emailVerify = DB::table('email_verify')->insert([
            'email'=>$user->email,
            'token'=>$EmailVerifyToken,
            'created_at'=>\Carbon\Carbon::now(),
        ]);
        $user->notify(new sendEmailVerifyToken($EmailVerifyToken));
    }

    public function mailSend($user, $pro)
    {
        $userexpired = DB::table('userexpired')->insert([
            'pro_id' => $pro->id,
            'exam_url' => $pro->exam_url,
            'user_email'=> $user['email'],
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),
        ]);
        $exam_url = $pro->exam_url;
        $user->notify(new confrimMail($exam_url));
    }
}
