@extends('core::layouts.master')

@section('content')
<h1>Prodyct edit</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('product.update', ['product' => $edit->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <img src="{{url($edit->image)}}" style="font-weight:70px; height:60px"><br>

    <div class="form-group">
      <label for="exampleInputEmail1">Image</label>
      <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="image" value="{{$edit->image}}">
    </div><br>

    <label for="exampleInputEmail1">Category</label>
      <select class="form-control select2 form-select" name="cat_id" data-placeholder="Kateqoriya seçin">
        @foreach($categories as $cats)
          @if($edit->cat_id==$cats->id)
              <option selected value="{{$cats->id}}">{{$cats->title}}</option>
          @else
              <option value="{{$cats->id}}">{{$cats->title}}</option>
          @endif
        @endforeach
      </select>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Title (az)</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="title_az" value="{{$edit->title_az}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Title (en)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="title_en" value="{{$edit->title_en}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Title (ru)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="title_ru" value="{{$edit->title_ru}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description (az)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="description_az" value="{{$edit->description_az}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description (en)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="description_en" value="{{$edit->description_en}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description (ru)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="description_ru" value="{{$edit->description_ru}}">
      </div>
      <input type="hidden" name="id" value="{{$edit->id}}">
      
      
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
