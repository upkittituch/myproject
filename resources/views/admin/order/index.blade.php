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
                       <label >ค้นหา</label>
                      <input type="search"  name="search" id="search"placeholder=" id หรือ name"   >
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
                        <th>วันที่สั่ง</th>
                        <th>สถานะการจ่าย</th>
                        <th>สถานะการจัดส่ง</th>
                        <th>ดูข้อมูล</th>
                        <th>แก้ไขการจัดส่ง</th>
                        <th>แก้ไขการจ่าย</th>
                       
                        
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($orders)>0)
                      @foreach($orders as $order)
                      <tr>

                        <td><a href="#">{{$order->id}}</a></td>
                       
                        <td>{{$order->name}}</td>
                        <td>{{date('d-M-y',strtotime($order->created_at))}}</td>
                          
                          @if($order->payment == 'ยืนยันเรียบร้อยแล้ว')
                          <td><span style='font-size:17px' class="badge badge-success">{{$order->payment}}</span></td>
                          @elseif ($order->payment=='ยกเลิก')
                          <td ><span style='font-size:17px' class="badge badge-danger">{{$order->payment}}</span></td>  
                          @elseif ($order->payment =='ยังไม่ได้รับการยืนยัน')
                          <td ><span style='font-size:17px' class="badge badge-warning">{{$order->payment}}</span></td>  
                          @elseif ($order->payment =='เก็บเงินปลายทาง')
                          <td ><span style='font-size:17px' class="badge badge-info">{{$order->payment}}</span></td> 
                          @endif
                          
                          @if($order->tracking =='กำลังจัดเตรียมสินค้า')
                          <td><span style='font-size:17px' class="badge badge-warning">{{$order->tracking}}</span></td>
                          @elseif ($order->tracking=='กำลังดำเนินการ')
                          <td ><span style='font-size:17px' class="badge badge-secondary">{{$order->tracking}}</span></td>  
                          @elseif ($order->tracking =='กำลังจัดส่ง')
                          <td ><span style='font-size:17px' class="badge badge-success">{{$order->tracking}}</span></td>   
                          @endif
                        
                        <td>
                            <a href="{{route('user.order',[$order->user_id,$order->id,$order->address])}}">
                                <button class="btn btn-sm btn-info">view order</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('status.edit',[$order->user_id,$order->id])}}">
                                <button class="btn btn-sm btn-primary">status</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('payment.edit',[$order->user_id,$order->id])}}">
                                <button class="btn btn-sm btn-primary">payment</button>
                            </a>
                        </td>
                        
                       
                      </tr>
                      @endforeach
                    
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
            <div class="row">
                        <div class="col-12 text-center">
                            {{$orders->links()}}
                        </div>
                      </div>
          <!--Row-->
        </div>
        </div>

  @endsection