@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
<div class="card card-default">
     <div class="card-header card-header-border-bottom">
          <h2>Edit HomeAbout</h2>
     </div>
     <div class="card-body">
     <form action="{{ url('update/homeabout/'.$homeabout->id) }}" method="POST">
          @csrf
               <div class="form-group">
          <label for="exampleFormControlInput1">About Title </label>
  <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $homeabout->title }}" >
                    
               </div>
                
               
                
               <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short Description</label>
 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="short_dis">
 {{ $homeabout->short_dis }}
 </textarea>
               </div>

               <div class="form-group">
                    <label for="exampleFormControlTextarea1">Long Description</label>
 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="long_dis">
 {{ $homeabout->long_dis }}
 </textarea>
               </div>
                



               <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                    
               </div>
          </form>
     </div>
</div>
 


@endsection
