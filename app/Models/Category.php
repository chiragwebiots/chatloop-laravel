<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $categories = [];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    protected static $logattributes = [
        'title',
        'slug',
        'description',
        'parent_id',
        'meta_title',
        'meta_description',
        'type',
        'status',
        'created_by'
    ];

    protected static $logName = 'category';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "you have {$eventName} category";
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'title',
        'slug',
        'description',
        'parent_id',
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
        return $this->belongsToMany(Blog::class, 'blog_categories');
    }

    public function scopeWithOutParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public static function getHierarchy(): array
    {
        return (new self())->getCategories();
    }

    private function getCategories(): array
    {
        $mainCategories = self::whereNull('parent_id')->get();

        foreach ($mainCategories as $category) {

            $this->categories[] = $category->toArray();

            $this->getParentCategories($category, 0);
        }

        return $this->categories;
    }

    private function getParentCategories($category, $level)
    {
        if ($subCategories = $category->hasSubCategories) {

            $level++;

            foreach ($subCategories as $subCategory) {

                $subCategory->title = str_repeat('- ', $level) . $subCategory->title;

                $this->categories[] = $subCategory;

                $this->getParentCategories($subCategory, $level);
            }
        }
    }

    public function hasSubCategories()
    {
        return $this->hasMany($this, 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function scopeActive($query, $value)
    {
        return $query->where('status', $value);
    }
}
