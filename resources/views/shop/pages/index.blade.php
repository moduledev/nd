@extends('shop.layouts.app')
@section('main-content')
    <div class="container-fluid slider">
        <div class="row no-gutters">
            <div class="col-12 ">
                <div class="jumbotron">
                    <h1 class="display-4">Hello, world!</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                        attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger
                        container.</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!--  ADVANTAGE START  -->
    <section class="advantage-block main-section container-fluid">
        <div class="container">
            <div class="row">
                <h3 class="main-section__title w-100 text-center">We provide clean food</h3>
                <div class="col-12">
                    <div class="section-separator d-flex flex-row align-items-center justify-content-center">
                        <div class="section-separator__leftline"></div>
                        <i class="section-separator__icon icon-cake"></i>
                        <div class="section-separator__rightline"></div>
                    </div>
                </div>

                <div
                    class="col-xl-3 col-lg-3 col-md-3 col-6 order-xl-1 order-lg-1 order-md-1 order-2 d-flex flex-column">
                    <div class="advantage-block__desc text-left">
                        <h3 class="advantage-block__title text-uppercase">Healthy diet</h3>
                        <p class="advantage-block__text">It is a long established fact that a reader will be
                            distracted</p>
                        <a href="#" class="advantage-block__link">детальніше <span class="icon-arrow-thin-right"></span></a>
                    </div>
                    <div class="advantage-block__desc text-left">
                        <h3 class="advantage-block__title text-uppercase">Healthy diet</h3>
                        <p class="advantage-block__text">It is a long established fact that a reader will be
                            distracted</p>
                        <a href="#" class="advantage-block__link">детальніше <span class="icon-arrow-thin-right"></span></a>
                    </div>

                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 order-xl-2 order-lg-2 order-md-2 order-1">
                    <div class="advantage-block__images">
                        <div class="advantage-block__image" style="background-image: url('images/cake.jpg') "></div>
                        <div class="advantage-block__image"></div>
                        <div class="advantage-block__image"></div>
                        <div class="advantage-block__image"></div>
                        <div class="advantage-block__image"></div>
                        <div class="advantage-block__image"></div>
                    </div>
                </div>
                <div
                    class="col-xl-3 col-lg-3 col-md-3 col-6 order-xl-3 order-lg-3 order-md-3 order-3 d-flex flex-column">
                    <div class="advantage-block__desc text-left">
                        <h3 class="advantage-block__title text-uppercase">Healthy diet</h3>
                        <p class="advantage-block__text">It is a long established fact that a reader will be
                            distracted</p>
                        <a href="#" class="advantage-block__link">детальніше <span class="icon-arrow-thin-right"></span></a>
                    </div>
                    <div class="advantage-block__desc text-left">
                        <h3 class="advantage-block__title text-uppercase">Healthy diet</h3>
                        <p class="advantage-block__text">It is a long established fact that a reader will be
                            distracted</p>
                        <a href="#" class="advantage-block__link">детальніше <span class="icon-arrow-thin-right"></span></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--  ADVANTAGE END  -->

    <!--  OUR PRODUCT START  -->
    <section class="products-tabs-section main-section container-fluid">
        <div class="container">
            <div class="row">
                <h3 class="main-section__title w-100 text-center">Наші десерти</h3>
                <div class="col-12">
                    <div class="section-separator d-flex flex-row align-items-center justify-content-center">
                        <div class="section-separator__leftline"></div>
                        <i class="section-separator__icon icon-cake"></i>
                        <div class="section-separator__rightline"></div>
                    </div>
                </div>
                <tabs :categories="{{$categories}}"></tabs>
            </div>
        </div>
    </section>
    <!--  OUR PRODUCT STOP  -->

    <!--  RESPONSE START  -->
    <section class="container-fluid bg-grey main-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single-response">
                        <div class="single-response__slide">
                            <div class="single-response__box" style="background-image: url('images/cake.jpg') ">
                                <a class="single-response__link" href="#"></a>
                            </div>
                            <div class="single-response__desc">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h3 class="single-response__author">Joyce Weaver - Farmer Store</h3>
                                    <div
                                        class="single-response__arrows d-flex justify-content-center align-items-center">
                                        <div
                                            class="single-response__arrow left-radius d-flex justify-content-center align-items-center">
                                            <span class="icon-chevron-thin-left"></span>
                                        </div>
                                        <div
                                            class="single-response__arrow right-radius d-flex justify-content-center align-items-center">
                                            <span class="icon-chevron-thin-right"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-response__rating">
                                    <span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
                                </div>
                                <p class="single-response__text">
                                    It is a long established fact that a reader will be distracted by the readable
                                    content of a page when looking at its layout. The point of using Lorem Ipsum is that
                                    it has a more-or-less normal distribution of letters, as opposed to using.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  RESPONSE END  -->
@endsection
