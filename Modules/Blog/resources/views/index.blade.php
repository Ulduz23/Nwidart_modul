@extends('core::layouts.master')

@section('content')
    
<table id="myTable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
        <tr>
            <th scope="row">{{$blog->id}}</th>
            <td>{{$blog->image}}</td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->description}}</td>
        </tr>
        @endforeach
     
    </tbody>
</table>
@endsection
