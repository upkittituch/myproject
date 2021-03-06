
@extends('admin.layouts.main')

@section('content')
 
    <div class="row justify-content-center">
   

      <div class="col-lg-10">
        <form action="{{route('category.update',[$category->id])}}" method="POST" enctype="multipart/form-data">@csrf
        	{{method_field('PUT')}}
              <div class="card mb-6">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
                </div>
                <div class="card-body">
                    <div class="form-group"> 
                      <label for="">Name</label>
                      <input type="text" name="name" class="form-control" id="" aria-describedby=""
                        placeholder="Enter name of category" value="{{$category->name}}">
                    </div>
                    <div class="form-group"><sup class="star">*ต้องอัพโหลดเป็นไฟล์ svg </sup>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input " id="customFile" name="image">
                        <label class="custom-file-label  " for="customFile">Choose file</label>
                       <center> <img src="{{Storage::url($category->image)}}" width="100"></center>
                      </div>
                     </div>
                     
                    <br>   
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>

          
          </div>
</div>
<style>
    .star{
color:red;
}
</style>
@endsection