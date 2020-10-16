@extends('admin.layouts.main')

@section('content')

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item">Order</li>
              
            </ol>
          </div>
          @method('PUT')   {!! csrf_field() !!}
          <div class="row">  
          
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <form action="{{route('order.search')}}" method ="get">
                  
                    <div class="form-group">
                      <label for="">ค้นหา id user</label>
                      <input type="search"  name="search" id="search" placeholder="ตัวอย่าง : 123" >
                      <span class="form-group-btn"> 
                      <button type="submit" class="btn btn-info" >ค้นหา</button>
                      </span>
                    </div>
                    </form>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ</th>
                        <th>เมล์</th>
                        <th>วันที่สั่ง</th>
                        <th>สถานะการจ่าย</th>
                        <th>ดูข้อมูล</th>
                        <th>แก้ไขสถานะการจ่าย</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($orders)>0)
                      @foreach($orders as $order)
                      <tr>

                        <td><a href="#">{{$order->id}}</a></td>
                       
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{date('d-M-y',strtotime($order->created_at))}}</td>
                        
                          @if($order->payment == 'success')
                            <td><span style='font-size:17px' class="badge badge-success">{{$order->payment}}</span></td>
                          @elseif ($order->payment=='cancel')
                          <td ><span style='font-size:17px' class="badge badge-danger">{{$order->payment}}</span></td>  
                          @elseif ($order->payment =='unconfirmed')
                          <td ><span style='font-size:17px' class="badge badge-warning">{{$order->payment}}</span></td>   
                          @endif
                    
                      @endforeach
                      <div class="row">
                        <div class="col-12 text-center">
                          
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