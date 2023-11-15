@extends('product::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('product.name') !!}</p>
    @foreach ($products as $pro)
        <p>{{$pro->id}}</p>
        <p>{{$pro->title}}</p>
        <p>{{$pro->description}}</p>
        <p>{{$pro->image}}</p>

    @endforeach
@endsection
