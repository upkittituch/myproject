@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Category</h1>
            </div>
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Category Create</h6>
                    </div>
                    <div class="card-body">
                    {!! Form::open(['action' => 'CategoryController@store','method'=>'post','files'=>true] )!!}
                    {!! csrf_field() !!}
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('name') !!}
                                {!! Form::text('name',null,["class"=>"form-control" ,'placeholder'=>'name', 'required'])!!}
                            </div>
                            <input type="submit" value="save" class="btn btn-primary">
                            <a href="{{URL::previous()}}" class="btn btn-success">back</a>
                        </div>
                    {!! Form::close() !!}
                    </div>
                </div>
                                    
                
    </div>
     
@endsection
