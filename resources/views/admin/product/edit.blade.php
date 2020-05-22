@extends('admin.layouts.app')
@section('styles')
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Изменить товар</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                {{ Breadcrumbs::render('product-edit', $product->base_name) }}
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection

@section('content')
    <div hidden>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="ukraine" viewBox="0 0 512 512">
                <title>ukraine</title>
                <rect y="85.337" style="fill:#FFDA44;" width="512" height="341.326"/>
                <rect y="85.337" style="fill:#338AF3;" width="512" height="170.663"/>
            </symbol>
            <symbol id="russia" viewBox="0 0 512 512">
                <title>russia</title>
                <polygon style="fill:#F0F0F0;"
                         points="0,85.33 0,199.107 0,312.885 0,426.662 512,426.662 512,312.885 512,199.107 512,85.33 "/>
                <rect y="85.333" style="fill:#0052B4;" width="512" height="341.337"/>
                <rect y="85.333" style="fill:#F0F0F0;" width="512" height="113.775"/>
                <rect y="312.884" style="fill:#D80027;" width="512" height="113.775"/>
            </symbol>
        </svg>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row" id="app">
                    <update-product :product="{{$product->id}}"></update-product>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
