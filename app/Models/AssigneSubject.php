<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssigneSubject extends Model
{
    // use HasFactory;
    public function class_name(){

    	return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function school_subject(){

    	return $this->belongsTo(SchoolSubject::class,'subject_id','id');
    }
}
