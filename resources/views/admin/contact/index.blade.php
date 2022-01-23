@extends('admin.admin_master')
@section('title')
Contact us
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container-fluid">
     <div class="row">
              <div class="col-md-12">
                <button> <a href="{{route('add.contact.data')}}" class="float-left  btn btn-info">Add Contact </a></button>
                <div class="card">
 @if(session('success'))       
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


<div class="card-header">Manage Contact </div>    
<table class="table table-striped">
  <thead>
    <tr>
       <th scope="col">No</th>
      <th scope="col" width="20%" > Address</th>
      <th scope="col" width="20%">Email</th>
      <th scope="col" width="20%">Phone </th>
      <th scope="col" width="20%">Action</th>

    </tr>
  </thead>
  <tbody>
      @foreach($get_contact as $keys => $value)
    <tr>
      <th scope="row">{{$keys+1}}</th>
      <td>{{ $value->address}}</td>
      <td>
        {{$value->email}}
      </td>
      <td>    {{$value->phone}}</td>
      <td>
        
    <a href="{{route('edit.contact.data', $value->id)}}" class="btn btn-info">Edit</a>
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

        </div>
        </div>

@endsection