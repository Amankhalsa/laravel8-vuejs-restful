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
                  <div class="card-header">Add category</div>
          <div class="card-body">
<form action="{{route('update.category',[$category->id])}}" method="post">
  @csrf
  <div class="form-group">
    <label for="categoryname">ਵਸਤੁ ਦਾ ਨਾਂ ਲਿਖੋ </label>
    <input type="text"  
     class="form-control" name="category_name" value="{{$category->category_name}}" id="categoryname"  aria-describedby="emailHelp">
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
