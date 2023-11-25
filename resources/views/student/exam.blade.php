
@extends('layouts.student_layout')

<?php
  $user = auth()->user();
  $count = \App\Models\QuizQuestion::where('quiz_id', $quiz->id)->count();
  $answered = count(\App\Http\Controllers\StudentController::get_all_response($quiz->id));

?>
<style>
    .main-heading{font-size:small;}
    .no-bullets {
        list-style-type: none;
    }
</style>

<main class=" overflow-hidden">
        <form action="{{route('submit', $quiz->id)}}" id="form" method="post" class="row">
            @csrf
        <div class="sidebar col-md-3 orders">

            <div style="background-color: white;" class="sidebar-inner">
                <!-- logo -->
                <div class="logo mb-4">
                    <div class="logo-icon">
                        <img style="height:50px;" src="{{asset('assets/images/quiz.png')}}" alt="BeRifma"></div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 id="timeRemaining">00 : 00</h2>
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
{{--                        <div class="text-mute">Done <span id="total"></span>/{{$count}}</div>--}}
{{--                        --}}
                        <br/>
                        <button type="button"  data-toggle="modal" data-target="#exampleModal"  class="step-number align-self-end">
                            End Exam
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="exampleModalLabel">End Exam</h1>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Are you sure you want to submit?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit"  class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                       </div>
                </div>

            </div>
        </div>
        <div class=" col-md-9">

            <div class="wrapper" >
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 id="timeRemaining2">00 : 00</h2>

                    </div>
                </div>
                <ul class="no-bullets" id="love">
                @foreach($questions as $data)
                        <li>
                    <?php
                        $response_exist = \App\Http\Controllers\StudentController::check_question($data->id);

                        ?>
                            <div class="step-number">Question <span>{{request()->page != null ? request()->page : 1}}</span>/{{$count}}</div>
                            <div class="main-heading">
                                {!! $data->title !!}
                            </div>

                            <div id="steps" >

                                    <!-- step 1  -->
                                    <section class="steps">
                                        <div class="">
                                            <input type="text" hidden name="page" value="{{request()->page}}">
                                            <input type="text" hidden name="total" value="{{$answered}}">
                                            <input type="text" hidden name="quiz_total" value="{{$count}}">

                                            <!-- Step 1 Heading  -->

                                            <div id="step1" class="borderc">
                                                <div class="child1 radio-field">
                                                    <input type="text" hidden name="id" value="{{$data->id}}">
                                                    <input type="text" hidden name="quiz_id" value="{{$data->quiz_id}}">
                                                    <input type="radio" onclick="handleIncrement()" name="opt{{$data->id}}" value="{{$data->a}}">
                                                    <label>
                                                        <span>A</span>
                                                        {{$data->a}}
                                                    </label>
                                                </div>
                                                <div class="child2 radio-field delay-100ms">
                                                    <input type="radio" onclick="handleIncrement()" name="opt{{$data->id}}" value="{{$data->b}}">
                                                    <label>
                                                        <span>B</span>
                                                        {{$data->b}}
                                                    </label>
                                                </div>
                                                <div class="child3 radio-field delay-200ms">
                                                    <input type="radio" onclick="handleIncrement()" name="opt{{$data->id}}" value="{{$data->c}}">
                                                    <label>
                                                        <span>C</span>
                                                        {{$data->c}}
                                                    </label>
                                                </div>
                                                <div class="child4 radio-field delay-300ms">
                                                    <input type="radio" onclick="handleIncrement()" name="opt{{$data->id}}" value="{{$data->d}}">
                                                    <label>
                                                        <span>D</span>
                                                        {{$data->d}}
                                                    </label>
                                                </div>

                                            </div>
                                            <!-- Step 1 form  -->
            {{--                                @if($response_exist)--}}
            {{--                                    <?php--}}
            {{--                                        $choice = \App\Http\Controllers\StudentController::get_response($data->id);--}}
            {{--                                        ?>--}}
            {{--                                <div id="step1" class="borderc">--}}
            {{--                                    <div class="child1 radio-field">--}}
            {{--                                        <input type="text" hidden name="id" value="{{$data->id}}">--}}
            {{--                                        <input type="text" hidden name="quiz_id" value="{{$data->quiz_id}}">--}}
            {{--                                        @if($choice->response == $data->a )--}}
            {{--                                        <input type="radio" name="opt1" value="{{$data->a}}" checked>--}}
            {{--                                        @else--}}
            {{--                                            <input type="radio" name="opt1" value="{{$data->a}}">--}}
            {{--                                        @endif--}}
            {{--                                            <label>--}}

            {{--                                            <span>A</span>--}}
            {{--                                            {{$data->a}}--}}
            {{--                                        </label>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="child2 radio-field delay-100ms">--}}
            {{--                                        @if($choice->response == $data->b )--}}
            {{--                                            <input type="radio" name="opt1" value="{{$data->b}}" checked>--}}
            {{--                                        @else--}}
            {{--                                            <input type="radio" name="opt1" value="{{$data->b}}">--}}
            {{--                                        @endif--}}
            {{--                                        <label>--}}
            {{--                                            <span>B</span>--}}
            {{--                                            {{$data->b}}--}}
            {{--                                        </label>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="child3 radio-field delay-200ms">--}}
            {{--                                        @if($choice->response == $data->c )--}}
            {{--                                            <input type="radio" name="opt1" value="{{$data->c}}" checked>--}}
            {{--                                        @else--}}
            {{--                                            <input type="radio" name="opt1" value="{{$data->c}}">--}}
            {{--                                        @endif--}}
            {{--                                        <label>--}}
            {{--                                            <span>C</span>--}}
            {{--                                            {{$data->c}}--}}
            {{--                                        </label>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="child4 radio-field delay-300ms">--}}
            {{--                                        @if($choice->response == $data->d )--}}
            {{--                                            <input type="radio" name="opt1" value="{{$data->d}}" checked>--}}
            {{--                                        @else--}}
            {{--                                            <input type="radio" name="opt1" value="{{$data->d}}">--}}
            {{--                                        @endif--}}
            {{--                                        <label>--}}
            {{--                                            <span>D</span>--}}
            {{--                                            {{$data->d}}--}}
            {{--                                        </label>--}}
            {{--                                    </div>--}}
            {{--                                    @if(!$response_exist)--}}
            {{--                                        <button type="submit" class="step-number">--}}
            {{--                                            Continue--}}
            {{--                                        </button>--}}
            {{--                                    @else--}}
            {{--                                        <a href="{{route('clear_choice', $data->id)}}"  class="btn btn-danger btn-sm">--}}
            {{--                                            Clear Choice--}}
            {{--                                        </a>--}}
            {{--                                    @endif--}}

            {{--                                </div>--}}

            {{--                                @else--}}
            {{--                                <div id="step1" class="borderc">--}}
            {{--                                    <div class="child1 radio-field">--}}
            {{--                                        <input type="text" hidden name="id" value="{{$data->id}}">--}}
            {{--                                        <input type="text" hidden name="quiz_id" value="{{$data->quiz_id}}">--}}
            {{--                                        <input type="radio" name="opt1" value="{{$data->a}}">--}}
            {{--                                        <label>--}}
            {{--                                            <span>A</span>--}}
            {{--                                            {{$data->a}}--}}
            {{--                                        </label>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="child2 radio-field delay-100ms">--}}
            {{--                                        <input type="radio" name="opt1" value="{{$data->b}}">--}}
            {{--                                        <label>--}}
            {{--                                            <span>B</span>--}}
            {{--                                            {{$data->b}}--}}
            {{--                                        </label>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="child3 radio-field delay-200ms">--}}
            {{--                                        <input type="radio" name="opt1" value="{{$data->c}}">--}}
            {{--                                        <label>--}}
            {{--                                            <span>C</span>--}}
            {{--                                            {{$data->c}}--}}
            {{--                                        </label>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="child4 radio-field delay-300ms">--}}
            {{--                                        <input type="radio" name="opt1" value="{{$data->d}}">--}}
            {{--                                        <label>--}}
            {{--                                            <span>D</span>--}}
            {{--                                            {{$data->d}}--}}
            {{--                                        </label>--}}
            {{--                                    </div>--}}
            {{--                                    @if(!$response_exist)--}}
            {{--                                        <button type="submit" class="step-number">--}}
            {{--                                            Continue--}}
            {{--                                        </button>--}}
            {{--                                    @else--}}
            {{--                                        <a href="{{route('clear_choice', $data->id)}}"  class="btn btn-danger btn-sm">--}}
            {{--                                            Clear Choice--}}
            {{--                                        </a>--}}
            {{--                                    @endif--}}

            {{--                                </div>--}}
            {{--                                @endif--}}
                                        </div>

                                    </section>
                                </div>
                        </li>
                 @endforeach
{{--                    {{$questions->links()}}--}}



                </ul>
            </form>
            <form action="{{route('lock_exam', $quiz->id)}}" method="get">
                @csrf
                <button id="myLock" hidden  type="submit" class="btn w-100 step-number">
                    Lock
                </button>
            </form>
        </div>
    </div>
        </form>
