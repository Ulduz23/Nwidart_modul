@extends('blog::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('blog.name') !!}</p>
    @foreach ($blogs as $blog)
        <p>{{$blog->id}}</p>
        <p>{{$blog->title}}</p>
        <p>{{$blog->description}}</p>
        <p>{{$blog->image}}</p>

    @endforeach
@endsection
