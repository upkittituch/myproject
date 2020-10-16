@extends('layouts.app')

@section('content')

 <div class="container">
 	
 	<div class="row justify-content-center">
	 
 		<div class="col-md-8">
		 <a class="fas fa-arrow-left" href="/orders"> ย้อนกลับ</a>
 			@foreach($carts as $cart)
 			<div class="card mb-3">
 				<div class="card-body">
 					@foreach($cart->items as $item)
 					<span class="float-right">
 						<img src="{{Storage::url($item['image'])}}" width="100" height="100">
 					</span>

 					<p>ชื่อสินค้า:{{$item['name']}}</p>
 					<p>ราคา:{{$item['price']}}</p>
 					<p>จำนวณ:{{$item['qty']}}</p>

 					@endforeach
 					
 				</div>

 			</div>
 			<p>
 				<button type="button" class="btm btn-info" style="color: #fff;">
 					<span class="">
 						ราคารวม: {{$cart->totalPrice}}  ฿
 					</span>
 				</button>
 			</p>
 			<hr>
 			@endforeach
 		</div>
 	</div>
 	


 </div>

 @endsection