@extends('layouts.app')

@section('content')

 <div class="container">
   @if($errors->any())

   @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
   @endforeach

   @endif
<table class="table">
  <thead>
    <tr>
      {{-- <th scope="col">#</th> --}}
      <th scope="col">Image</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
      <th scope="col">Remove</th>

    </tr>
  </thead>
  <tbody>

  @if($cart)
  @php $i=1 @endphp

@foreach($cart->items as $product)
    <tr>
      {{-- <th scope="row">{{$i++}}</th> --}}
      
      <td><img src="{{Storage::url($product['image'])}}" width="50"></td>
      <td>{{$product['name']}}</td>
      <td>${{$product['price']}}</td>
      <td>
    <form action="{{route('cart.update',$product['id'])}}" method="post">@csrf
        <input type="text" name="qty" size="2"value="{{$product['qty']}}">
        <button class="btn btn-secondary btn-sm"style="width:40px;height:40px">
      		<i class="fas fa-sync"></i>
      	</button>
      </form>
    </td>
      <td>
    <form action="{{route('cart.remove',$product['id'])}}" method="post">@csrf

      	<button class="btn btn-danger"  style="width:50px;height:40px">ลบ</button>
      </form>
      </td>
    </tr>
   @endforeach



  </tbody>
</table>
<hr>
<div class="card-footer">
	<a href="{{url('/shop')}}"><button class="btn btn-primary">เลือกสินค้า</button></a>
	<span style="margin-center:150px;">Total Price:${{$cart->totalPrice}}</span>

	<a href="{{route('cart.checkout',$cart->totalPrice)}}"><button class="btn btn-info float-right">Checkout</button></a>



</div>
@else
<td>No items in cart</td>
@endif
   
 </div>
 @endsection
