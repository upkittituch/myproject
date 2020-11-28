@extends('layouts.app')

@section('content')
<script src="https://static.line-scdn.net/liff/edge/versions/2.4.1/sdk.js"></script>
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
			
 				  
				   <div class="card-body row">
			  
					  <div class="col"> <strong>ราคารวม: {{$cart->totalPrice}}  ฿</div>
					  
				  </div>
				 
 			</div>
 			
		
 			
 			<hr>
 			@endforeach
 		</div>
 	</div>
 	


 </div>

 @endsection