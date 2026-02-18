<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Mail;
use Log;
use App\Mail\ResetPassMail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'surname', 'middlename','confirmation_code', 'is_verified', 'date_of_birth'
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

    public function enrolled_courses(){
        return $this->hasMany('App\StudentEnrolledCourse','user_id','id');
    }

    public function educator_categories(){
        return $this->hasMany('App\EducatorCategory','educator_id','id');
    }
    
    public function student_id(){
        $lenght = strlen($this->student_details->id);
        $prefix = '';
        $number = 4;
        $date = $this->created_at->format('Ymd').$this->student_details->id;
        for ($i=$lenght; $i < $number; $i++) { 
           $prefix.= '0';
        }
        $student_number = $date . $prefix . $this->student_details->id;
        return $student_number;
    
    }

    public function date_of_birth(){
        return Carbon::parse($this->date_of_birth)->format('d.m.Y');
    }

    public function exams(){
        return $this->hasMany('App\Exam','student_id','id');
    }
    
    public function sendPasswordResetNotification($token)
    {
         try {
            Mail::to($this->email)->send(new ResetPassMail($token));
            
        } catch (\Exception $e) {
            Log::info($e);
        }
    }


}
