@extends('admin.admin_master')
@section('title')
Edit about
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
                      <h2>Manage/Add Home page about </h2>
                    </div>
                    <div class="card-body">
<form action="{{route('update.home.about',[$edit_about->id])}}" method="post" >
  @csrf
<div class="form-group">
<label for="title">Title </label>
<input type="text" class="form-control" name="title" value="{{$edit_about->title}}" id="title" placeholder="Enter about title">

@error('title')
<div class=" text-danger">{{ $message }}</div>
@enderror
</div>
<!-- ======================= -->

<div class="form-group">
<label for="discription">short Discription </label>
<textarea class="form-control" name="shortdis" id="discription"  value="{{$edit_about->shortdis}}" rows="3"  placeholder="Enter short Discription">{{$edit_about->shortdis}}
</textarea>

 @error('shortdis')
<div class=" text-danger">{{ $message }}</div>
@enderror
</div>

<!-- ======================= -->

<div class="form-group">
<label for="discription">long Discription </label>
<textarea class="form-control" name="longdis" value="{{$edit_about->longdis}}" id="discription" rows="3"  placeholder="Enterlong  Discription">{{$edit_about->longdis}}</textarea>

 @error('longdis')
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