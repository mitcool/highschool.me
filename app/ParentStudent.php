<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use App\StudentDocument;

class ParentStudent extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['status','expired_at','is_disabled','grade','grade_started_at','parent_id','student_id','track','feedback','tokens','gender','student_location_id','ethnicity_id','language_level'];

    protected $casts = [
        'grade_started_at' => 'datetime',
    ];

    const LANGUAGE_LEVELS = ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'];
    const GRADE_LEVELS = [9, 10, 11, 12];
    const AUTO_GRADE_PROMOTION_DAYS = 365;

    protected static $supportsGradeStartedAtColumn;

    //STATUSES
    const CREATED = 0;
    const PAID_APPLICATION_FEE = 1;
    const DOCUMENTS_APPROVED = 2;
    const ACTIVE = 3;
    const GRADUATED = 4;

    public function status_name(){
        $status_name = '';
        if($this->status == 0){
            $status_name = 'No uploaded documents';
        }
        elseif($this->status == 1){
            $status_name = 'Application fee paid';           
        }
        elseif($this->status == 2){
            $status_name = 'Approved documents';            
        }
        elseif($this->status == 3){
            $status_name = 'Enrollment fee paid (Active student)';           
        }
        return $status_name;
    }

    public function student(){
        return $this->hasOne('App\User','id','student_id');
    }

    public function parent(){
        return $this->hasOne('App\User','id','parent_id');
    }

    public function student_location()
    {
        return $this->belongsTo('App\StudentLocation', 'student_location_id', 'id');
    }

    public function ethnicity()
    {
        return $this->belongsTo('App\Ethnicity', 'ethnicity_id', 'id');
    }

    public function approved_documents_count(){
        return StudentDocument::where('is_required',1)->where('student_id',$this->student_id)->where('is_approved',1)->count();
    }

     public function rejected_documents_count(){
        return StudentDocument::where('is_required',1)->where('student_id',$this->student_id)->where('is_approved',2)->count();
    }
    
    public function plans(){
        return $this->hasMany('App\StudentPlan','student_id','student_id');
    }

    public function track_name(){
        if($this->track == 1){
           return '24-Credit-Graduation Standard Track';             
        }
        elseif($this->track==2){
            return '18-Credit-ACCEL Graduation Track';
        }
        elseif($this->track==3){
            return 'Credit Transfer Track';
        }
    }

    public function usesTransferProgramGradeRule(?int $upgradeOption = null): bool
    {
        return (int) $this->track === 3
            || ((int) $this->track === 4 && (int) $upgradeOption === 3);
    }

    public function canSelectGrade(?int $upgradeOption = null): bool
    {
        return !$this->usesTransferProgramGradeRule($upgradeOption);
    }

    public function canAutoPromoteGrade(): bool
    {
        return in_array((int) $this->track, [1, 2, 4], true)
            && in_array((int) $this->grade, [9, 10, 11], true);
    }

    public function nextGradeLevel(): ?int
    {
        if (!$this->canAutoPromoteGrade()) {
            return null;
        }

        return (int) $this->grade + 1;
    }

    public function isGradePromotionDue(?Carbon $now = null): bool
    {
        if (!$this->canAutoPromoteGrade() || !$this->grade_started_at) {
            return false;
        }

        $now = ($now ?: Carbon::now())->copy()->startOfDay();

        return $this->grade_started_at->copy()
            ->startOfDay()
            ->addDays(self::AUTO_GRADE_PROMOTION_DAYS)
            ->lte($now);
    }

    public static function supportsGradeStartedAt(): bool
    {
        if (is_null(static::$supportsGradeStartedAtColumn)) {
            static::$supportsGradeStartedAtColumn = Schema::hasColumn('parent_students', 'grade_started_at');
        }

        return static::$supportsGradeStartedAtColumn;
    }
}
