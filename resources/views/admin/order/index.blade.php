@extends('admin.layouts.main')

@section('content')

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item">Order</li>
              <li class="breadcrumb-item active" aria-current="page">Order Tables</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Orders</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>edit status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($orders)>0)
                      @foreach($orders as $order)
                      <tr>

                        <td><a href="#">{{$order->id}}</a></td>
                       
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->user->email}}</td>
                        <td>{{date('d-M-y',strtotime($order->created_at))}}</td>
                        
                          @if($order->status == 'success')
                            <td><span style='font-size:17px' class="badge badge-success">{{$order->status}}</span></td>
                          @elseif ($order->status=='cancel')
                          <td ><span style='font-size:17px' class="badge badge-danger">{{$order->status}}</span></td>  
                          @elseif ($order->status=='unconfirmed')
                          <td ><span style='font-size:17px' class="badge badge-warning">{{$order->status}}</span></td>   
                          @endif
                        
                        <td>
                            <a href="{{route('user.order',[$order->user_id,$order->id])}}">
                                <button class="btn btn-info">View Order</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('status.edit',[$order->user_id,$order->id])}}">
                                <button class="btn btn-info">edit</button>
                            </a>
                        </td>
                        
                       
                      </tr>
                      @endforeach
                      <div class="row">
                        <div class="col-12 text-center">
                          {{$orders->links()}}
                        </div>
                      </div>
          </div>
                      @else
                      <td>No any orders to show</td>
                      @endif
                      
                      
                      
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
            
          <!--Row-->
        </div>

  @endsection