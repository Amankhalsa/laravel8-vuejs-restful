<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
Hi...{{ Auth::user()->name}}
<div style="float: right">
    Total User :<span class="badge badge-danger"><b>{{count($get_data)}}</b> 
    </span>
</div> 

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
            <div class="row">
                   <h2 class="text-center font-weight-bold text-info">User detail:</h2>
                <table class="table table-striped">

  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">User name</th>
      <th scope="col">Email</th>
      <th scope="col">Created at</th>
    </tr>
  </thead>
  <tbody>
 

   @foreach( $get_data as $key => $value)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{ $value->name}}</td>
      <td>{{ $value->email}}</td>
      <td>{{ Carbon\carbon::parse($value->created_at)->diffForHumans()}}</td>
    </tr>
@endforeach
  </tbody>
</table>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
