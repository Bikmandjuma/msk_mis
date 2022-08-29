@extends('users.citizen.Cover')
@section('content')


    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-8">
                                <div class="hero__caption">
                                    <p data-animation="fadeInLeft" data-delay=".4s">Welcome to Masaka</p>
                                    <h2 data-animation="fadeInLeft" data-delay=".6s" >muhawe ikaze mu murenge wa masaka ,waba ufite ikibazo ?</h2>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                        <a href="{{url('cool')}}" style="background-color:white;padding:10px;color:red;border:2px solid red;"><b>Kanda hano</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-8">
                                <div class="hero__caption">
                                    <p data-animation="fadeInLeft" data-delay=".4s">Welcome to Buson</p>
                                    <h1 data-animation="fadeInLeft" data-delay=".6s" >We help you to grow your  business</h1>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                        <a href="industries.html" class="btn hero-btn">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
@endsection