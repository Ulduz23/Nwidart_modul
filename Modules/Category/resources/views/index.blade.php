@extends('category::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('category.name') !!}</p>
    @foreach ($cats as $cat)
        <p>{{$cat->id}}</p>
        <p>{{$cat->title}}</p>
        <p>{{$cat->description}}</p>
        <p>{{$cat->image}}</p>

    @endforeach
@endsection
