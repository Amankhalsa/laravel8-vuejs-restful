@extends('admin.admin_master')
@section('title')
   Slider edit
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
                      <h2>Basic Form Controls</h2>
                    </div>
                    <div class="card-body">
<form action="{{route('store.slider')}}" method="post" enctype="multipart/form-data">
  @csrf
<div class="form-group">
<label for="title">Title </label>
<input type="text" class="form-control" name="title" id="title" placeholder="Enter Email">

 @error('title')
<div class=" text-danger">{{ $message }}</div>
@enderror
       </div>


<div class="form-group">
<label for="discription">Discription </label>
<textarea class="form-control" name="discription" id="discription" rows="3"></textarea>

 @error('discription')
<div class=" text-danger">{{ $message }}</div>
@enderror
</div>

<!-- ============= -->
<div class="form-group">


   <img src="" id="output" style="width: auto; height: 80px;">
</div>
<!-- ======================= -->
<div class="form-group">
<label for="image">Example file input</label>
<input type="file" class="form-control-file" name="image" id="image" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
 @error('image')
<div class=" text-danger">{{ $message }}</div>
@enderror
</div>
<div class="form-footer pt-4 pt-5 mt-4 border-top">
<button type="submit" class="btn btn-primary btn-default">Submit</button>
<button type="reset" class="btn btn-info btn-default">reset</button>
</div>
</form>
                    </div>
                  </div>


                </div>
<!-- ======================= -->




@endsection