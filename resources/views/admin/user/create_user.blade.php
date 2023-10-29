@extends('layouts.admin_layout')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Add User</h4>
                </div><!-- end card header -->
                <form enctype="multipart/form-data" method="post" action="{{route('add_user')}}"  class="card-body">
                    @csrf
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
                                    <input required type="text" name="first_name" class="form-control" id="labelInput">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="labelInput" class="form-label">Last Name</label>
                                    <input required type="text" name="last_name" class="form-control" id="labelInput">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="labelInput" class="form-label">Middle Name</label>
                                    <input required type="text" name="middle_name" class="form-control" id="labelInput">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="placeholderInput" class="form-label">Exam Access</label>
                                    <label class="text-muted">(applies only to students, first name will be used)</label>
                                    <input type="text" disabled name="exam_access" class="form-control" id="placeholderInput">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="valueInput" class="form-label">User Role</label>
                                    <select required  type="text" name="role" class="form-control" id="valueInput" >
                                        <option>Select One</option>
                                        <option>student</option>
                                        <option>staff</option>
                                        <option>superadmin</option>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <label for="exampleDataList" class="form-label">Class</label>
                                <select name="class_id" class="form-control" id="datalistOptions">
                                    @foreach(\App\Models\StudentClass::get() as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end col-->

                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="readonlyInput" class="form-label">Student ID</label>
                                        <input name="phone"  type="text" placeholder="eg 8093723842" class="form-control">
                                    </div>
                                </div>

                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="readonlyInput" class="form-label">Email</label>
                                    <label class="text-muted">(applies to all)</label>
                                    <input required type="email" name="email" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="readonlyInput" class="form-label">Password</label>
                                    <label class="text-muted">(applies only to staff & Admin)</label>
                                    <input  type="password" name="password" class="form-control" id="readonlyInput">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="valueInput" class="form-label">Account Status</label>
                                    <select required  type="text" name="locked" class="form-control" id="valueInput" >
                                        <option>Select One</option>
                                        <option value="1">locked</option>
                                        <option value="0">open</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mb-4">Save changes</button>
                    </div>
                </form>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
    </div>
</div>
