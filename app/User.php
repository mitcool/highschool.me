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
        'name', 
        'email', 
        'password', 
        'role_id', 
        'must_change_password',
        'surname', 
        'middlename',
        'confirmation_code', 
        'is_verified', 
        'date_of_birth', 
        'employment_type', 
        'is_counsellor',
        'avatar'
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
        'must_change_password' => 'boolean',
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
        if (!$this->created_at) {
            return null;
        }

        // Use the registration date as the student ID prefix: yymmdd.
        $date = $this->created_at->format('ymd');

        // Count this student's position among students registered on the same day.
        $dailySequence = self::where('role_id', 4)
            ->whereDate('created_at', $this->created_at->toDateString())
            ->where(function ($query) {
                $query->where('created_at', '<', $this->created_at)
                    ->orWhere(function ($query) {
                        $query->where('created_at', $this->created_at)
                            ->where('id', '<=', $this->id);
                    });
            })
            ->count();

        // Pad the daily sequence to 4 digits, for example 1 => 0001.
        return $date . str_pad($dailySequence, 4, '0', STR_PAD_LEFT);
    
    }

    public function date_of_birth(){
        return Carbon::parse($this->date_of_birth)->format('d.m.Y');
    }

    public function exams(){
        return $this->hasMany('App\Exam','student_id','id');
    }

    public function login_verifications()
    {
        return $this->hasMany('App\LoginVerification', 'user_id', 'id');
    }
    
    public function sendPasswordResetNotification($token)
    {
         try {
            Mail::to($this->email)->send(new ResetPassMail($token));
            
        } catch (\Exception $e) {
            Log::info($e);
        }
    }

    public function diplomas(){
        return $this->hasMany('App\Diploma','student_id');
    }

    public function educator_details(){
        return $this->hasOne('App\EducatorDetail','educator_id');
    }

    public function technical_setup(){
        return $this->hasOne('App\EducatorTechincalSetup','educator_id');
    }

    public function certificates(){
        return $this->hasMany('App\EducatorCertificate','educator_id');
    }
    public function qualifications(){
        return $this->hasMany('App\EducatorQualificationDetail','educator_id');
    }

    public function experience(){
        return $this->hasMany('App\EducatorExperience','educator_id');
    }
    public function tax_details(){
        
        return $this->hasOne('App\EducatorTaxDetail','educator_id');
    }

    public function wise_details(){
        
        return $this->hasOne('App\EducatorWiseDetail','educator_id');
    }
    
}
