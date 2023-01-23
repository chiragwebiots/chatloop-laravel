<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    protected static $logattributes = [
        'name',
        'designation',
        'description',
        'image',
        'created_by'
    ];

    protected static $logName = 'Testimonial';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "you have {$eventName} Testimonial";
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name',
        'designation',
        'description',
        'image',
        'created_by'
    ];
}
