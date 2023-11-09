
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from templates.seekviral.com/trimba3/forms/CompanyRegistrationPage/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Oct 2023 08:21:56 GMT -->
<head>

    <!-- <link rel="stylesheet" href="assets/css/colorvariants/default.css" id="defaultscheme"> -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Page</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="../../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Bootstrap-5 -->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/bootstrap.min.css')}}">

    <!-- custom-styles -->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('landing/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('landing/assets/css/animation.css')}}">
</head>
<body>

<!-- background -->
<div class="ls-bg">
    <img class="ls-bg-inner" src="landing/assets/images/login.jpg" alt="">
</div>

<main onload="OpenfullScreen()" class="overflow-hidden">
    <div class="wrapper">
        <div class="main-inner">

            <!-- logo -->

            <div class="row h-100 align-content-center">
                <div class="col-md-6 tab-100 order_2">

                    <!-- side text -->
{{--                    <div class="side-text">--}}
{{--                        <article>--}}
{{--                            <span>Join Our Marketplace</span>--}}
{{--                            <h1 class="main-heading">Company</h1>--}}
{{--                            <p>--}}
{{--                                The next generation social network & community! Connect--}}
{{--                                with your friends and play with our quests and badges--}}
{{--                                gamification system!--}}
{{--                            </p>--}}
{{--                        </article>--}}

{{--                        <!-- login sign up button -->--}}
{{--                        <div class="logSign">--}}
{{--                            <button id="showlogin" type="button" class="active">Login</button>--}}
{{--                            <button id="showregister" type="button">register</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="col-md-6 tab-100">

                    <!-- form -->
                    <div class="form">
                        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

                        <h2 class="login-form form-title">
                            <div class="logo">
                                <div class="logo-icon">
                                    <img src="{{asset('assets/images/quiz.png')}}" alt="BeRifma">
                                </div>
                            </div>
                        </h2>

                        <!-- login form -->
                        <form action="{{route('student_login')}}" class="login-form" method="post">
                            @csrf
                            <div class="input-field">
                                <input type="text" name="student_id" id="username" required>
                                <label>
                                    Student ID
                                </label>
                            </div>
                            <div class="input-field">
                                <input name="password" type="password" id="password" required>
                                <label>
                                    Exam access
                                </label>
                            </div>

                            <div class="login-btn">
                                <button type="submit" class="login">Login Account</button>
                            </div>
                        </form>
                        <div class="login-form signup_social">
                            <div class="divide-heading">
                                <span>
                                    <a class="btn btn-default" href="{{url('/management/login')}}">
                                    <svg width="30px" height="30px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">

                                            <rect x="0" fill="none" width="20" height="20"/>

                                            <g>

                                                <path d="M14.27 6.87L10 3.14 5.73 6.87 5 6.14l5-4.38 5 4.38zM14 8.42l-4.05 3.43L6 8.38v-.74l4-3.5 4 3.5v.78zM11 9.7V8H9v1.7h2zm-1.73 4.03L5 10 .73 13.73 0 13l5-4.38L10 13zm10 0L15 10l-4.27 3.73L10 13l5-4.38L20 13zM5 11l4 3.5V18H1v-3.5zm10 0l4 3.5V18h-8v-3.5zm-9 6v-2H4v2h2zm10 0v-2h-2v2h2z"/>

                                            </g>

                                        </svg>
                                </a>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<div id="error">

</div>


<!-- Bootstrap-5 -->
<script src="{{ asset('landing/assets/js/bootstrap.min.js')}}"></script>

<!-- Jquery -->
<script src="{{ asset('landing/assets/js/jquery-3.6.1.min.js')}}"></script>
<button id="submit-button">Submit</button>


<!-- My js -->
<script src="{{ asset('landing/assets/js/custom.js')}}"></script>
</body>

<!-- Mirrored from templates.seekviral.com/trimba3/forms/CompanyRegistrationPage/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Oct 2023 08:22:01 GMT -->
</html>
