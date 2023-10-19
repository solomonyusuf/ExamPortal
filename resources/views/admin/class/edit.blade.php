@extends('layouts.admin_layout')
<?php
   $class = \App\Models\StudentClass::find($id);
?>

<div class="main-content">
    <div class="page-content">
        <form method="post" action="{{route('update_classroom')}}" class="container-fluid">
            @csrf
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Add Class</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="basiInput" class="form-label">Name</label>
                                    <input required type="text" value="{{$class->name}}" name="name" class="form-control" id="basiInput">
                                    <input required hidden type="text" value="{{$class->id}}" name="id" class="form-control" id="basiInput">
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
