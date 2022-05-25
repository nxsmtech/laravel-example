@extends('layouts.template')

@section('content')
    
    @foreach ($posts as $post)
        <div class="post">
            <a href="/show/{{$post->id}}">
                <h2> {{ $post->title }} </h2>
            </a>
            <p>  {{ $post->body }} </p>
            <span> {{ $post->author_name }} </span>
            <span> {{ $post->comments()->count() }} </span>
        </div>
    @endforeach

@endsection