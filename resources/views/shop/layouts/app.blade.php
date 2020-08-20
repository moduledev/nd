<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Title</title>
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('libs/shop/bootstrap-4.4.1-dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('libs/shop/icomoon/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/shop/app.css')}}">
</head>
<body>
<div id="app">
    <!--  TOP HEADER START  -->
    <div class="container-fluid header-top">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-6 header-top-phones">
                    <span class="header-top-phones__title">Подзвоніть нам: (098,063)559-49-49</span>
                </div>
                <div class="col-3 d-flex flex-row align-items-baseline justify-content-end header-top-registration">
                    <span class="header-top-registration__title">Авторизація</span>
                    <div class="header-top-registration__separator"></div>
                    <span class="header-top-registration__title">Реєстрація</span>
                </div>
            </div>
        </div>
    </div>
    <!--  TOP HEADER END  -->

    <!-- HEADER START   -->
    <header class=" container-lg">
        <div class="row d-flex align-items-center header-container">
            <div class="col-12 col-sm-12 col-md-12 col-lg-2 header-logo order-xl-1 order-lg-1 order-md-1 order-1">
                <a href="#">
                    <img class="header-logo__img img-fluid" src="images/logo.png" alt="logo">
                </a>
            </div>
            <nav class="col-md-12 col-lg-6 header-menu order-xl-2 order-lg-2 order-md-3 order-3 ">
                <ul class="mobile-service-menu mobile-show">
                    <span class="icon-user mobile-service-menu__icon"></span>
                    <li class="mobile-service-menu__item"><a href="" class="mobile-service-menu__link">Вхід</a></li>
                    <span class="mobile-service-menu__separator"></span>
                    <li class="mobile-service-menu__item"><a href="" class="mobile-service-menu__link">Реєстрація</a>
                    </li>
                </ul>
                <ul class="header-menu__list">
                    <li class="header-menu__item d-flex">
                        <span class="icon-home header-menu__icon d-lg-none d-md-flex"></span><a
                            class="header-menu__link header-menu__link-active " href="#">Головна</a>
                    </li>
                    <li class="header-menu__item d-flex">
                        <span class="icon-grid header-menu__icon d-lg-none d-md-flex"></span><a
                            class="header-menu__link " href="#">Магазин</a>
                    </li>
                    <li class="header-menu__item d-flex">
                        <span class="icon-book header-menu__icon d-lg-none d-md-flex"></span><a
                            class="header-menu__link " href="#">Блог</a>
                    </li>
                    <li class="header-menu__item d-flex">
                        <span class="icon-shrink header-menu__icon d-lg-none d-md-flex"></span><a
                            class="header-menu__link " href="#">Контакти</a>
                    </li>
                    <li class="header-menu__item d-lg-none d-md-flex">
                        <span class="icon-user header-menu__icon  d-lg-none d-md-flex"></span><a
                            class="header-menu__link " href="#">Особистий кабінет</a>
                    </li>
                    <li class="header-menu__item d-lg-none d-md-flex">
                        <span class="icon-shopping-bag header-menu__icon d-lg-none d-md-flex"></span><a
                            class="header-menu__link" href="#">Кошик (0)</a>
                    </li>
                </ul>
            </nav>
            <div class="header-search col-lg-6 order-xl-2 order-lg-2 order-md-3 order-3 d-none">
                <form class="header-search__form">
                    <input type="text" class="header-search__input" placeholder="Знайти ...">
                </form>
            </div>
            <div class="header-service col-12 col-sm-12 col-md-12 col-lg-4 d-flex order-xl-3 order-lg-3 order-md-2 order-2">
                <div class="header-service__btn">
                    <span class="icon-view-list"></span>
                </div>
                <div class="d-flex align-items-center flex-row">
                    <div class="form header-search-service">
                        <span class="icon-search header-search-service__icon "></span>
                        <span class="icon-cross header-search-service__icon d-none"></span>
                    </div>
                    <div class="header-cart-icon ml-4">
                        <span class="icon-shopping-bag header-cart__icon"></span>
                        <span class="header-cart__count d-none">19</span>
                    </div>
                </div>
            </div>
            <div class="header-card position-absolute flex-column justify-content-center align-items-center">
                <div class="header-card__element d-flex align-items-center flex-row position-relative">
                    <div class="header-card__img">
                        <img src="images/cake.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="header-card__desc d-flex flex-column justify-content-lg-start ">
                        <span class="header-card__name"><a href="#"
                                                           class="header-card__link">Blueberry Blueberry</a></span>
                        <span class="header-card__price">$56</span>
                        <div class="icon-close-outline position-absolute header-card__close"></div>
                    </div>
                </div>
                <div class="header-card__element d-flex align-items-center flex-row position-relative">
                    <div class="header-card__img">
                        <img src="images/cake.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="header-card__desc d-flex flex-column justify-content-lg-start ">
                        <span class="header-card__name"><a href="#"
                                                           class="header-card__link">Blueberry Blueberry</a></span>
                        <span class="header-card__price">$56</span>
                        <div class="icon-close-outline position-absolute header-card__close"></div>
                    </div>
                </div>
                <div class="header-card__underline"></div>
                <div class="header-card__result d-flex flex-row justify-content-around">
                    <span class="header-card__subtotal text-uppercase">Всього</span>
                    <span class="header-card__count">$56</span>
                </div>
                <button class="header-card__btn text-uppercase">Оформити замовлення</button>
            </div>
        </div>
    </header>
    <!--  HEADER END  -->
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

                <div class="col-xl-3 col-lg-3 col-md-3 col-6 order-xl-1 order-lg-1 order-md-1 order-2 d-flex flex-column">
                    <div class="advantage-block__desc text-left">
                        <h3 class="advantage-block__title text-uppercase">Healthy diet</h3>
                        <p class="advantage-block__text">It is a long established fact that a reader will be distracted</p>
                        <a href="#" class="advantage-block__link">детальніше <span class="icon-arrow-thin-right"></span></a>
                    </div>
                    <div class="advantage-block__desc text-left">
                        <h3 class="advantage-block__title text-uppercase">Healthy diet</h3>
                        <p class="advantage-block__text">It is a long established fact that a reader will be distracted</p>
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
                <div class="col-xl-3 col-lg-3 col-md-3 col-6 order-xl-3 order-lg-3 order-md-3 order-3 d-flex flex-column">
                    <div class="advantage-block__desc text-left">
                        <h3 class="advantage-block__title text-uppercase">Healthy diet</h3>
                        <p class="advantage-block__text">It is a long established fact that a reader will be distracted</p>
                        <a href="#" class="advantage-block__link">детальніше <span class="icon-arrow-thin-right"></span></a>
                    </div>
                    <div class="advantage-block__desc text-left">
                        <h3 class="advantage-block__title text-uppercase">Healthy diet</h3>
                        <p class="advantage-block__text">It is a long established fact that a reader will be distracted</p>
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
                <div class="product-tabs">
                    <ul class="product-tabs__list">
                        <li class="product-tabs__tab product-tabs__tab-active">Всі Десерти</li>
                        <li class="product-tabs__tab">Десерт1</li>
                        <li class="product-tabs__tab">Десерт2</li>
                        <li class="product-tabs__tab">Десерт3</li>
                    </ul>
                    <div class="product-tabs__tab-content">
                        <div class="product-card">
                            <div class="product-card__image">
                                <img src="images/cake.jpg">
                            </div>
                            <div class="product-card__info">
                                <h5 class="product-card__title">Winter Jacket</h5>
                                <h6 class="product-card__price">$99.99</h6>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <div class="product-card__like"><i class="icon-heart-outlined"></i></div>
                                    <div class="product-card__btn">Купити</div>
                                    <div class="product-card__zoom"><i class="icon-search"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__image">
                                <img src="images/cake.jpg">
                            </div>
                            <div class="product-card__info">
                                <h5 class="product-card__title">Winter Jacket</h5>
                                <h6 class="product-card__price">$99.99</h6>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <div class="product-card__like"><i class="icon-heart-outlined"></i></div>
                                    <div class="product-card__btn">Купити</div>
                                    <div class="product-card__zoom"><i class="icon-search"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__image">
                                <img src="images/cake.jpg">
                            </div>
                            <div class="product-card__info">
                                <h5 class="product-card__title">Winter Jacket</h5>
                                <h6 class="product-card__price">$99.99</h6>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <div class="product-card__like"><i class="icon-heart-outlined"></i></div>
                                    <div class="product-card__btn">Купити</div>
                                    <div class="product-card__zoom"><i class="icon-search"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__image">
                                <img src="images/cake.jpg">
                            </div>
                            <div class="product-card__info">
                                <h5 class="product-card__title">Winter Jacket</h5>
                                <h6 class="product-card__price">$99.99</h6>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <div class="product-card__like"><i class="icon-heart-outlined"></i></div>
                                    <div class="product-card__btn">Купити</div>
                                    <div class="product-card__zoom"><i class="icon-search"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__image">
                                <img src="images/cake.jpg">
                            </div>
                            <div class="product-card__info">
                                <h5 class="product-card__title">Winter Jacket</h5>
                                <h6 class="product-card__price">$99.99</h6>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <div class="product-card__like"><i class="icon-heart-outlined"></i></div>
                                    <div class="product-card__btn">Купити</div>
                                    <div class="product-card__zoom"><i class="icon-search"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__image">
                                <img src="images/cake.jpg">
                            </div>
                            <div class="product-card__info">
                                <h5 class="product-card__title">Winter Jacket</h5>
                                <h6 class="product-card__price">$99.99</h6>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <div class="product-card__like"><i class="icon-heart-outlined"></i></div>
                                    <div class="product-card__btn">Купити</div>
                                    <div class="product-card__zoom"><i class="icon-search"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__image">
                                <img src="images/cake.jpg">
                            </div>
                            <div class="product-card__info">
                                <h5 class="product-card__title">Winter Jacket</h5>
                                <h6 class="product-card__price">$99.99</h6>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <div class="product-card__like"><i class="icon-heart-outlined"></i></div>
                                    <div class="product-card__btn">Купити</div>
                                    <div class="product-card__zoom"><i class="icon-search"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-card__image">
                                <img src="images/cake.jpg">
                            </div>
                            <div class="product-card__info">
                                <h5 class="product-card__title">Winter Jacket</h5>
                                <h6 class="product-card__price">$99.99</h6>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <div class="product-card__like"><i class="icon-heart-outlined"></i></div>
                                    <div class="product-card__btn">Купити</div>
                                    <div class="product-card__zoom"><i class="icon-search"></i></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
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
                                    <div class="single-response__arrows d-flex justify-content-center align-items-center">
                                        <div class="single-response__arrow left-radius d-flex justify-content-center align-items-center">
                                            <span class="icon-chevron-thin-left"></span>
                                        </div>
                                        <div class="single-response__arrow right-radius d-flex justify-content-center align-items-center">
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

    <!--  MOBILE MENU SHADOW START  -->
    <div class="shadow d-none"></div>
    <!--  MOBILE MENU SHADOW END  -->

    <!--  REGISTRATION MODAL WINDOW START  -->
    <div class="modal auth-top" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <ul class="nav nav-tabs auth-top__tabs position-relative" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link auth-top__link auth-top__link-active text-uppercase" id="home-tab"
                           data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Вхід</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link auth-top__link text-uppercase" id="profile-tab" data-toggle="tab"
                           href="#profile" role="tab" aria-controls="profile" aria-selected="false">Реєстрація</a>
                    </li>
                    <span class="icon-cross position-absolute auth-top__close"></span>
                </ul>
                <div class="tab-content auth-top__content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form class="auth-top__form">
                            <div class="auth-top__form-group auth-top__active d-flex flex-column">
                                <label class="auth-top__label" for="">Телефон або ел. пошта</label>
                                <input type="text" placeholder="" class="auth-top__input">
                            </div>
                            <div class="auth-top__form-group d-flex flex-column">
                                <label class="auth-top__label" for="">Пароль</label>
                                <input type="password" placeholder="" class="auth-top__input">
                            </div>
                            <div class="auth-top__form-group d-flex flex-rows justify-content-end">
                                <span><a href="" class="auth-top__restore">Забули пароль?</a></span>
                            </div>
                            <div class="auth-top__form-group d-flex flex-rows justify-content-center">
                                <button class="auth-top__btn text-uppercase">Вхід</button>
                            </div>
                            <div class="auth-top__form-group d-flex flex-column justify-content-center align-items-center">
                                <span class="auth-top__or">або</span>
                                <span class="auth-top__or">Увійти через акаунт:</span>
                            </div>
                            <div class="auth-top__form-group d-flex flex-row justify-content-around ">
                                <button class="auth-top__social"><span class="icon-facebook"></span> Facebook</button>
                                <button class="auth-top__social"><span class="icon-google"></span> Google</button>
                            </div>
                            <div class="auth-top__form-group d-flex flex-column justify-content-center align-items-center">
                                <span class="auth-top__or">Немає облікового запису? <a href="#"
                                                                                       class="auth-top__restore">Зареєструватися</a></span>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form class="auth-top__form">
                            <div class="auth-top__form-group auth-top__active d-flex flex-column">
                                <input type="text" placeholder="Ім'я" class="auth-top__input">
                            </div>
                            <div class="auth-top__form-group d-flex flex-column">
                                <input type="text" placeholder="Номер телефону" class="auth-top__input">
                            </div>
                            <div class="auth-top__form-group d-flex flex-column">
                                <input type="text" placeholder="Ел. пошта" class="auth-top__input">
                            </div>
                            <div class="auth-top__form-group d-flex flex-column">
                                <input type="password" placeholder="Пароль" class="auth-top__input">
                            </div>
                            <div class="auth-top__form-group d-flex flex-rows justify-content-end">
                                <span><a href="" class="auth-top__restore">Забули пароль?</a></span>
                            </div>
                            <div class="auth-top__form-group d-flex flex-rows justify-content-center">
                                <button class="auth-top__btn text-uppercase">Вхід</button>
                            </div>
                            <div class="auth-top__form-group d-flex flex-column justify-content-center align-items-center">
                                <span class="auth-top__or">або</span>
                                <span class="auth-top__or">Увійти через акаунт:</span>
                            </div>
                            <div class="auth-top__form-group d-flex flex-row justify-content-around ">
                                <button class="auth-top__social"><span class="icon-facebook"></span> Facebook</button>
                                <button class="auth-top__social"><span class="icon-google"></span> Google</button>
                            </div>
                            <div class="auth-top__form-group d-flex flex-column justify-content-center align-items-center">
                                <span class="auth-top__or">У Вас вже є аккаунт <a href="#" class="auth-top__restore">Вхід</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  REGISTRATION MODAL WINDOW END  -->

    <!--  FOOTER START  -->
    <footer class="container-fluid footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <h3 class="footer__title">Careful Deserts</h3>
                    <p class="footer__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor</p>
                    <p class="footer__info"><span class="icon-envelope mr-2"></span>careful.deserts@gmail.com</p>
                    <p class="footer__info"><span class="icon-call mr-2"></span>(098) 559 49 49</p>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
                    <h3 class="footer__title">Наші послуги</h3>
                    <ul class="footer-menu">
                        <li class="footer-menu__element"><a href="#" class="footer-menu__link">Головна</a></li>
                        <li class="footer-menu__element"><a href="#" class="footer-menu__link">Каталог</a></li>
                        <li class="footer-menu__element"><a href="#" class="footer-menu__link">Блог</a></li>
                        <li class="footer-menu__element"><a href="#" class="footer-menu__link">Контакти</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
                    <h3 class="footer__title">Акаунт</h3>
                    <ul class="footer-menu">
                        <li class="footer-menu__element"><a href="#" class="footer-menu__link">Мій акаунт</a></li>
                        <li class="footer-menu__element"><a href="#" class="footer-menu__link">Переглянуті</a></li>
                        <li class="footer-menu__element"><a href="#" class="footer-menu__link">Дісконт</a></li>
                        <li class="footer-menu__element"><a href="#" class="footer-menu__link">Замовлення</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <h3 class="footer__title">Instagram</h3>
                    <div class="footer-instagram d-flex justify-content-between">
                        <div class="footer-instagram__wrapper">
                            <a href="#" target="_blank" class="footer-instagram__link">
                                <span class="footer-instagram__icon icon-social"></span>
                                <img src="images/cake.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="footer-instagram__wrapper"><a href="#" target="_blank"
                                                                  class="footer-instagram__link"><span
                                    class="footer-instagram__icon icon-social"></span><img src="images/cake.jpg" alt=""
                                                                                           class="img-fluid"></a></div>
                        <div class="footer-instagram__wrapper"><a href="#" target="_blank"
                                                                  class="footer-instagram__link"><span
                                    class="footer-instagram__icon icon-social"></span><img src="images/cake.jpg" alt=""
                                                                                           class="img-fluid"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="container-fluid footer-down">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    Copyright © 2020 Fresh Vegetable. All rights reserved.
                </div>
            </div>
        </div>
    </div>
    <!--  FOOTER END  -->
</div>
<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script src="libs/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
<script>
    // $('#myModal').modal('show')
</script>
</body>
</html>
