<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeOption extends Model
{
    use HasFactory;

    public $fillable = [
        'primary_color',
        'secondary_color',
        'copyright',
        'language',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_author_name',
        'meta_image',
        'favic_icon',
        'site_logo',
        'required_name_email',
        'required_login',
        'comment_approved'
    ];
}
