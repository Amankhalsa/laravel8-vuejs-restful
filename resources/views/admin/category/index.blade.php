<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
All Category
<div style="float: right">

</div> 

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
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

                  <div class="card-header">All category</div>
           
               
                <table class="table table-striped">

  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col"> User Name</th>
      <th scope="col">Cat Name</th>
      <th scope="col">Created at</th>
    </tr>
  </thead>
  <tbody>
 


    <tr>
      @foreach($get_cat_data as $keys => $value)
      <th scope="row">{{$get_cat_data->firstitem()+$loop->index}}</th>
      <td>{{ $value->name}}</td>
      <td>{{ $value->category_name}}</td>
      <td>{{ Carbon\carbon::parse($value->created_at)->diffForHumans()}}</td>
    </tr>
@endforeach
  </tbody>
</table>
{{$get_cat_data->links()}}
            </div>
     </div>
                <div class="col-md-4">
                <div class="card">
                  <div class="card-header">Add category</div>
          <div class="card-body">
<form action="{{route('store.category')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="categoryname">ਵਸਤੁ ਦਾ ਨਾਂ ਲਿਖੋ </label>
    <input type="text"  
     class="form-control" name="category_name" id="categoryname"  aria-describedby="emailHelp">
     @error('category_name')
    <div class=" text-danger">{{ $message }}</div>
@enderror
  </div>


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
