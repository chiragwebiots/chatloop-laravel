<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    public function getBlogs() 
    {
       return  $this->whereMonth('created_at', Carbon::now()->month)->count();
    }

    public function getRecentBlogs(){

       return $this->latest('blogs.created_at')->take(5)->get();
       
    }

    protected static $logattributes = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'meta_title',
        'meta_description',
        'fetured',
        'status'
    ];

    protected static $logName = 'blog';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "admin have {$eventName} blog";
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'meta_title',
        'meta_description',
        'featured',
        'status',
        'created_by'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_categories');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tags');
    }

    public function getSelectedCategoriesAttribute()
    {
        return $this->hasMany(BlogCategory::class)->pluck('category_id')->toArray();
    }

    public function getSelectedTagsAttribute()
    {
        return $this->hasMany(BlogTag::class)->pluck('tag_id')->toArray();
    }

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
