
@extends('layouts.student_layout')
<main class="popreveal overflow-hidden">
        <div class="row">
        <div class="sidebar col-md-3 orders">
            <div class="sidebar-inner">

                <!-- logo -->
                <div class="logo">
                    <div class="logo-icon">
                        <img src="student/assets/images/logo.png" alt="BeRifma">
                    </div>
                    <div class="logo-text">
                        Trimba<span>.</span>
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
                <div class="step-counter">
                    <div class="step-rate"><span>0%</span> Complete</div>
                    <div class="step-bar">
                        <div class="move"></div>
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
                            <div class="step-number">Question <span>1</span>/3</div>

                            <!-- Step 1 Heading  -->
                            <div class="main-heading">
                                Over the Past Two <sub>(2)</sub> Weeks, how
                                Often have You had little interest or
                                Pleasure in Doing things?
                            </div>

                            <!-- Step 1 form  -->
                            <div id="step1" class="borderc">
                                <div class="child1 radio-field">
                                    <input type="radio" name="op1" value="Access Therapists Who Accept insurance" checked>
                                    <label>
                                        <span>A</span>
                                        Access Therapists Who Accept insurance
                                    </label>
                                </div>
                                <div class="child2 radio-field delay-100ms">
                                    <input type="radio" name="op1" value="Choose your therapist">
                                    <label>
                                        <span>B</span>
                                        Choose your therapist
                                    </label>
                                </div>
                                <div class="child3 radio-field delay-200ms">
                                    <input type="radio" name="op1" value="Easier Therapy Access">
                                    <label>
                                        <span>C</span>
                                        Easier Therapy Access
                                    </label>
                                </div>
                                <div class="child4 radio-field delay-300ms">
                                    <input type="radio" name="op1" value="Therapy Meets">
                                    <label>
                                        <span>D</span>
                                        Therapy Meets
                                    </label>
                                </div>
                            </div>

                            <!-- Next Previuos Button  -->
                            <div class="next-prev">
                                <button class="next" id="step1btn" type="button"><span>Continue</span></button>
                            </div>
                        </div>
                    </section>

                    <!-- step 2  -->
                    <section class="steps">
                        <div class="step-inner">
                            <div class="step-number">Question <span>2</span>/3</div>

                            <!-- Step 2 Heading  -->
                            <div class="main-heading">
                                Over the Past Two <sub>(2)</sub> Weeks, how
                                Often have You had little interest or
                                Pleasure in Doing things?
                            </div>

                            <!-- Step 2 Form  -->
                            <div id="step2" class="borderc">
                                <div class="row">
                                    <div class="col-md-4 lap-50">
                                        <div class="radio-field-2">
                                            <input type="radio" name="op2" value="1">
                                            <div class="radio-img">
                                                <img src="assets/images/pet1.png" alt="">
                                            </div>
                                            <label>1</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 lap-50">
                                        <div class="radio-field-2 delay-100ms">
                                            <input type="radio" name="op2" value="2">
                                            <div class="radio-img">
                                                <img src="assets/images/pet2.png" alt="">
                                            </div>
                                            <label>2</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 lap-50">
                                        <div class="radio-field-2 delay-200ms">
                                            <input type="radio" name="op2" value="1 & 2">
                                            <div class="radio-img">
                                                <img src="assets/images/pet1.png" alt="">
                                                <img src="assets/images/pet2.png" alt="">
                                            </div>
                                            <label>Both</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Next Previous Button -->
                            <div class="next-prev">
                                <button class="prev" type="button"><span>Back</span></button>
                                <button class="next" id="step2btn" type="button"><span>Continue</span></button>
                            </div>
                        </div>
                    </section>

                    <section class="steps">
                        <div class="step-inner">
                            <div class="step-number">Question <span>3</span>/3</div>

                            <!-- Step 3 Heading -->
                            <div class="main-heading">
                                What is your First reaction <br> To the product
                            </div>

                            <!-- Step 3 Form -->
                            <div id="step3" class="borderc">
                                <div class="row">
                                    <article>
                                        <div class="sub-heading">
                                            How to Be Conversational?
                                        </div>
                                        <p class="sub-text">What you think Your Company Rating Deserve</p>
                                    </article>
                                </div>
                                <div class="stars">
                                    <div class="star-inner">
                                        <i class="star fa-regular fa-star"></i>
                                        <i class="star fa-regular fa-star"></i>
                                        <i class="star fa-regular fa-star"></i>
                                        <i class="star fa-regular fa-star"></i>
                                        <i class="star fa-regular fa-star"></i>
                                    </div>
                                    <div class="star-count">You selected <span id="starselection">0</span> Star</div>
                                </div>
                                <div class="line"></div>
                                <p class="sub-text">How you Contact to our Company</p>

                                <select class="social" name="social" id="social">
                                    <option value="facebook">Facebook</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="Twitter">Twitter</option>
                                </select>
                                <span class="dropdown"></span>
                            </div>



                            <!-- Next Previous Button-->
                            <div class="next-prev">
                                <button class="prev" type="button"><span>Back</span></button>
                                <button class="next" id="sub" type="button"><span>Submit</span></button>
                            </div>
                        </div>
                    </section>
                </form>

            </div>
        </div>
    </div>
</main>

