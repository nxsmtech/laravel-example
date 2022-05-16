<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View 
    {
       return view('posts.index', [
           'posts' => Post::get(),
       ]);
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $storePostRequest)
    {
        $validatedData = $storePostRequest->validated();

        $post = new Post([
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
        ]);
        $post->save();
        
        return redirect()->route('posts.show', ['post' => $post]);
    } 
    
    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit(Post $post): View
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->save();
        
        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
