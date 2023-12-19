
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Portal</title>
   <!-- font-awesome -->
    <link rel="stylesheet" href="{{asset('/assets/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/bootstrap.min.css')}}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/assets/fontawesome.min.css')}}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap-5 -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('jquery.paginate.css')}}">

    <!-- custom-styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animation.css')}}">

    <!-- color sceme -->
    <link rel="stylesheet" href="{{asset('assets/css/colorvariants/default.css')}}" id="defaultscheme">



    <!-- color switcher -->
    <link rel="stylesheet" href="{{asset('colorswitcher/assets/css/colorswitcher.css')}}">
</head>
<body>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

  @yield('content')


<!-- Bootstrap-5 -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<!-- Jquery -->
<script src="{{asset('assets/js/jquery-3.6.1.min.js')}}"></script>

<!-- My js -->
<script src="{{asset('assets/js/custom.js')}}"></script>

<!-- colorswitcher -->
<script src="{{asset('assets/js/callswitcher.js')}}"></script>

<script src="{{asset('/assets/popper.min.js')}}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('/assets/bootstrap.min.js')}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
