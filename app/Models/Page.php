<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions 
    {
        return LogOptions::defaults()->logFillable();
    }

    public function getPages() 
    {
       return  $this->whereMonth('created_at', Carbon::now()->month)->count();
    }

    protected static $logattributes = [
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'status',
        'created_by'
    ];

    protected static $logName = 'page';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "you have {$eventName} page";
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'status',
        'created_by'
    ];

    /**
     * Get the user who cretaed page.
     */
    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

}
