@extends('core::layouts.master')

@section('content')
<h1>Catagories list</h1>

<table id="myTable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col"></th>

      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $cat)
        <tr>
            <th scope="row">{{$cat->id}}</th>
            <td><img src="{{asset($cat->image)}}" style="width: 200px; height: 100px"></td>
            <td>{{$cat->title}}</td>
            <td>{{$cat->description}}</td>
            <td><a href="{{ route('category.edit', $cat->id) }}"><button type="button" class="btn btn-warning">Edit</button></a>
                <button type="button" class="btn btn-danger">Delete</button>
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

<form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
    @csrf
    
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
