<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Offer extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'offers';
    protected $fillable = ['name','course_id','offer_percentage','from_date','to_date','coupon_code','college_id'];

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
    

    public function courseDetails(){
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
