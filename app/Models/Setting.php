<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    protected static $logattributes = [
        'site_name',
        'site_tagline',
        'site_url',
        'administration_email',
        'timezone',
        'display_homepage',
        'homepage',
        'postpage',
        'post_show',
        'page_base',
        'post_base',
        'category_base',
        'tag_base',
        'mail_transport',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption',
        'mail_from_address',
        'mail_from_name',
        'google_analytics',
        'facebook_pixel'
    ];

    protected static $logName = 'Setting';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "you have {$eventName} Setting";
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'site_name',
        'site_tagline',
        'site_url',
        'administration_email',
        'timezone',
        'display_homepage',
        'homepage',
        'postpage',
        'post_show',
        'page_base',
        'post_base',
        'category_base',
        'tag_base',
        'mail_transport',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption',
        'mail_from_address',
        'mail_from_name',
        'google_analytics',
        'facebook_pixel'
    ];
}
