@extends('layouts.app')
@section('content')

<div class="contrainer">
  <main role="main">

  

    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row">
          @foreach($products as $product)
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="{{Storage::url($product->image)}}" alt="Card image cap" width="180"  height="280"  >
              <div class="card-body">
                <p class="card-text">{{$product->name}}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="{{route('product.view',[$product->id])}}"> <button type="button" class="btn btn-sm btn-outline-success">View</button>
                    <a href="{{route('add.cart',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-secondary">add to cart</button></a>
                  </div>
                  <small class="text-muted">{{$product->price}} บาท</small>
                </div>
              </div>
            </div>
            
          </div>
          @endforeach
        </div>
        
      </div>
    </div>

  </main>
  
</div>

@endsection
