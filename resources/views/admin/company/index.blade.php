@extends('admin.layouts.main')
@section('content')
{{ csrf_field() }}
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 ml-4 text-gray-800">Product</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Category</li>
  </ol>
</div>
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category Tables</h1>
          </div>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <a class="m-0 font-weight-bold text-primary" href="company/create">company create</a>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>company_name</th>
                        <th>action</th>
                        <th></th>
                      </tr>
                    </thead>
                    @if(count($company)>0)
                    @foreach($company as $row)
                    <tbody>
                      <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->company_name}}</td>

                        <td><a href="{{route('company.edit',[$row->id])}}" class="btn btn-sm btn-primary">Edit</a></td>
                        <td>
                        <form action="{{route('company.destroy',$row->id)}}"method="post">@csrf 
                        {{method_field('DELETE')}}
                        <input type="submit" value="delete"class="btn btn-danger" onclick=" return confirm('u want delete ? id {{$row->id}} {{$row->name}}') ">
                        </td>
                      </tr>
                    
                    </tbody>
                    @endforeach
                    @else
                      <td>No category created yet!</td>
                    @endif
                  </table>
                  
                </div>
                
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
        </div>
        <!---Container Fluid-->
      </div>
</div>
@endsection