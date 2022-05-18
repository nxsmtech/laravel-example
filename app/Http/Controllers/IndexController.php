<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'posts' => Post::get(),
        ]);
    }

    public function show(Post $post)
    {
        return view('show', [
            'post' => $post,
        ]);
    }
}
