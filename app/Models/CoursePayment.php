<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoursePayment extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'course_payments';
    protected $fillable = ['user_id','course_id','college_id', 'coupon_code','amount', 'amount_screen_shot','status'];

    public static function boot()
    {
        parent::boot();

        if (auth()->check()) {
            static::creating(function ($model) {
                $model->created_by = auth()->user()->id;
            });

            static::updating(function ($model) {
                $model->updated_by = auth()->user()->id;
            });

            static::deleting(function ($model) {
                $model->deleted_by = auth()->user()->id;
            });
        }
    }


    public function GetUsersDetails(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function GetCourseDetail(){
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
}
