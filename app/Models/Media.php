<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'media';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    protected static $logattributes = [
        'url',
        'original_file_name',
        'mime_type',
        'size',
        'created_by'
    ];

    protected static $logName = 'media';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "you have {$eventName} media";
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'original_file_name',
        'mime_type',
        'size',
        'created_by'
    ];

}
