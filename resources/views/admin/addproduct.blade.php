@extends('admin.layouts.app')
@section('content')

    <div class="row grid-margin">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Add Product  </h4>
                {!!Form::open(['action'=>'AdminController@addproduct','class'=>'cmxform','method'=>'POST','id'=>'commentForm'])!!}
                    {{ csrf_field()}}

                <div class="form-group">
                    {{Form::label('','product Name',['for'=>'cname'])}}
                    {{Form::text('Product_name','',['class'=>'form-control'])}}
                </div>

                <div class="form-group">

                    {{Form::label('','Product Price',['for'=>'cname'])}}
                    {{Form::number('product_price','',['class'=>'form-control'])}}
                 </div>
                 <div class="form-group">

                    {{Form::label('','Product Category',['for'=>'cname'])}}

                     {{Form::select('size', ['L' => 'Large', 'S' => 'Small',],null,['placeholder' => 'select category'],['class'=>'form-control'])}}

                <div class="form-group">

                        {{Form::file('product_image',['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('','Product Status',['for'=>'cname'])}}

                        {{Form::checkbox('product_name','Status',['class'=>'form-control'])}}


                </div>
                {{form::submit('save',['class'=>'btn btn-primary'])}}
                {{!!Form::close() !!}}
                
                
            </div>
        </div>
        </div>
    </div>
    
@endsection


