@extends('admin.layouts.main')

@section('content')
			
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Order</li>
              <li class="breadcrumb-item active" aria-current="page">Order Tables</li>
            </ol>
          </div>
		 
	
           	<div class="row justify-content-center">
 		<div class="col-md-8">
		 <a class="fas fa-arrow-left" href="{{route('order.index')}}"> ย้อนกลับ</a>
 			@foreach($carts as $cart)
			 

 			<div class="card mb-3">
					@foreach($up as $address)
					
			 
						<article class="card">
							
							
						
						<div class="card-body row ">
						
							<div class="col"> <strong>สถานที่จัดส่ง:</strong> <br> {{$address->address}} </div>
							<div class="col"> <strong>รหัสไปรษณีย์:</strong> <br> {{$address->postcode}} </div>
							<div class="col"> <strong>เบอร์โทรศัพท์:</strong> <br> {{$address->phone}} </div>
							
						</div>
							</article>
		
							
				 			@endforeach
 				<div class="card-body">
				 
				 
 					@foreach($cart->items as $item)
 					<span class="float-right">
 						<img src="{{Storage::url($item['image'])}}" width="100" height="100">
 					</span>

 					<p>ชื่อสินค้า:{{$item['name']}}</p>
 					<p>ราคา:{{$item['price']}}</p>
 					<p>จำนวน:{{$item['qty']}}</p>


 					@endforeach
 					
 				</div>
				 <div class="card-body row">
			  
			  <div class="col"> <strong>ราคารวม: {{$cart->totalPrice}}  ฿</div>
			  
		  </div>
		 
 			</div>
			 
 			@endforeach
 		</div>
 	</div>
	 </div>


 @endsection