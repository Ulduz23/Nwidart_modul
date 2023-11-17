@extends('core::layouts.master')

@section('content')
<h1>Product list</h1>

<table id="myTable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Category</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $pr)
        <tr>
            <th scope="row">{{$pr->id}}</th>
            <td><img src="{{asset($pr->image)}}" style="width: 200px; height: 100px"></td>
            <td>{{$pr->category->title}}</td>
            <td>{{$pr->title}}</td>
            <td>{{$pr->description}}</td>
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


<form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf
    <label for="exampleInputEmail1">Category</label>
    <select class="form-control select2 form-select" name="cat_id" data-placeholder="Kateqoriya seçin">
        <option label="Choose one"></option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>
    <div class="form-group">
      <label for="exampleInputEmail1">Title (az)</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="title_az">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Title (en)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="title_en">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Title (ru)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="title_ru">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description (az)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="description_az">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description (en)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="description_en">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Description (ru)</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="description_ru">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Image</label>
        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="image">
      </div>
      {{-- <div class="form-group">
        <label for="exampleInputEmail1">Galley</label>
        <input type="file" name="images[]" multiple>
      </div> --}}
      
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
