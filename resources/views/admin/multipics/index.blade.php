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
       
 @if(session('success'))       
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="card-header">All Multipics
</div>    

<div class="card-deck">
@foreach($get_pics as $keys => $value)
<div  class="col-md-3 mt-3">
  

  <div class="card">

    <img src="{{asset($value->image)}}" class="card-img-top" alt="image of card {{$keys+1}}"  >   
    <div class="card-body">
      <p class="card-title"><a href="{{asset($value->image)}}">Card title {{$keys+1}}</a></p>

    </div>

</div>
</div>
@endforeach


            </div>
     </div>
                <div class="col-md-4">
                <div class="card">
                  <div class="card-header">Add Multipics</div>
          <div class="card-body">
<form action="{{route('store.multipics')}}" method="post" enctype="multipart/form-data">
  @csrf

<!-- brand image  -->
  <div class="form-group">
    <label for="image">Select multiple pics</label>
    <input type="file"  multiple="" 
     class="form-control" name="image[]" id="image"  aria-describedby="">
     @error('image')
    <div class=" text-danger">{{ $message }}</div>
@enderror
  </div>
<!-- brand image  -->

  <button type="submit" class="btn btn-primary">Upload now </button>
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
