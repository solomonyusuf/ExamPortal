@extends('layouts.admin_layout')
<?php
$user = \App\Models\User::find($id);
?>
<div class="main-content">
    <div class="page-content">
        <form enctype="multipart/form-data" method="post" action="{{route('update_user')}}" class="container-fluid">
            @csrf
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Edit User</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Profile Picture Selection</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <p class="text-muted"> profile picture should be uploaded here, with a maximum size of 3MB</p>
                                        <div class="avatar-xl mx-auto">
                                            <img style="height: 50px;" src="{{asset($user->image)}}" />
                                        </div>
                                        <div class="avatar-xl mx-auto">
                                            <input type="file" class="filepond filepond-input-circle" name="image" accept="image/png, image/jpeg, image/jpg, image/gif" />
                                        </div>

                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="labelInput" class="form-label">First Name</label>
                                    <input required type="text" value="{{$user->first_name}}" name="first_name" class="form-control" id="labelInput">
                                    <input required type="text" value="{{$user->id}}" name="id" hidden class="form-control" id="labelInput">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="labelInput" class="form-label">Last Name</label>
                                    <input required type="text" value="{{$user->last_name}}" name="last_name" class="form-control" id="labelInput">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="labelInput" class="form-label">Middle Name</label>
                                    <input required type="text" value="{{$user->middle_name}}" name="middle_name" class="form-control" id="labelInput">
                                </div>
                            </div>
                            <!--end col-->
                            @if($user->role == 'student')
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="placeholderInput" class="form-label">Exam Access</label>
                                    <label class="text-muted">(applies only to students)</label>
                                    <input type="text" value="{{$user->exam_access}}" name="exam_access" class="form-control" id="placeholderInput">
                                </div>
                            </div>
                            @endif
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="valueInput" class="form-label">User Role</label>
                                    <select required  type="text" name="role" class="form-control" id="valueInput" >
                                        @if($user->role == 'student')
                                            <option selected>student</option>
                                            <option>staff</option>
                                            <option>superadmin</option>
                                        @elseif($user->role == 'staff')
                                            <option>student</option>
                                            <option selected>staff</option>
                                            <option>superadmin</option>
                                        @elseif($user->role == 'superadmin')
                                            <option>student</option>
                                            <option>staff</option>
                                            <option selected>superadmin</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <label for="exampleDataList" class="form-label">Class</label>
                                <select name="class_id" class="form-control" id="datalistOptions">
                                    @foreach(\App\Models\StudentClass::get() as $data)
                                        @if($user->class_id == $data->id)
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
                                    <label for="readonlyInput" class="form-label">Email</label>
                                    <label class="text-muted">(applies to all)</label>
                                    <input required value="{{$user->email}}" type="email" name="email" class="form-control" id="readonlyInput">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="readonlyInput" class="form-label">Password</label>
                                    <label class="text-muted">(applies only to staff & Admin)</label>
                                    <input  type="text" value="{{$user->password}}" name="password" class="form-control" id="readonlyInput">
                                </div>
                            </div>
                            @if($user->role == 'student')
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="readonlyInput" class="form-label">Student ID</label>
                                    <input  type="text" value="{{$user->student_id}}" disabled class="form-control" id="readonlyInput">
                                </div>
                            </div>
                            @endif
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="valueInput" class="form-label">Account Status</label>
                                    <select required  type="text" name="locked" class="form-control" id="valueInput" >
                                        @if($user->locked == true)
                                            <option value="1" selected>locked</option>
                                            <option value="0">open</option>
                                        @else
                                            <option value="1">locked</option>
                                            <option value="0" selected>open</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mb-4">Save changes</button>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </form>
    </div>
</div>
