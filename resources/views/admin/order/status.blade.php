@extends('admin.layouts.main')

@section('content')
 
    <div class="row justify-content-center">
   

      <div class="col-lg-10">
        <form action="{{route('status.update',[$orders->user_id,$orders->id])}}" method="POST" enctype="multipart/form-data">@csrf
        	{{method_field('PUT')}}  {!! csrf_field() !!}
              <div class="card mb-6">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">edit</h6>
                </div>
                <div class="card-body">
                    <div class="form-group"> 
                      <label for="">payment</label>

                          <select name="payment" id="payment">
                            <option value="{{$orders->payment}}">{{$orders->payment}}</option>
                            <option value="success">success</option>
                            <option value="cancel">cancel</option>
                            
                            
                          </select>
                      <!-- <input type="text" name="status" class="form-control" id="" aria-describedby=""
                        placeholder="Enter name of category" value="{{$orders->status}}"> -->

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