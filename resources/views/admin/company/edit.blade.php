
@extends('admin.layouts.main')

@section('content')
 
    <div class="row justify-content-center">
   

      <div class="col-lg-10">
        <form action="{{route('company.update',[$company->id])}}" method="POST" enctype="multipart/form-data">@csrf
        	{{method_field('PUT')}}
              <div class="card mb-6">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
                </div>
                <div class="card-body">
                    <div class="form-group"> 
                      <label for="">Company Name</label>
                      <input type="text" name="company_name" class="form-control" id="company_name" aria-describedby=""
                        placeholder="Enter name of category" value="{{$company->company_name}}">
      
                    
                    </div>
                     </div>
                    <br>   
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>

          </div>
          </div>
</div>
@endsection