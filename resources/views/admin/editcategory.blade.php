@extends('admin.layouts.app')
@section('title')
    Edit 
@endsection



@section('content')
<div class="row grid-margin">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Edit Category </h4>
            {!!Form::open(['action'=>'CategoryController@updatecategory','class'=>'cmxform','method'=>'POST','id'=>'commentForm'])!!}
                    {{ csrf_field()}}

                <div class="form-group">
                    {{Form::hidden('id',$category->id)}}
                    {{Form::label('','product category',['for'=>'cname'])}}
                    {{Form::text('category_name',$category->category_name,['class'=>'form-control','','minlength'=>'2'])}}
                </div>

                
                {{form::submit('Update',['class'=>'btn btn-primary'])}}
                {!!Form::close() !!}







          
       
  <!-- End custom js for this page-->
@section('scripts')

<script src="{{asset('backend/js/data-table.js')}}"></script>

@endsection

