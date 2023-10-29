
@extends('layouts.student_layout')

<?php
  $user = auth()->user();
  $count = \App\Models\QuizQuestion::where('quiz_id', $quiz->id)->count();

?>
<style>
    .main-heading{font-size:small;}
</style>

<main class="popreveal overflow-hidden">
        <div class="row">
        <div class="sidebar col-md-3 orders">

            <div class="sidebar-inner">
                <!-- logo -->
                <div class="logo mb-4">
                    <div class="logo-icon">
                        <img style="height:50px;" src="{{asset('assets/images/quiz.png')}}" alt="BeRifma"></div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 id="timeRemaining">{{$quiz->duration}} : 00</h2>
                    </div>
                </div>
                <div class="card" style="margin-top:40px;">
                    <div class="card-body">
                        <div class="card-title">
                            <img src="{{asset($user->image)}}" style="height:150px;border-radius:20px;" />
                        </div>
                        <h4><b><i>{{$user->first_name.' '.$user->last_name}}</i></b></h4>

                        <p class="text-mute">{{$quiz->name}}</p>
                        <p class="text-mute">{{$user->student_id}}</p>
                        <div class="step-number">
                           End Exam
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="steps-col col-md-9">

            <div class="wrapper">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 id="timeRemaining2">{{$quiz->duration}} : 00</h2>
                    </div>
                </div>
                @foreach($questions as $data)
                    <form id="steps" method="post" class="show-section">
                        <!-- step 1  -->
                        <section class="steps">
                            <div class="step-inner">
                                <div class="step-number">Question <span>{{request()->page != null ? request()->page : 1}}</span>/{{$count}}</div>

                                <!-- Step 1 Heading  -->
                                <div class="main-heading">
                                    {!! $data->title !!}
                                </div>

                                <!-- Step 1 form  -->
                                <div id="step1" class="borderc">
                                    <div class="child1 radio-field">
                                        <input type="radio" name="opt1" value="{{$data->a}}">
                                        <label>
                                            <span>A</span>
                                            {{$data->a}}
                                        </label>
                                    </div>
                                    <div class="child2 radio-field delay-100ms">
                                        <input type="radio" name="opt1" value="{{$data->b}}">
                                        <label>
                                            <span>B</span>
                                            {{$data->b}}
                                        </label>
                                    </div>
                                    <div class="child3 radio-field delay-200ms">
                                        <input type="radio" name="opt1" value="{{$data->c}}">
                                        <label>
                                            <span>C</span>
                                            {{$data->c}}
                                        </label>
                                    </div>
                                    <div class="child4 radio-field delay-300ms">
                                        <input type="radio" name="opt1" value="{{$data->d}}">
                                        <label>
                                            <span>D</span>
                                            {{$data->d}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                @endforeach
                    {{$questions->links()}}

            </div>
        </div>
    </div>
</main>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{asset('student/assets/js/securitychecks.js')}}"></script>
<script>

    // Timer countdown

    var totalTime = {{ $quiz->duration}} * 60; // Convert minutes to seconds
    var timeRemaining = $('#timeRemaining');
    var timeRemaining2 = $('#timeRemaining2');

    var timer = setInterval(function() {
        var minutes = Math.floor(totalTime / 60);
        var seconds = totalTime % 60;

        timeRemaining.text(minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0'));
        timeRemaining2.text(minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0'));

        if (totalTime <= 0) {
            clearInterval(timer);
            $('#submitQuizButton').click(); // Automatically submit the quiz when time is up
        } else if (totalTime <= 60) {
            timeRemaining.addClass('running-low'); // Change time color to red when running low
            totalTime--;
            sessionStorage.setItem('quiz_duration', totalTime);
        } else {
            totalTime--;
            sessionStorage.setItem('quiz_duration', totalTime);
        }
    }, 1000);



</script>

