@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Product</h1>
            </div>
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Product Create</h6>
                    </div>
                    <div class="card-body">
                    {!! Form::open(['action' => 'ProductController@store','method'=>'post','files'=>true] )!!}
                    {!! csrf_field() !!}
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('Name') !!}
                                {!! Form::text('name',null,["class"=>"form-control",'placeholder'=>'name', 'required'])!!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('Description') !!}
                                {!! Form::text('desc',null,["class"=>"form-control",'placeholder'=>'description', 'required'])!!}
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Choose Category</label>
                              <select name="category"  class="form-control" >
                                <option value="">select</option>
                                @foreach(App\Category::all() as $key=> $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
      
                              </select>   
                          </div>
                        </div>  
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('Price') !!}
                                {!! Form::number('price',null,["class"=>"form-control",'placeholder'=>'0', 'required'])!!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('image upload') !!}
                                {!! Form::file('image') !!}

                            </div>
                        </div>
                        <input type="submit" value="save" class="btn btn-primary">
                    <a href="{{URL::previous()}}" class="btn btn-success">back</a>
                    </div>
                    {!! Form::close() !!}
                    </div>
                </div>
                                    
                
    </div>
</div>     
@endsection
