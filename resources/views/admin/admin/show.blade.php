@extends('admin.layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Администратор {{$admin->name}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                {{ Breadcrumbs::render('admin', $admin->name) }}

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Основная информация:</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"> <i class="fas fa-user"></i> <span>Имя администратора:</span> {{$admin->name}} </li>
                            <li class="list-group-item"> <i class="fas fa-envelope"></i> <span>E-mail:</span> {{$admin->email}} </li>
                            <li class="list-group-item"> <i class="fas fa-unlock"></i> <span>Статус учетной записи:</span> {{$admin->activate === 'on' ? 'активирована' : 'не активирована'}} </li>
                            <li class="list-group-item"> <i class="fas fa-phone"></i> <span>Телефон:</span> {{$admin->phone}} </li>
                        </ul>
                    </div>
                </div>
            </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Фото администратора:</h3>
                        </div>
                        <div class="card-body d-flex align-items-center justify-content-center">
                            @if($admin->image)
                                <img src="{{asset('storage/'. $admin->image)}}"
                                     class="img-responsive img-rounded admin-form_avatar-img" alt="">
                            @else
                                <img src="{{asset('img/NoFoto.png')}}"
                                     class="img-responsive img-rounded admin-form_avatar-img" alt="">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-11">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Роли:</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                                   value="option1">
                                            <label for="customCheckbox1" class="custom-control-label">Custom
                                                Checkbox</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="customCheckbox2"
                                                   checked="" value="option2">
                                            <label for="customCheckbox2" class="custom-control-label">Custom Checkbox
                                                checked</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="customCheckbox3"
                                                   disabled="">
                                            <label for="customCheckbox3" class="custom-control-label">Custom Checkbox
                                                disabled</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        @endsection
        @section('scripts')
            <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
            <script src="https://unpkg.com/imask"></script>

            <script>
                $(document).ready(function () {
                    let phoneInput = IMask(
                        document.getElementById('phoneAdmin'),
                        {
                            mask: '+{38}(000)000-00-00',
                            lazy: false,
                            placeholderChar: '_'
                        }
                    );
                    $('#adminsList').DataTable({
                        "language": {
                            "url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
                        },
                    });
                });
            </script>
@endsection
