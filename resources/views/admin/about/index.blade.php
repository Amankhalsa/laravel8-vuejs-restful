@extends('admin.admin_master')
@section('title')
About view
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container-fluid">
     <div class="row">
              <div class="col-md-12">
                <button> <a href="{{ route('add.home.about')}}" class="float-left  btn btn-info">Add About </a></button>
                <div class="card">
 @if(session('success'))       
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


<div class="card-header">Manage About  </div>    
<table class="table table-striped">
  <thead>
    <tr>
       <th scope="col" width="5%">No</th>
      <th scope="col" width="10%" >Title</th>
      <th scope="col" width="20%">short Discription</th>
      <th scope="col" width="30%">long Discription  </th>
      <th scope="col" width="20%">Action</th>


    </tr>
  </thead>
  <tbody>
      @foreach($get_about as $keys => $value)
    <tr>
      <th scope="row">{{$keys+1}}</th>
      <td>{{ $value->title}}</td>
      <td>{{$value->shortdis}}</td>
      <td>{{$value->longdis}} </td>
      <td>  
    <a href="{{route('edit.home.about', $value->id)}}" class="btn btn-info">Edit</a>
    <a href="{{route('delete.home.about', $value->id)}}" class="btn btn-danger">Delete</a>

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
       <th scope="col" width="5%">No</th>
      <th scope="col" width="10%" >  Title</th>
      <th scope="col" width="20%">short Discription</th>
      <th scope="col" width="30%">long Discription  </th>
      <th scope="col" width="20%">Action</th>

    </tr>
  </thead>
  <tbody>
 


      @foreach($get_trash as $keys => $value)

    <tr>
      <th scope="row">{{$keys+1}}</th>
      <td>{{ $value->title}}</td>
      <td>{{$value->shortdis}}</td>
      <td>{{$value->longdis}} </td>
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