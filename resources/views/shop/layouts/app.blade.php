<!DOCTYPE html>
<html lang="ru">
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
                @guest
                    <auth-tabs inline-template>
                        <div class="col-3 d-flex flex-row align-items-baseline justify-content-end header-top-registration">
                            <span class="header-top-registration__title" @click="emitClickEvent('enter')" id="authActivate">Авторизація</span>
                            <div class="header-top-registration__separator"></div>
                            <span class="header-top-registration__title" @click="emitClickEvent('register')" id="registerActivate">Реєстрація</span>
                        </div>
                    </auth-tabs>
                @endguest
                @auth
                    <li><a href="{{ url("logout") }}">logout</a></li>
                @endauth
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
            <div
                class="header-service col-12 col-sm-12 col-md-12 col-lg-4 d-flex order-xl-3 order-lg-3 order-md-2 order-2">
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
@yield('main-content')

<!--  MOBILE MENU SHADOW START  -->
    <div class="shadow d-none" id="shadow"></div>
    <!--  MOBILE MENU SHADOW END  -->

    <!--  REGISTRATION MODAL WINDOW START  -->
    <register-enter inline-template>
        <div class="modal auth-top" v-if="modalShow" :class="modalShow ? 'show' : ''">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <ul class="nav nav-tabs auth-top__tabs position-relative" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link auth-top__link auth-top__link-active text-uppercase" id="authGet-tab"
                               data-toggle="tab" href="#authGet" role="tab" aria-controls="home"
                               aria-selected="true">Вхід</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link auth-top__link text-uppercase" id="registerGet-tab" data-toggle="tab"
                               href="#registerGet" role="tab" aria-controls="profile" aria-selected="false">Реєстрація</a>
                        </li>
                        <span class="icon-cross position-absolute auth-top__close" @click="closeModal()"></span>
                    </ul>
                    <div class="tab-content auth-top__content" id="myTabContent">
                        <div class="tab-pane fade" :class="enterTab ? ' show active' : ''" id="authGet" role="tabpanel" aria-labelledby="authGet-tab">
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
                                <div
                                    class="auth-top__form-group d-flex flex-column justify-content-center align-items-center">
                                    <span class="auth-top__or">або</span>
                                    <span class="auth-top__or">Увійти через акаунт:</span>
                                </div>
                                <div class="auth-top__form-group d-flex flex-row justify-content-around ">
                                    <button class="auth-top__social"><span class="icon-facebook"></span> Facebook</button>
                                    <button class="auth-top__social"><span class="icon-google"></span> Google</button>
                                </div>
                                <div
                                    class="auth-top__form-group d-flex flex-column justify-content-center align-items-center">
                                <span class="auth-top__or">Немає облікового запису? <a href="#"
                                                                                       class="auth-top__restore">Зареєструватися</a></span>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" :class="registerTab ? ' active show ' : ''" id="registerGet" role="tabpanel" aria-labelledby="registerGet-tab">
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
                                <div
                                    class="auth-top__form-group d-flex flex-column justify-content-center align-items-center">
                                    <span class="auth-top__or">або</span>
                                    <span class="auth-top__or">Увійти через акаунт:</span>
                                </div>
                                <div class="auth-top__form-group d-flex flex-row justify-content-around ">
                                    <button class="auth-top__social"><span class="icon-facebook"></span> Facebook</button>
                                    <button class="auth-top__social"><span class="icon-google"></span> Google</button>
                                </div>
                                <div
                                    class="auth-top__form-group d-flex flex-column justify-content-center align-items-center">
                                    <span class="auth-top__or">У Вас вже є аккаунт <a href="#" class="auth-top__restore">Вхід</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </register-enter>
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

<script src="{{ asset('libs/admin/adminlte/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('libs/admin/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('js/shop.js')}}"></script>
<script>
    // $('#authActivate').on('click', function () {
    //     $('#myModal').show(function () {
    //         $('#authGet-tab').tab('show').addClass('auth-top__link-active')
    //         $('#registerGet-tab').removeClass('auth-top__link-active')
    //     })
    // })
    // $('#registerActivate').on('click', function () {
    //     $('#myModal').show(function () {
    //         $('#registerGet-tab').tab('show').addClass('auth-top__link-active')
    //         $('#authGet-tab').removeClass('auth-top__link-active')
    //     })
    // })
    //
    // $('#closeModal').on('click', function (){
    //     $('#myModal').hide();
    // });
</script>
</body>
</html>
