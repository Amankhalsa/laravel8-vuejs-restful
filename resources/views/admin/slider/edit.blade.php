@extends('admin.admin_master')
@section('title')
Edit slider
@endsection
@section('content')



<div class="col-lg-12">
                  <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                      <h2>Edit Home page Slider </h2>
                    </div>
                    <div class="card-body">
<form action="{{route('update.slider',[$edit_slider->id])}}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="old_image" value="{{$edit_slider->image}}">
<div class="form-group">
<label for="title">Title </label>
<input type="text" class="form-control" name="title" id="title" value="{{$edit_slider->title}}" placeholder="Enter slider title">

@error('title')
<div class=" text-danger">{{ $message }}</div>
@enderror
</div>
<!-- ======================= -->

<div class="form-group">
<label for="discription">Discription </label>
<textarea class="form-control" name="discription" id="discription" rows="3"  placeholder="Enter Discription">{{$edit_slider->discription}}
</textarea>

 @error('discription')
<div class=" text-danger">{{ $message }}</div>
@enderror
</div>

<!-- ======================= -->
<div class="form-group">


   <img src="{{asset($edit_slider->image)}}" id="output" style="width: auto; height: 80px;">
</div>
<!-- ======================= -->
<div class="form-group">
<label for="image">Example file input</label>
<input type="file" class="form-control-file" name="image" id="image" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
 @error('image')
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