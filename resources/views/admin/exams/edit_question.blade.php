@extends('layouts.admin_layout')

<?php
  $question = \App\Models\QuizQuestion::find($id);
  $count = 0;
  ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form method="post" action="{{route('update_question')}}" class="card">
                @csrf
                <div class="card-header">
                    <h5 class="card-title" id="myModalLabel">Edit Question</h5>
                    <a href="{{route('edit_exams', $question->quiz_id)}}" type="button" class="btn btn-primary">Back to Questions</a>
                </div>
                <div class="card-body">
                    <div class="gy-4">
                        <div>
                            <div>
                                <label for="basiInput" class="form-label">Question Title</label>
                                <textarea required name="title" id="description" class="form-control">{!! $question->title !!}</textarea>
                                <input required type="text" value="{{$question->id}}" hidden="" name="id" class="form-control" id="basiInput">
                                <input required type="text" value="{{$question->quiz_id}}" hidden="" name="quiz_id" class="form-control" id="basiInput">
                            </div>

                            <div>
                                <div>
                                    <label for="labelInput" class="form-label">Correct Option</label>
                                    <input required type="text" value="{{$question->correct}}"  name="correct" class="form-control" id="labelInput">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="labelInput" class="form-label">Option A</label>
                                    <input required type="text" value="{{$question->a}}"  name="a" class="form-control" id="labelInput">
                                </div>
                            </div>
                            <!--end col-->
                            <div>
                                <div>
                                    <label for="placeholderInput" class="form-label">Option B</label>
                                    <input required type="text" value="{{$question->b}}" name="b" class="form-control" id="placeholderInput" placeholder="eg 40/100">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="labelInput" class="form-label">Option C</label>
                                    <input required type="text" value="{{$question->c}}" name="c" class="form-control" id="labelInput">
                                </div>
                            </div>
                            <!--end col-->
                            <div>
                                <div>
                                    <label for="placeholderInput" class="form-label">Option D</label>
                                    <input required type="text" value="{{$question->d}}"  name="d" class="form-control" id="placeholderInput" placeholder="eg 40/100">
                                </div>
                            </div>
                            <!--end col-->

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary ">Save Changes</button>
                </div>

            </form>
        </div>
    </div>
</div>
