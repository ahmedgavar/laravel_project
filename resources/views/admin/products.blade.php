@extends('admin.layouts.app')
@section('title')
    Products
@endsection



@section('content')
{{Form::hidden('',$increment=1)}}

    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Products</h4>
        @if (Session::has('status'))
                <div class="alert alert-success">

                {{Session::get('status')}}

                </div>
            
            @endif

            {{-- check if element  in database --}}

            
            @if(Session::has('status1')){
                <div class="alert alert-danger">

                    {{Session::get('status1')}}
    
                </div>

            }
                
            @endif
        
        <div class="row">
        <div class="col-12">
            <div class="table-responsive">
            <table id="order-listing" class="table">
                <thead>
                <tr>
                    <th>Order #</th>
                    <th>Product Name</th>
                    <th> Category</th>
                    <th> Price</th>
                    <th> Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product )
                    <tr>
                        <td>{{$increment}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_category}}</td>
                        <td>{{$product->product_price}}</td>
                        <td><img src="/storage/product_images/{{$product->product_image}}" alt="">{{$product->product_image}}</td>
                        @if ($product->status==1)
                            <td>
                                <label class="badge badge-success">Activated</label>
                            </td>
                        
                        @else

                            <td>
                            <label class="badge badge-danger">Not Activated</label>

                            </td>
                            
                        @endif
                        <td>

                            <button class="btn btn-outline-primary" onclick="window.location.href='{{url('/edit_product/'.$product->id)}}'">Edit</button>
                            <a  href="/delete_product/{{$product->id}}" class="btn btn-outline-danger" id='delete'>Delete</a>
                            @if ($product->status==1)

                            <button class="btn btn-outline-warning" 
                            onclick="window.location.href='{{url('/disactivate_product/'.$product->id)}}'">disactivate</button>
                            
                            @else

                            <button class="btn btn-outline-success"
                             onclick="window.location.href='{{url('/activate_product/'.$product->id)}}'">activate</button>
                            
                            @endif


                        </td>

                        
                        
                        
                    </tr>
                    {{Form::hidden($increment=$increment+1)}}
                    @endforeach
               
                
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
                
@endsection

          
       
  <!-- End custom js for this page-->
@section('scripts')

<script src="{{asset('backend/js/data-table.js')}}"></script>

@endsection