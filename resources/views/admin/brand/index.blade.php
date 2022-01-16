<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
Brand page 
<div style="float: right">

</div> 

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container-fluid">
     <div class="row">
              <div class="col-md-8">
                <div class="card">
 @if(session('success'))       
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="card-header">All Brand</div>    
<table class="table table-striped">
  <thead>
    <tr>
       <th scope="col">No</th>
      <th scope="col"> Brand Name</th>
      <th scope="col">Brand image</th>
      <th scope="col">Created at</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
 


      @foreach($get_brand as $keys => $value)

    <tr>
      <th scope="row">{{$keys+1}}</th>
      <td>{{ $value->brand_name}}</td>
      <td>
        <img src="{{ asset($value->brand_image)}}" style="width: auto; height: 40px;">
      </td>
      <td>{{ Carbon\carbon::parse($value->created_at)->diffForHumans()}}</td>
      <td>
        
    <a href="{{route('edit.brand', $value->id)}}" class="btn btn-info">Edit</a>
    <a href="{{route('delete.brand', $value->id)}}" class="btn btn-danger">Delete</a>

      </td>

    </tr>
@endforeach


  </tbody>
</table>

            </div>
     </div>
                <div class="col-md-4">
                <div class="card">
                  <div class="card-header">Add Brand</div>
          <div class="card-body">
<form action="{{route('store.brand')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="brandname">ਵਸਤੁ ਦਾ ਨਾਂ ਲਿਖੋ </label>
    <input type="text"  
     class="form-control" name="brand_name" id="brandname"  aria-describedby="">
     @error('brand_name')
    <div class=" text-danger">{{ $message }}</div>
@enderror
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
