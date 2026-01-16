<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbassadorActivity extends Model
{
    use HasFactory;

    protected $table = 'ambassador_activities';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = [
        'service_id',
        'action_id',
        'link',
        'status',
        'user_id',
        'redeem_points',
    ];

    // Each activity belongs to a service/platform
    public function service() {
        return $this->belongsTo(AmbassadorService::class, 'service_id');
    }

    // Each activity belongs to a specific action
    public function action() {
        return $this->belongsTo(AmbassadorServiceAction::class, 'action_id');
    }

    // Each activity belongs to a user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
