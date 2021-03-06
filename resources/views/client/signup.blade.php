@extends('client.layouts.login')
@section('title')
    sign up
@endsection
@section('content')

<div class="limiter">
    <div class="container-login100" style="background-image: url('frontend/login/images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form">
                <span class="login100-form-logo">
                    <i class="zmdi zmdi-landscape"></i>
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
                    sign up
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="pass" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        sign up
                    </button>
                </div>

                
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
    
@endsection
	
	
