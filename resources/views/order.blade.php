@extends('layouts.app')

@section('content')
  
 <div class="container">
 	
 	<div class="row justify-content-center">
   
 		<div class="col-md-8">
     <a class="fas fa-arrow-left" href="{{route('shop')}}"> ย้อนกลับ</a>
		 <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>ชื่อ</th>
                        <th>วันที่สั่ง</th>
                        <th>ดูข้อมูล</th>
                        <th>สถานะการจัดส่ง</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($orders)>0)
                      @foreach($orders as $order)
                      <tr>

                        <td><a href="#">{{$order->id}}</a></td>
                       
                        <td>{{$order->user->name}}</td>
                        <td>{{date('d-M-y',strtotime($order->created_at))}}</td>
					          

                        <td>
                            <a href="{{route('user.view',[$order->user_id,$order->id])}}">
                                <button class="btn btn-info"style="width:92; height:20">ดูข้อมูล</button>
                            </a>
                        </td>
                        
                        <td>
                            <a href="{{route('user.tracking',[$order->user_id,$order->id])}}">
                                <button class="btn btn-info"style="width:92; height:20">การจัดส่ง</button>
                            </a>
                        </td>
                       
                       
                      </tr>
                      @endforeach
 		</div>
 	</div>
	 		          	@else
                      <td>No any orders to show</td>
                      @endif
 	


 </div>

 @endsection