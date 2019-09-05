@extends('admin.layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Добавить пользователя</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Основная информация:</h3>
                    </div>
                    <form action="{{route('admin.add')}}" method="POST" class="admin-form"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="input-group mb-3">
                                @if ($errors->has('name'))
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name" class="form-control is-invalid"
                                           placeholder="Имя пользователя"
                                           required autofocus>
                                    <span class="admin-form_error-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @else
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name" class="form-control" placeholder="Имя пользователя"
                                           required autofocus>
                                @endif
                            </div>
                            <div class="form-group">
                                @if ($errors->has('password'))
                                    <input type="password" name="password" class="form-control is-invalid"
                                           id="exampleInputPassword1"
                                           placeholder="Пароль" required>
                                    <span class="admin-form_error-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @else
                                    <input type="password" name="password" class="form-control"
                                           id="exampleInputPassword1"
                                           placeholder="Пароль" required>
                                @endif

                            </div>
                            <div class="input-group mb-3">
                                @if ($errors->has('email'))
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control is-invalid"
                                           value="{{ old('email') }}" placeholder="Email" required>
                                    <span class="admin-form_error-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @else
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control " placeholder="Email" required>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                @if ($errors->has('phone'))
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="tel" name="phone" class="form-control is-invalid" id="phoneAdmin"
                                           value="{{ old('phone') }}" placeholder="Телефон" required>
                                    <span class="admin-form_error-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @else
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="tel" name="phone" class="form-control " id="phoneAdmin" placeholder="Телефон" required>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Фото пользователя</label>
                                <div class="input-group">
                                    @if ($errors->has('image'))
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input is-invalid" name="image"
                                                   id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Выберите
                                                файл</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Загрузить</span>
                                        </div>
                                        <span class="admin-form_error-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @else
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image"
                                                   id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Выберите
                                                файл</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Загрузить</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="activate" value="true" class="custom-control-input" checked
                                       id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Активация аккаунта</label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </div>
                    </form>
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
