@extends('admin.layouts.app')
@section('content')

    <div class="row grid-margin">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">  Add Category</h4>

            {{-- check if element not in database --}}


            @if (Session::has('status')){
                <div class="alert alert-success">

                {{Session::get('status')}}

                </div>
            }
            @endif

            {{-- check if element  in database --}}

            @if(Session::has('status1')){
                <div class="alert alert-danger">

                    {{Session::get('status1')}}
    
                </div>

            }
                
            @endif

                {!!Form::open(['action'=>'CategoryController@savecategory','class'=>'cmxform','method'=>'POST','id'=>'commentForm'])!!}
                    {{ csrf_field()}}

                <div class="form-group">
                    <label for="cname">Name (required, at least 2 characters)</label><br><br>
                    {{Form::label('','product category',['for'=>'cname'])}}
                    {{Form::text('category_name','',['class'=>'form-control','','minlength'=>'2'])}}
                </div>
                {{form::submit('save',['class'=>'btn btn-primary'])}}
                {!!Form::close() !!}
                
                
            </div>
        </div>
        </div>
    </div>
    
@endsection

@section('scripts')

<script src="{{asset('backend/js/bt-maxLength.js')}}"></script>

    
@endsection
