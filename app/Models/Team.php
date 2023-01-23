<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
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
        'facebook_link',
        'google_link',
        'twitter_link',
        'instagram_link',
        'rss_link',
        'created_by'
    ];

    protected static $logName = 'team';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "you have {$eventName} team";
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
        'facebook_link',
        'google_link',
        'twitter_link',
        'instagram_link',
        'rss_link',
        'created_by'
    ];

}
