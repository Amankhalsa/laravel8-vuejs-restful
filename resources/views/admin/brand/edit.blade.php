@extends('admin.admin_master')

@section('content')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container-fluid">
     <div class="row">
           
                <div class="col-md-10">
                <div class="card">
                  <div class="card-header">Updae Brand</div>
          <div class="card-body">
<form action="{{route('update.brand',[$get_brand->id])}}" method="post" 
  enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="old_image" value="{{$get_brand->brand_image}}">
  <div class="form-group">
    <label for="brandname">ਵਸਤੁ ਦਾ ਨਾਂ ਲਿਖੋ </label>
    <input type="text"  
     class="form-control" name="brand_name" value="{{$get_brand ->brand_name}}" id="brandname"  aria-describedby="">
     @error('brand_name')
    <div class=" text-danger">{{ $message }}</div>
@enderror
  </div>
    <div class="form-group">
         <img src="{{ asset($get_brand->brand_image)}}" id="output" style="width: auto; height: 80px;">
    </div>

<!-- brand image  -->
  <div class="form-group">
    <label for="brandimage">ਬ੍ਰੈੰਡ ਫੋਟੋ </label>
    <input type="file"  
     class="form-control" name="brand_image" id="brandimage"  aria-describedby=""  accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
     @error('brand_image')
    <div class=" text-danger">{{ $message }}</div>
@enderror
  </div>
<!-- brand image  -->

  <button type="submit" class="btn btn-primary">ਐਡ ਕਰੋ </button>
</form>
</div>
      </div>
              </div>
            </div>

        </div>
        <!-- ---------------- -->
 
        </div>
        </div>


@endsection