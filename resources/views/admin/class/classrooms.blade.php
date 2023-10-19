@extends('layouts.admin_layout')
<?php
  $classrooms = \App\Models\StudentClass::get();
?>

<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0"> Classrooms</h4>

                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="listjs-table" id="customerList">

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table id="table1" class="display">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($classrooms as $data)
                                        <tr>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->created_at}}</td>
                                            <td><a href="{{route('edit_class', $data->id)}}" class="btn btn-sm btn-primary">Edit</a></td>
                                            <td><a href="{{route('delete_classroom', $data->id)}}" class="btn btn-sm btn-danger">Delete</a></td>

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
