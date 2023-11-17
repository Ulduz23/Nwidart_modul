@extends('core::layouts.master')

@section('content')
<h1>Product list</h1>

<table id="myTable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Product</th>
        <th scope="col"></th>

      </tr>
    </thead>
    <tbody>
        @foreach ($gallery as $galler)
        <tr>
            <th scope="row">{{$galler->id}}</th>
            <td>{{$galler->getProducts->title}}</td>
            <td><a href="{{ route('galleryedit', $galler->id) }}"><button type="button" class="btn btn-warning">Edit</button></a>
              <a href="{{ route('gallerydelete', $galler->id) }}"><button type="button" class="btn btn-danger">Delete</button></a>
          </td>
        </tr>
        @endforeach
     
    </tbody>
</table>
<h1>ADD</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form method="POST" action="{{route('galleryadd')}}" enctype="multipart/form-data">
    @csrf

    <label for="exampleInputEmail1">Product</label>
    <select class="form-control select2 form-select" name="product_id" data-placeholder="Məhsul seçin">
        <option label="Choose one"></option>
        @foreach($products as $pro)
            <option value="{{$pro->id}}">{{$pro->title}}</option>
        @endforeach
    </select>

      <div class="form-group">
        <label for="exampleInputEmail1">Images</label>
        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="image[]" multiple>
      </div><br>
      
      
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
