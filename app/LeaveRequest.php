<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LeaveRequest extends Model
{
    use HasFactory;
    public $timestamps = false;

    const TYPE_MEDICAL = 1;
    const TYPE_PERSONAL = 2;
    const RESTRICTED_ACCESS_DURATION_DAYS = 30;

    protected $fillable = [
        'student_id',
        'type',
        'file',
        'message',
        'start_date',
        'end_date',
        'status',
        'reason'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    const STATUS_PENDING  = 0;
    const STATUS_APPROVED = 1;
    const STATUS_DENIED   = 2;

    public function durationInDaysInclusive(): int
    {
        if (!$this->start_date || !$this->end_date) {
            return 0;
        }

        return $this->start_date->copy()->startOfDay()->diffInDays(
            $this->end_date->copy()->startOfDay()
        ) + 1;
    }

    public function isActiveOn(?Carbon $date = null): bool
    {
        if (!$this->start_date || !$this->end_date) {
            return false;
        }

        $date = ($date ?: Carbon::today())->copy()->startOfDay();

        return $this->start_date->copy()->startOfDay()->lte($date)
            && $this->end_date->copy()->startOfDay()->gte($date);
    }

    public function shouldRestrictStudentAccess(?Carbon $date = null): bool
    {
        return (int) $this->status === self::STATUS_APPROVED
            && in_array((int) $this->type, [self::TYPE_MEDICAL, self::TYPE_PERSONAL], true)
            && $this->durationInDaysInclusive() >= self::RESTRICTED_ACCESS_DURATION_DAYS
            && $this->isActiveOn($date);
    }

    public static function studentHasActiveLongApprovedLeaveRestriction(int $studentId, ?Carbon $date = null): bool
    {
        $date = $date ?: Carbon::today();

        return static::where('student_id', $studentId)
            ->where('status', self::STATUS_APPROVED)
            ->whereIn('type', [self::TYPE_MEDICAL, self::TYPE_PERSONAL])
            ->whereDate('start_date', '<=', $date->toDateString())
            ->whereDate('end_date', '>=', $date->toDateString())
            ->get()
            ->contains(function (self $leave) use ($date) {
                return $leave->shouldRestrictStudentAccess($date);
            });
    }

    public function getStatusTextAttribute() {
        return [
            0 => 'Pending',
            1 => 'Approved',
            2 => 'Denied',
        ][$this->status];
    }

    public function getStatusColorAttribute() {
        return [
            0 => 'secondary', // grey
            1 => 'primary',   // blue
            2 => 'danger',    // red
        ][$this->status] ?? 'secondary';
    }

    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }
}
