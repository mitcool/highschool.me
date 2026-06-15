<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\ParentExtraServiceType;
use Carbon\Carbon;

class ParentExtraService extends Model
{
    use HasFactory;

    const STATUSES = ['Pending','Sent','Delivered'];

    ### After 90days from graduation the price of diploma package is doubled !!!!
    public function actual_price_for_diploma_package(){
       if(Carbon::parse($this->student->diplomas->last()->created_at)->addDays(90) > Carbon::parse($this->created_at)){
          return $this->diploma_package_price = ParentExtraServiceType::find(8)->price;
       }
       else{
          return $this->diploma_package_price = ParentExtraServiceType::find(8)->price * 2;
       }
    }

    protected $fillable = ['copies','service_type','student_id','status'];

    public function student(){
        return $this->hasOne('App\User','id','student_id');
    }

    public function type(){
        return $this->hasOne('App\ParentExtraServiceType','id','service_type');
    }

    public function status(){
        return self::STATUSES[$this->status];
    }

    public function price(){
        if($this->service_type == 1){
            return $this->type->price;
        }
        elseif($this->service_type == 2){
            return $this->type->price * $this->copies;
        }
        elseif($this->service_type == 3){
            return ($this->type->price + $this->actual_price_for_diploma_package());
        }
        elseif($this->service_type == 4){
             return ($this->type->price + $this->actual_price_for_diploma_package());
        }
        elseif($this->service_type == 5){
            return (($this->type->price * $this->copies) + $this->actual_price_for_diploma_package());
        }
        elseif($this->service_type == 6){
            return $this->type->price;
        }
        elseif($this->service_type == 7){
             return $this->type->price * $this->copies;
        }
        elseif($this->service_type == 8){
            return $this->actual_price_for_diploma_package();
        }
    }
}
