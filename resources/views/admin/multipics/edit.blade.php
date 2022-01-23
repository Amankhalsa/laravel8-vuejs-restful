@extends('admin.admin_master')
@section('title')
Edit slider
@endsection
@section('content')



<div class="col-lg-12">
                  <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                      <h2>Edit Home portfolio image</h2>
                    </div>
                    <div class="card-body">
<form action="{{route('update.multipics',[$edit_multi->id])}}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="old_image" value="{{$edit_multi->image}}">

<!-- ======================= -->



<!-- ======================= -->
<div class="form-group">


   <img src="{{asset($edit_multi->image)}}" id="output" style="width: auto; height: 80px;">
</div>
<!-- ======================= -->
<div class="form-group">
<label for="image">Select/Edit Pics</label>
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