@extends('admin.layouts.app')
@section('content')

    <div class="row grid-margin">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">  Add Category</h4>
                {!!Form::open(['action'=>'AdminController@addcategory','class'=>'cmxform','method'=>'POST','id'=>'commentForm'])!!}
                    {{ csrf_field()}}

                <div class="form-group">
                    <label for="cname">Name (required, at least 2 characters)</label>
                    <input id="cname" class="form-control" name="name" minlength="2" type="text" required>
                    {{Form::label('','product category',['for'=>'cname'])}}
                    {{Form::text('category_name','',['class'=>'form-control','minlength'=>'2'])}}
                </div>
                {{form::submit('save',['class'=>'btn btn-primary'])}}
                {{!!Form::close() !!}}
                
                
            </div>
        </div>
        </div>
    </div>
    
@endsection


