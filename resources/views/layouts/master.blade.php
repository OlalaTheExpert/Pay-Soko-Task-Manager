<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      
        <title>{{ config('app.name', 'Pay-Soko-Task-Manager') }}</title>
		
		<!-- Favicon -->
        {{-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png"> --}}
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/line-awesome.min.css') }}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
         <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
     
		
	
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
            @include('layouts.header')
            @include('layouts.sidebar')
            @yield('content')
         </div>
		<!-- /Main Wrapper -->
		
           <script>
            var slider = document.getElementById("progress");
            var output = document.getElementById("value");
            output.innerHTML = slider.value;
            slider.oninput = function() {
            output.innerHTML = this.value;
            }
            </script>
		<!-- jQuery -->
        <script src="{{ URL::asset('assets/js/jquery-3.5.1.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{ URL::asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Slimscroll JS -->
		<script src="{{ URL::asset('assets/js/jquery.slimscroll.min.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ URL::asset('assets/js/app.js') }}"></script>
        {{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}
		
    </body>
</html>