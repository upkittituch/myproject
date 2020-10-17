@extends('layouts.app')

@section('content')

    <article class="card">
    
        <div class="card-body">
        @foreach($carts as $cart)
        @foreach($inform as $informs)
   
            <h3>Order Number: {{$informs->id}}</h3>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>บริษัทที่จัดส่งสินค้า:</strong> <br> {{$informs->company}} </div>
                    <div class="col"> <strong>ที่อยู่ที่จัดส่ง:</strong> <br> {{$informs->address}} <span>{{$informs->postalcode}} </span></div>
                    <div class="col"> <strong>Tracking #:</strong> <br> {{$informs->tracking_number}} </div>
                </div>@endforeach
            </article>
            <div class="track">
                @if($informs->tracking == 'processed')
                  <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">กำลังนำเนินการ</span> </div>
                  <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> จัดเตรียมสินค้า</span> </div>
                  <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> จัดส่งแล้ว </span> </div>
                  
                @elseif ($informs->tracking=='packing')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">กำลังนำเนินการ</span> </div>
                  <div class="step active" > <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> จัดเตรียมสินค้า</span> </div>
                  <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> จัดส่งแล้ว </span> </div>
                @elseif ($informs->tracking=='delivered')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">กำลังนำเนินการ</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> จัดเตรียมสินค้า</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> จัดส่งแล้ว </span> </div>
                @endif
            </div>
            <hr>
            @foreach($cart->items as $item)
           
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="{{Storage::url($item['image'])}}" width="100" height="100"></div>
                        <figcaption class="info align-self-center">
                            <td class="title">ชื่อสินค้า:{{$item['name']}}<br> </td> 
                            <td>จำนวณ:{{$item['qty']}}</td>
                            <td>ราคา:{{$item['price']}}</td>
                            
                        </figcaption>
                    </figure>
                </li>@endforeach
                <hr> 
                 
               <div class="card-body row">
        
                    <div class="col"> <strong>ราคารวม: {{$cart->totalPrice}}  ฿</div>
 						
                   
                    <a href="/orders" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
                </div>@endforeach
 		
           
           
        </div>
        
        
        
    </article>
    

<style >
@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

body {
    background-color: #eeeeee;
    font-family: 'Open Sans', serif
}



.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #FF5722
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #ee5435;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}



.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

.btn-warning {
    color: #ffffff;
    background-color: #ee5435;
    border-color: #ee5435;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #ff2b00;
    border-color: #ff2b00;
    border-radius: 1px
}
</style >
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
<link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@endsection