<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'student_id',
        'type',
        'file',
        'message',
        'start_date',
        'end_date',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    const STATUS_PENDING  = 0;
    const STATUS_APPROVED = 1;
    const STATUS_DENIED   = 2;

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
