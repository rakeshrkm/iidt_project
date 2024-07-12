<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseTopic extends Model
{
    use HasFactory,SoftDeletes ;

    protected $table = 'course_topics';
    protected $fillable = ['course_id','topics','status'];

    // public static function boot()
    // {
    //     parent::boot();

    //     // if (auth()->check()) {
    //     //     static::creating(function ($model) {
    //     //         $model->created_by = auth()->user()->id;
    //     //     });

    //     //     static::updating(function ($model) {
    //     //         $model->updated_by = auth()->user()->id;
    //     //     });

    //     //     static::deleting(function ($model) {
    //     //         $model->deleted_by = auth()->user()->id;
    //     //     });
    //     // }
    // }


    public function getCourseName(){
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

}
