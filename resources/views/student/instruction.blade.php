
@extends('layouts.student_layout')

<?php
  $user = auth()->user();
  $quiz = \App\Models\Quiz::find(session()->get('exam_id'));
  $count = \App\Models\QuizQuestion::where('quiz_id', $quiz->id)->count();
  $instruction = \App\Models\Instruction::first();
?>
<style>
    .main-heading{font-size:small;}
    .no-bullets {
        list-style-type: none;
    }
</style>

<main class=" overflow-hidden">
        <form action="{{route('start', $quiz->id)}}" id="form" method="post" class="row">
            @csrf
        <div class="sidebar col-md-3 orders">

            <div style="background-color: white;" class="sidebar-inner">
                <!-- logo -->
                <div class="logo mb-4">
                    <div class="logo-icon">
                        <img style="height:50px;" src="{{asset('assets/images/quiz.png')}}" alt="BeRifma"></div>
                </div>

                <div class="card" style="margin-bottom:80px;border:solid;padding:10px;border-width:4px;border-color: #f38535;">
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
                            Start Exam
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="exampleModalLabel">Start Exam</h1>
                                        <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="img-fluid" src="{{asset($user->image)}}" style="height:150px;border-radius:75px;" />
                                        <h5>Dear {{$user->first_name}}, are you sure you want to start? please ensure you select your options completely. Once submission is done you cannot make any changes.</h5>
                                        <input hidden id="storage" name="storage" type="number"/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" id="submitQuizButton"  class="btn btn-primary">Start Exam</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                       </div>
                </div>

            </div>
        </div>
        <div class=" col-md-9">
            <div style="border:solid;padding:10px;border-width:4px;border-color: #f38535;" class="card mb-4">
                <div class="card-body">
                    <h2>{{$quiz->duration}}: 00</h2>
                </div>
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Exam Instructions</h1>
                </div>
                <div class="modal-body">

                {!! $instruction->content !!}
                </div>
            </div>
         </div>
              </div>
        </form>
</main>
<style>
    .card{}
    .paginate-pagination{
        font-size:x-large;
        font-weight: bolder;

    }
  li.a{
        color:white;background-color: #00909d;
    }
    .page{
        padding: 35px;
    }
    .response{
        background-color:#00909d;
        color:white;
    }
    .active{color:red;}

</style>



