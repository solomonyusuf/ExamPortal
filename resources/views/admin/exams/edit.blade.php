@extends('layouts.admin_layout')

<?php
  $exam = \App\Models\Quiz::find($id);
  $questions = \App\Models\QuizQuestion::where('quiz_id', $exam->id)->get();
  $count = 0;
  ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <form class="card col-md-12" style="margin:3px;" method="post" action="{{route('update_exam')}}">
                @csrf
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Update Exam</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="basiInput" class="form-label">Name</label>
                                    <input required type="text" value="{{$exam->name}}" name="name" class="form-control" id="basiInput">
                                    <input required type="text" value="{{$exam->id}}" hidden="" name="id" class="form-control" id="basiInput">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="labelInput" class="form-label">Points(per question)</label>
                                    <input required type="number" value="{{$exam->points}}" name="points" class="form-control" id="labelInput">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="placeholderInput" class="form-label">Total Score Expected</label>
                                    <input required type="text" value="{{$exam->total_point}}" name="total_point" class="form-control" id="placeholderInput" placeholder="eg 40/100">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="valueInput" class="form-label">Duration(in minutes)</label>
                                    <input required  type="text" value="{{$exam->duration}}" name="duration" class="form-control" id="valueInput" >
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <label for="exampleDataList" class="form-label">Class</label>
                                <select name="class_id" class="form-control" id="datalistOptions">
                                    @foreach(\App\Models\StudentClass::get() as $data)
                                        @if($exam->class_id == $data->id)
                                        <option value="{{$data->id}}" selected>{{$data->name}}</option>
                                        @else
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="readonlyInput" class="form-label">Start Time</label>
                                    <input required type="datetime-local" value="{{$exam->start_time}}" name="start_time" class="form-control" id="readonlyInput">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mb-4">Save changes</button>
                    </div>
                </div>
                <!-- container-fluid -->
            </form>
            <div class="card col-sm-12" >
                @csrf
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Questions</h4>
                    <div class="card-body">
                            <div>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#myModal">Add Question</button>
                                <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none; overflow: scroll;" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <form method="post" action="{{route('add_question')}}" class="modal-content">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Add Question</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="gy-4">
                                                    <div>
                                                        <div>
                                                            <label for="basiInput" class="form-label">Question Title</label>
                                                            <textarea required name="title" id="description" class="form-control"></textarea>
                                                            <input required type="text" value="{{$exam->id}}" hidden="" name="quiz_id" class="form-control" id="basiInput">
                                                        </div>

                                                        <div>
                                                            <div>
                                                                <label for="labelInput" class="form-label">Correct Option</label>
                                                                <input required type="text"  name="correct" class="form-control" id="labelInput">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <label for="labelInput" class="form-label">Option A</label>
                                                                <input required type="text"  name="a" class="form-control" id="labelInput">
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div>
                                                            <div>
                                                                <label for="placeholderInput" class="form-label">Option B</label>
                                                                <input required type="text"  name="b" class="form-control" id="placeholderInput" placeholder="eg 40/100">
                                                            </div>
                                                        </div>
                                                            <div>
                                                            <div>
                                                                <label for="labelInput" class="form-label">Option C</label>
                                                                <input required type="text" name="c" class="form-control" id="labelInput">
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div>
                                                            <div>
                                                                <label for="placeholderInput" class="form-label">Option D</label>
                                                                <input required type="text"  name="d" class="form-control" id="placeholderInput" placeholder="eg 40/100">
                                                            </div>
                                                        </div>
                                                        <!--end col-->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary ">Save Changes</button>
                                            </div>

                                        </form><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="gy-4">
                           @foreach($questions as $question)

                                        <div style="border:solid;padding:20px;margin:5px;border-width:3px;" class="card-body">
                                            <p>({{ 'Question'.' '.++$count}})&nbsp; {!! $question->title !!}</p>
                                            <div class="form-group">
                                                <div>
                                                   <p><strong>(A)&nbsp;{{$question->a}}</strong></p>
                                                </div>
                                                <div>
                                                   <p><strong>(B)&nbsp;{{$question->b}}</strong></p>
                                                </div>
                                                <div>
                                                   <p><strong>(C)&nbsp;{{$question->c}}</strong></p>
                                                </div>
                                                <div>
                                                   <p><strong>(D)&nbsp;{{$question->d}}</strong></p>
                                                </div>
                                            </div>
                                            <strong class="form-control"> Answer : {{$question->correct}}</strong><br/>
                                            <a href="{{route('edit_question', $question->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{route('delete_question', $question->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                        </div>


                           @endforeach
                        </div>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>

            <!-- End Page-content -->
        </div>
    </div>
</div>
