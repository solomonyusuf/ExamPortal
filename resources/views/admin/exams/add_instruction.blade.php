@extends('layouts.admin_layout')
<?php
  $instruction = \App\Models\Instruction::first();
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form method="post" action="{{route('modify_instruction')}}" class="card">
                @csrf
                <div class="card-header">
                    <h5 class="card-title" id="myModalLabel">Modify Instruction</h5>
                </div>
                <div class="card-body">
                    <div class="gy-4">
                        <div>
                            <div>
                                <label for="basiInput" class="form-label">Instruction</label>
                                <textarea required name="content" id="description" class="form-control">{!! $instruction->content !!}</textarea>
                                <input required type="text" value="{{$instruction->id}}" hidden="" name="id" class="form-control" id="basiInput">
                            </div>


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
