@extends('core::layouts.master')

@section('content')
<h1>Gallery edit</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<br><br>
<form method="POST" action="{{ route('galleryupdate') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        @foreach(explode(',', $edit->image) as $imagePath)
            <img src="{{ asset($imagePath) }}" alt="Gallery Image" width="100px" height="100px">
        @endforeach
      </div>
      <br><br>
      <div class="form-group">
        <label for="exampleInputEmail1">Images</label>
        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="image[]" multiple>
      </div>
      <br><br>
    <select class="form-control select2 form-select" name="product_id" data-placeholder="Kateqoriya seçin">
        @foreach($products as $pro)
          @if($edit->product_id==$pro->id)
              <option selected value="{{$pro->id}}">{{$pro->title}}</option>
          @else
              <option value="{{$pro->id}}">{{$pro->title}}</option>
          @endif
        @endforeach
      </select>
    
      <input type="hidden" name="id" value="{{$edit->id}}">
      
      
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
