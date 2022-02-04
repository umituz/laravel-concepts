@extends('admin.admin_master')

@section('admin')

    <div class="py-12"> 
   <div class="container">
    <div class="row">


    <div class="col-md-8">
     <div class="card">




          <div class="card-header"> All Brand </div>
    

    <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Brand Image</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
          <!-- @php($i = 1) -->
        @foreach($brands as $brand) 
    <tr>
      <th scope="row"> {{ $brands->firstItem()+$loop->index  }} </th>
      <td> {{ $brand->brand_name }} </td>
      <td> <img src="{{ asset($brand->brand_image) }}" style="height:40px; width:70px;" > </td> 
      <td> 
          @if($brand->created_at ==  NULL)
          <span class="text-danger"> No Date Set</span> 
          @else
      {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
          @endif
       </td>
       <td> 
       <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">Edit</a>
       <a href="{{ url('brand/delete/'.$brand->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
        </td> 


    </tr> 
    @endforeach


  </tbody>
</table>
{{ $brands->links() }}
  
       </div>
    </div>


    <div class="col-md-4">
     <div class="card">
          <div class="card-header"> Add Brand </div>
          <div class="card-body">
          
         
         
          <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
          @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Name</label>
    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('brand_name')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Brand Image</label>
    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('brand_image')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>



     
  <button type="submit" class="btn btn-primary">Add Brand</button>
</form>

       </div>

    </div>
  </div> 
 


    </div>
  </div> 

 


    </div>
 @endsection
