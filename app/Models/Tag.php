<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'type',
        'status',
        'created_by'
    ];

    public function getRouteKeyName()
    {
        return request()->segment(1) === 'admin' ? 'id' : 'slug';
    }
    
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tags');
    }
    
    public function scopeActive($query, $value)
    {
        return $query->where('status', $value);
    }
}
