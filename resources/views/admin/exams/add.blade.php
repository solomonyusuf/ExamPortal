@extends('layouts.admin_layout')

<div class="main-content">
    <div class="page-content">
        <form method="post" action="{{route('add_exam')}}" class="container-fluid">
            @csrf
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Add Exam</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="basiInput" class="form-label">Name</label>
                                    <input required type="text" name="name" class="form-control" id="basiInput">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="labelInput" class="form-label">Points(per question)</label>
                                    <input required type="number" value="1" name="points" class="form-control" id="labelInput">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="placeholderInput" class="form-label">Total Score Expected</label>
                                    <input required type="text" name="total_point" class="form-control" id="placeholderInput" placeholder="eg 40/100">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="valueInput" class="form-label">Duration(in minutes)</label>
                                    <input required  type="text" name="duration" class="form-control" id="valueInput" >
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
                                    <label for="readonlyInput" class="form-label">Start Time</label>
                                    <input required type="datetime-local" name="start_time" class="form-control" id="readonlyInput">
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
