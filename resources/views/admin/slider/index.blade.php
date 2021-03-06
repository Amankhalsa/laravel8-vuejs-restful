@extends('admin.admin_master')
@section('title')
   Slider edit
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container-fluid">
     <div class="row">
              <div class="col-md-12">
                <button> <a href="{{route('add.slider')}}" class="float-left  btn btn-info">Add Slider </a></button>
                <div class="card">
 @if(session('success'))       
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


<div class="card-header">Manage slider </div>    
<table class="table table-striped">
  <thead>
    <tr>
       <th scope="col">No</th>
      <th scope="col" width="15%" > Slider Title</th>
      <th scope="col" width="50%">Slider Discription</th>
      <th scope="col" width="10%">Image </th>
      <th scope="col" width="20%">Action</th>

    </tr>
  </thead>
  <tbody>
      @foreach($get_sliders as $keys => $value)
    <tr>
      <th scope="row">{{$keys+1}}</th>
      <td>{{ $value->title}}</td>
      <td>
        {{$value->discription}}
      </td>
      <td><img src="{{ asset($value->image)}}" style="width: auto; height: 60px;"></td>
      <td>
        
    <a href="{{route('edit.slider', $value->id)}}" class="btn btn-info">Edit</a>
    <a href="{{route('delete.slider', $value->id)}}" class="btn btn-danger">Delete</a>

      </td>

    </tr>
@endforeach


  </tbody>
</table>

            </div>
     </div>
                
            </div>

        </div>
        <!-- ---------------- -->
 


 <!-- trashed start  -->
<br><br>
         <div class="container-fluid">
     <div class="row">
              <div class="col-md-12">
                <div class="card">

<div class="card-header">Trashed slider</div>    
<table class="table table-striped">
  <thead>
    <tr>
       <th scope="col">No</th>
      <th scope="col"> Brand Name</th>
      <th scope="col">Brand image</th>
      <th scope="col">Created at</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
 


      @foreach($get_trash as $keys => $value)

    <tr>
      <th scope="row">{{$keys+1}}</th>
      <td>{{ $value->title}}</td>
      <td>
        {{$value->discription}}
      </td>
      <td><img src="{{ asset($value->image)}}" style="width: auto; height: 60px;"></td>
      <td>
        
    <a href="{{route('restore.slider', $value->id)}}" class="btn btn-info">Restore</a>
    <a href="{{route('pdelete.slider', $value->id)}}" class="btn btn-danger" onclick="return confirm('do you want to delete this item ?');">Delete</a>

      </td>

    </tr>
@endforeach


  </tbody>
</table>

            </div>
     </div>
               
            </div>

        </div>
        </div>
        </div>

@endsection