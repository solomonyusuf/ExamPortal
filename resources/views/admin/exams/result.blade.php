@extends('layouts.admin_layout')

<?php
    $quiz = \App\Models\Quiz::find($id);
   $results = \App\Models\QuizResult::where('quiz_id', $id)->get();
?>
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0"> Exam Result</h4>
                        <small>{{$quiz->name}}</small>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="listjs-table" id="customerList">

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table id="table" class="display">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Score</th>
                                        <th>Grade</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($results as $data)
                                        <tr>
                                            <?php
                                                $user = \App\Models\User::find($data->users_id);
                                                ?>
                                            <td>{{$user->first_name.' '.$user->last_name}}</td>
                                            <td>{{$data->score}}</td>
                                            <td>
                                                @if($data->score >= 70)
                                                    A
                                                @elseif($data->score <= 69 && $data->score >= 60)
                                                    B
                                                @elseif($data->score <= 59 && $data->score >= 50)
                                                    C
                                                @elseif($data->score <= 49 && $data->score >= 40)
                                                    D
                                                @elseif($data->score <= 39)
                                                    F
                                                @endif
                                            </td>
                                            <td>{{$data->created_at}}</td>
                                         </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>
