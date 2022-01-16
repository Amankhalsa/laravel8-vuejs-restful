<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
update Brand page 
<div style="float: right">

</div> 

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container-fluid">
     <div class="row">
           
                <div class="col-md-10">
                <div class="card">
                  <div class="card-header">Updae Brand</div>
          <div class="card-body">
<form action="" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="brandname">ਵਸਤੁ ਦਾ ਨਾਂ ਲਿਖੋ </label>
    <input type="text"  
     class="form-control" name="brand_name" value="{{$get_brand ->brand_name}}" id="brandname"  aria-describedby="">
     @error('brand_name')
    <div class=" text-danger">{{ $message }}</div>
@enderror
  </div>
    <div class="form-group">
         <img src="{{ asset($get_brand->brand_image)}}" style="width: auto; height: 80px;">
    </div>

<!-- brand image  -->
  <div class="form-group">
    <label for="brandimage">ਬ੍ਰੈੰਡ ਫੋਟੋ </label>
    <input type="file"  
     class="form-control" name="brand_image" id="brandimage"  aria-describedby="">
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


    </div>
</x-app-layout>