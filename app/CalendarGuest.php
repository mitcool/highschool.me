<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarGuest extends Model
{
  
    protected $connection = 'distributor_info';

    protected $table = 'calendar_guests';
}
