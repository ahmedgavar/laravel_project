@extends('admin.layouts.app')
@section('title')
Edit Slider
    
@endsection
@section('content')


    <div class="row grid-margin">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @if (Session::has('status'))
                <div class="alert alert-success">

                {{Session::get('status')}}

                </div>
            
            @endif
            <h4 class="card-title">update Slider  </h4>
                {!!Form::open(['action'=>'SliderController@updateslider','class'=>'cmxform','method'=>'POST','id'=>'commentForm','enctype'=>'multipart/form-data'])!!}
                    {{ csrf_field()}}

                <div class="form-group">
                    {{Form::hidden('id',$sliders->id)}}

                    {{Form::label('','Description One Name',['for'=>'cname'])}}
                    {{Form::text('description_one',$sliders->description1,['class'=>'form-control','','minlength'=>'2'])}}
                </div>

                <div class="form-group">

                    {{Form::label('',' Description Two',['for'=>'cname'])}}
                    {{Form::text('description_two',$sliders->description2,['class'=>'form-control','','minlength'=>'2'])}}
                 </div>
                 
                <div class="form-group">
                    {{Form::label('',' Slider Image',['for'=>'cname'])}}
                    {{Form::file('slider_image',['class'=>'form-control'])}}
                </div>
                
                {{form::submit('update',['class'=>'btn btn-primary'])}}
                {!!Form::close() !!}
                
                
            </div>
        </div>
        </div>
    </div>
    
@endsection

@section('scripts')
<script src="{{asset('backend/js/bt-maxLength.js')}}"></script>


    
@endsection
