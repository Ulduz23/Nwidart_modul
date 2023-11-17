@extends('core::layouts.master')

@section('content')
<h1>Product list</h1>

<table id="myTable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Product</th>
        <th scope="col"></th>

      </tr>
    </thead>
    <tbody>
        {{-- @foreach ($gallery as $galler)
        <tr>
            <th scope="row">{{$galler->id}}</th>
            <td><img src="{{asset($galler->image)}}" style="width: 200px; height: 100px"></td>
            <td>{{$galler->getProducts->title}}</td>
            <td><a href="{{ route('product.edit', $pr->id) }}"><button type="button" class="btn btn-warning">Edit</button></a>
              <a href="{{ route('product.destroy', $pr->id) }}"><button type="button" class="btn btn-danger">Delete</button></a>
          </td>
        </tr>
        @endforeach
      --}}
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


<form method="POST" action="" enctype="multipart/form-data">
    @csrf
   
      <div class="form-group">
        <label for="exampleInputEmail1">Images</label>
        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter" name="image" multiple>
      </div>
      @if($image)
                @foreach($image as $img)
                    <img src="{{$img->temporaryUrl()}}\" />
                @endforeach
            @endif  
      
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
