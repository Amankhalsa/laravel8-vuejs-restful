@extends('admin.admin_master')
@section('title')
Change password
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
  <h2>Manage/Change password </h2>
</div>
<div class="card-body">
<form action="{{route('update.password')}}" method="post" >
  @csrf
<div class="form-group">
<label for="Address">Old password </label>
<input  class="form-control" name="current_password" id="current_password" type="password" placeholder="Enter Old password">

@error('current_password')
<div class=" text-danger">{{ $message }}</div>
@enderror
</div>
<!-- ======================= -->
<div class="form-group">
<label for="password">New password </label>
<input class="form-control" id="password" type="password" name="password" placeholder="Enter New password">

@error('password')
<div class=" text-danger">{{ $message }}</div>
@enderror
</div>
<!-- ======================= -->
<div class="form-group">
<label for="phone">Confirm password </label>
<input  class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Enter Confirm password">

@error('password_confirmation')
<div class=" text-danger">{{ $message }}</div>
@enderror
</div>
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