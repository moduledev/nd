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

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
