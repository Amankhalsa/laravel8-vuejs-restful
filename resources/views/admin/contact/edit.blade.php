@extends('admin.admin_master')
@section('title')
Edit Contact 
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
  <h2>Manage/edit Home Contact data </h2>
</div>
<div class="card-body">
<form action="{{route('update.admin.contact',[$edit_contact->id])}}" method="post" >
  @csrf
<div class="form-group">
<label for="Address">Address </label>
<input type="text" class="form-control"  value="{{$edit_contact->address}}" name="address" id="Address" placeholder="Enter slider Address">

@error('address')
<div class=" text-danger">{{ $message }}</div>
@enderror
</div>
<!-- ======================= -->
<div class="form-group">
<label for="email">Email </label>
<input type="email" class="form-control" name="email" value="{{$edit_contact->email}}" id="email" placeholder="Enter email">

@error('email')
<div class=" text-danger">{{ $message }}</div>
@enderror
</div>
<!-- ======================= -->
<div class="form-group">
<label for="phone">phone </label>
<input type="number" class="form-control" name="phone" value="{{$edit_contact->phone}}"  id="phone" placeholder="Enter phone">

@error('phone')
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