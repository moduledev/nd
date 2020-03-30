@extends('admin.layouts.app')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Главная страница</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                {{ Breadcrumbs::render('dashboard') }}
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-lg-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>

                        <p>Регистраций пользователей</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="#" class="small-box-footer">Подробности <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>

                        <p>Новых заказов</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">Подробности <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
