<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;


    public function getRecentComments(){

        return $this->latest('comments.created_at')->take(5)->get();
        
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name',
        'email',
        'message',
        'user_id',
        'blog_id',
        'parent_id',
        'is_approved',
    ];

    public function createdBy(){
        
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function blogs(){
        
        return $this->belongsTo(Blog::class);
    }

    public function replies(){

        return $this->hasMany(Comment::class, 'parent_id');
    }
}
