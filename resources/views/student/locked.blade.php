<?php
$user = auth()->user();?>
@extends('layouts.student_layout')
<main class="popreveal overflow-hidden">
        <div class="row">
        <div class="sidebar col-md-3 orders">

            <div class="sidebar-inner">
                <!-- logo -->
                <div class="logo mb-4">
                    <div class="logo-icon">
                        <img style="height:50px;" src="{{asset('assets/images/quiz.png')}}" alt="BeRifma"></div>
                </div>
                <div class="card" style="margin-bottom:80px;border:solid;padding:10px;border-width:4px;border-color: #f38535;">
                    <div class="card-body">
                        <div class="card-title">
                            <img src="{{asset($user->image)}}" style="height:150px;border-radius:20px;" />
                        </div>
                        <h4><b><i>{{$user->first_name.' '.$user->last_name}}</i></b></h4>
                        <p class="text-mute">{{$user->student_id}}</p>
                    </div>
                </div>
                <br/>
                <a href="{{route('logout')}}" class="btn step-number">
                    Logout
                </a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="wrapper">

                <div id="steps" class="show-section">
                    <!-- step 1  -->
                    <section class="steps">
                        <div class="step-inner">
                            <!-- Step 1 Heading  -->
                            <div class="main-heading">
                                <h1 style="font-size:100px;color:#f38535;">Account</h1><br/>
                                <h1 style="font-size:100px;color:#f38535;">Locked</h1>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="{{asset('student/assets/js/securitychecks.js')}}"></script>
