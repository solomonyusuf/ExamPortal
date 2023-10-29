@extends('layouts.admin_layout')

<?php
$users = \App\Models\User::where('locked', true)->orderBy('created_at', 'DESC')->get();
?>
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Locked Users</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="listjs-table" id="customerList">

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table id="table1" class="display">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Class</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $data)
                                        <tr>
                                            <td>{{$data->first_name.' '.$data->last_name.' '.$data->middle_name}}</td>
                                            <td>{{$data->role}}</td>
                                            <td>{{\App\Models\StudentClass::find($data->class_id)->name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->password}}</td>
                                            <td>
                                                @if($data->locked == true)
                                                    Locked
                                                @else
                                                    Open
                                                @endif
                                            </td>
                                            <td><a href="{{route('unlock_student', $data->id)}}" class="btn btn-sm btn-primary">Unlock</a></td>
                                            <td><a href="{{route('delete_user', $data->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
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
