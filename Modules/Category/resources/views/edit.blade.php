@extends('core::layouts.master')

@section('content')
<h1>Catagories edit</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('category.update', ['category' => $catedit->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <img src="{{url($catedit->image)}}" style="font-weight:70px; height:60px"><br>

    <div class="form-group">
      <label for="exampleInputEmail1">Image</label>
      <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="image" value="{{$catedit->image}}">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Title (az)</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="title_az" value="{{$catedit->title_az}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Title (en)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="title_en" value="{{$catedit->title_en}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Title (ru)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="title_ru" value="{{$catedit->title_ru}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description (az)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="description_az" value="{{$catedit->description_az}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description (en)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="description_en" value="{{$catedit->description_en}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description (ru)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="description_ru" value="{{$catedit->description_ru}}">
      </div>
      <input type="hidden" name="id" value="{{$catedit->id}}">
      
      
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
