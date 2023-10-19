@extends('layouts.admin_layout')

<?php
$ongoing = \App\Models\Quiz::where('start_time','>', \Carbon\Carbon::now()->subHours(2))->orderBy('created_at', 'DESC')->get();
?>

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Ongoing Exams</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="listjs-table" id="customerList">

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table id="table1" class="display">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Start</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ongoing as $data)
                                        <tr>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->start_time}}</td>
                                            <td><span class="btn-sm btn-success">concluded</span></td>
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
