@extends('admin.layouts.main')

@section('content')
 
    <div class="row justify-content-center">
   

      <div class="col-lg-10">
      <a class="fas fa-arrow-left" href="{{route('order.index')}}"> ย้อนกลับ</a>
        <form action="{{route('status.update',[$orders->user_id,$orders->id])}}" method="POST" enctype="multipart/form-data">@csrf
        	{{method_field('PUT')}}  {!! csrf_field() !!}
              <div class="card mb-6">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">edit</h6>
                </div>
                <div class="card-body">
                   
                    <div class="form-group"> 
                      <label for="">tracking</label>
                          <select name="tracking" id="tracking">
                            <option value="{{$orders->tracking}}">{{$orders->tracking}}</option>
                            <option value="กำลังจัดเตรียมสินค้า">กำลังจัดเตรียมสินค้า</option>
                            <option value="กำลังจัดส่ง">กำลังจัดส่ง</option>
                          </select>
                    </div>
                    
                    <div class="form-group"> 
                      <label for="">company</label>
                     
                          <select name="company" id="company">
                          <option value="-">-</option>
                          @foreach($company as $companys)
                            <option value="{{$companys->company_name}}">{{$companys->company_name}}</option>
                            @endforeach
                          </select> 
                          
                    </div>
                    <div class="form-group">
                                {!! Form::label('tracking number') !!}
                                {!! Form::text('tracking_number',null,["class"=>"form-control" ,'placeholder'=>'ตัวอย่าง: 1Dw2321FES', 'required'])!!}
                            </div>
                    
                    <br>   
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>

          </div>
          
</div>
@endsection