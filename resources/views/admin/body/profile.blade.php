@extends('admin.admin_master')
@section('title')
Profile update
@endsection
@section('content')

 @if(session('success'))       
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="col-lg-12">
<div class="card card-default">
<div class="card-header card-header-border-bottom">
  <h2>Manage/Change Profile </h2>
</div>
<div class="card-body">
<form action="{{route('update.profile')}}" method="post" >
  @csrf
<div class="form-group">
<label for="Address">Name </label>
<input  class="form-control" id="name" name="name" value="{{$user->name}}" type="text">

@error('name')
<div class=" text-danger">{{ $message }}</div>
@enderror
</div>
<!-- ======================= -->
<div class="form-group">
<label for="email">Email </label>
<input class="form-control" id="email" value="{{$user->email}}"  type="email" name="email" >

@error('email')
<div class=" text-danger">{{ $message }}</div>
@enderror
</div>
<!-- ======================= -->

<!-- ======================= -->

<div class="form-footer pt-4 pt-5 mt-4 border-top">
<button type="submit" class="btn btn-primary btn-default">Submit</button>
<button type="reset" class="btn btn-info btn-default">Reset</button>
</div>
</form>
                    </div>
                  </div>
                </div>
<!-- ======================= -->




@endsection