<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="backend/css/themify-icons.css">
  <link rel="stylesheet" href="backend/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="backend/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="backend/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="backend/images/logo_2H_tech.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('include.admin.mainnavbar')
    @include('include.admin.navbar2')

    
    
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @yield('content')






        </div>


        



        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('include.admin.footer')
        <!-- partial -->
        </div>
<!-- main-panel ends -->
    </div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="backend/js/vendor.bundle.base.js"></script>
<script src="backend/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="backend/js/off-canvas.js"></script>
<script src="backend/js/hoverable-collapse.js"></script>
<script src="backend/js/template.js"></script>
<script src="backend/js/settings.js"></script>
<script src="backend/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->
<script src="frontend/js/jquery.min.js"></script>
<script src="frontend/js/jquery-migrate-3.0.1.min.js"></script>
<script src="frontend/js/popper.min.js"></script>
<script src="frontend/js/bootstrap.min.js"></script>
<script src="frontend/js/jquery.easing.1.3.js"></script>
<script src="frontend/js/jquery.waypoints.min.js"></script>
<script src="frontend/js/jquery.stellar.min.js"></script>
<script src="frontend/js/owl.carousel.min.js"></script>
<script src="frontend/js/jquery.magnific-popup.min.js"></script>
<script src="frontend/js/aos.js"></script>
<script src="frontend/js/jquery.animateNumber.min.js"></script>
<script src="frontend/js/bootstrap-datepicker.js"></script>
<script src="frontend/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="frontend/js/google-map.js"></script>
<script src="frontend/js/main.js"></script>
  @yield('script')
</body>

</html>
