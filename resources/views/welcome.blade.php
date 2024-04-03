<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Booking Form HTML Template</title>

    <!-- Google font -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> --}}

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('fontend/css/bootstrap.min.css')}}" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('fontend/css/style.css')}}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
<style>
    body {
        background-image: url('{{ asset("fontend/images/image.png") }}')
    }
</style>

<body>
    <?php
    session_start();
    ?>
    <!-- Nội dung của bạn ở đây -->
    <div class="topnav">
        <a href="{{URL::to('/Home')}}">Home</a>
        <a href="{{URL::to('/Home/Flight')}}">Flight</a>
        <a href="{{URL::to('/Home/Contact')}}">Contact</a>
        <a href="{{URL::to('/Login')}}" style="float:right">Login</a>
    </div>
    @yield('content')
    @yield('login')
    @yield('search')
    @yield('contact')
    @yield('flight')
    @yield('detail')
    <script src="{{asset('fontend/js/jquery.min.js')}}"></script>
    <script>
        $('.form-control').each(function() {
            floatedLabel($(this));
        });

        $('.form-control').on('input', function() {
            floatedLabel($(this));
        });

        function floatedLabel(input) {
            var $field = input.closest('.form-group');
            if (input.val()) {
                $field.addClass('input-not-empty');
            } else {
                $field.removeClass('input-not-empty');
            }
        }

        function toggleDateInputs() {
            var tripType = document.getElementById("trip-type").value;
            var departureDateInput = document.querySelector(".departure-date");
            var returnDateInput = document.querySelector(".return-date");
            if (tripType === "round-trip") {
                departureDateInput.style.display = "inline-block";
                returnDateInput.style.display = "inline-block";
            } else {
                departureDateInput.style.display = "inline-block";
                returnDateInput.style.display = "none";
            }
        }
       toggleReturnDate();
    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>