<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'courses';
    protected $fillable = ['course_name','course_code', 'payment_type','amount','discount_amount_percentage','course_time','status','course_images','short_description','description'];

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

    public function offers()
    {
        return $this->hasMany(Offer::class)
        ->whereDate('from_date', '<=', date('Y-m-d'))
        ->whereDate('to_date', '>=', date('Y-m-d'));    
    }
}
