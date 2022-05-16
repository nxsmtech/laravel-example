@extends('layout.index')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/posts/create" method="post">
    @csrf
    
    {{ __('attributes.title') }}: <input type="text" name="title" value="{{ old('title') }}"><br>
    {{ __('attributes.body') }}: <input type="text" name="body" value="{{ old('body') }}"><br>
    <input type="submit">
</form>

@endsection
