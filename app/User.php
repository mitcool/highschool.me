<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'surname', 'confirmation_code', 'is_verified', 'date_of_birth'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'datetime',
    ];

    public function students(){
        return $this->hasMany('App\ParentStudent','parent_id','id');
    }

    #related to student
    public function documents(){
        return $this->hasMany('App\StudentDocument','student_id','id');
    }

    public function invoice_details(){

        return $this->hasOne('App\InvoiceDetail','user_id','id');
    }

    public function student_details(){
        return $this->hasOne('App\ParentStudent','student_id','id');
    }

    public function active_plan(){
        return $this->hasOne('App\StudentPlan','student_id','id')->where('created_at','<',Carbon::now() )->where('expires_at','>',Carbon::now());
    }

    public function fullname(){
        return $this->name.' '.$this->middlename.' '.$this->surname;
    }
}
