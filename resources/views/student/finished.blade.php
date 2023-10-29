
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
                <div class="card mb-4">
                    <div class="card-body">
                        <h3>50:44</h3>
                    </div>
                </div>
                <div class="card" style="margin-top:40px;">
                    <div class="card-body">
                        <div class="card-title">
                            <img src="https://th.bing.com/th/id/R.297a2e571020b5f4bbd40ba9ef6b8247?rik=x2CRzjljvSxMPg&pid=ImgRaw&r=0" style="height:150px;border-radius:20px;" />
                        </div>
                        <h4><b><i>Samuel Solomon</i></b></h4>

                        <p class="text-mute">English</p>
                        <p class="text-mute">JSS1 2nd Term</p>
                        <p class="text-mute">36562356532</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="steps-col col-md-9">
            <div class="wrapper">

                <form id="steps" method="post" class="show-section">
                    <!-- step 1  -->
                    <section class="steps">
                        <div class="step-inner">
                            <!-- Step 1 Heading  -->
                            <div class="main-heading">
                                Exam Concluded
                            </div>
                        </div>
                    </section>
                </form>

            </div>
        </div>
    </div>
</main>
<script src="{{asset('student/assets/js/securitychecks.js')}}"></script>
