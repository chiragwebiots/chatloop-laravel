<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\ThemeOption;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function __construct(Comment $comments)
    {
        $this->comments = $comments;
        $this->theme = ThemeOption::first();
    }
}
