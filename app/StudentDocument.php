<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDocument extends Model
{
    use HasFactory;

     protected $fillable = ['is_approved'];

    public function document_type(){
        return $this->hasOne('App\DocumentType','id','type');
    }

    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }

    public $timestamps = false;

    // Outside public/ so documents are only reachable through authorized routes.
    public static function directory($student_id){
        return storage_path('app/documents/'.$student_id);
    }

    public function filePath(){
        $path = self::directory($this->student_id).'/'.basename($this->file);
        if(file_exists($path)){
            return $path;
        }
        // Uploaded before documents were moved out of public/
        return base_path('public/documents/'.$this->student_id.'/'.basename($this->file));
    }
}
