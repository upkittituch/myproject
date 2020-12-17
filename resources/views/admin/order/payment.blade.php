@extends('admin.layouts.main')

@section('content')
 
    <div class="row justify-content-center">
   

      <div class="col-lg-10">
      <a class="fas fa-arrow-left" href="{{route('order.index')}}"> ย้อนกลับ</a>
        <form action="{{route('payment.update',[$orders->user_id,$orders->id])}}" method="POST" enctype="multipart/form-data">@csrf
        	{{method_field('PUT')}}  {!! csrf_field() !!}
              <div class="card mb-6">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">edit</h6>
                </div>
                <div class="card-body">
                    <div class="form-group"> 
                    @if($orders->tracking =='ได้รับสินค้าแล้ว')
                      <h1>ผู้ใช้ได้รับสินค้าแล้ว</h1>
                    
                  
                      @elseif($orders->payment =='เก็บเงินปลายทาง')
                      <label for="">payment</label>
                      <select name="payment" id="payment">
                      <option value="เก็บเงินปลายทาง">เก็บเงินปลายทาง</option>
                      <option value="ยืนยันคำสั่งซื้อแบบเก็บเงินปลายทาง">ยืนยันคำสั่งซื้อแบบเก็บเงินปลายทาง</option>
                      </select>
                      @elseif($orders->payment =='ยืนยันคำสั่งซื้อแบบเก็บเงินปลายทาง')
                      <label for="">payment</label>
                      <select name="payment" id="payment">
                      <option value="ยืนยันคำสั่งซื้อแบบเก็บเงินปลายทาง">ยืนยันคำสั่งซื้อแบบเก็บเงินปลายทาง</option>
                      <option value="ยกเลิก">ยกเลิก</option>
                      </select>
                      @else
                      <label for="">payment</label>
                          <select name="payment" id="payment">
                            <option value="{{$orders->payment}}">{{$orders->payment}}</option>
                            <option value="ยืนยันเรียบร้อยแล้ว">ยืนยันเรียบร้อยแล้ว</option>
                          </select>
                     
                    </div>
                    <br>   
                    <button type="submit" class="btn btn-primary">Update</button>
                    @endif
                </div></div>
                
              </div>
              
            </form>

          </div>
        
</div>

@endsection