</main>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{asset('jquery.paginate.js')}}"></script>
<script>
    // Select total count
    const totalCount = document.getElementById("total");

    // Variable to track count
    var count = 0;

    // Display initial count value
    totalCount.innerHTML = count;
    const handleIncrement = () => {
        count++;
        totalCount.innerHTML = count;
    };
    const incrementCount = document.getElementById("increment");

    // Add click event to buttons
    incrementCount.addEventListener("click", handleIncrement);
</script>
<script>
    $('#love').paginate({perPage:1,  scope: 'li'});
    // document.addEventListener('visibilitychange', function() {
    //     if (document.hidden) {
    //         //select the lock button and lock
    //         var lock = document.getElementById("myLock");
    //         lock.click();
    //         console.log('Page is now hidden');
    //     }
    // });
    // Timer countdown

    var totalTime = {{ $quiz->duration}} * 60; // Convert minutes to seconds
    var saved_countdown = localStorage.getItem('saved_time');
    if(saved_countdown == null) {
       // localStorage.setItem('saved_countdown', totalTime);
    } else {
        totalTime = saved_countdown;
    }


    var timeRemaining = $('#timeRemaining');
    var timeRemaining2 = $('#timeRemaining2');

    var timer = setInterval(function() {
        var minutes = Math.floor(totalTime / 60);
        var seconds = totalTime % 60;

        timeRemaining.text(minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0'));
        timeRemaining2.text(minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0'));

        if (totalTime <= 0) {
            clearInterval(timer);
            localStorage.removeItem('saved_time');

            $('#submitQuizButton').click(); // Automatically submit the quiz when time is up
        } else if (totalTime <= 60) {
            timeRemaining.addClass('running-low'); // Change time color to red when running low
            totalTime--;
            localStorage.setItem('saved_time', totalTime);
        } else {
            totalTime--;
            localStorage.setItem('saved_time', totalTime);
        }
    }, 1000);

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

</script>


