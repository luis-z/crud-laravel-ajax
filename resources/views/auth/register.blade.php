@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrarse') }}</div>

                    <div class="card-body">
                        <form id="formularioRegistro" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="passwordConfirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="passwordConfirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <center>
                                    <span id="error" class="error text-danger"></span>
                                    <span id="registered" class="text-success"></span>
                                </center>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="submit" type="submit" class="btn btn-primary">
                                        {{ __('Registrar Usuario') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(() => {
            $('#formularioRegistro').submit((e) => {
                e.preventDefault();
                $("#submit").prop('disabled', true)
                
                let token = $('input[name="_token"').val()
                let name = $('#name').val()
                let email = $('#email').val()
                let password = $('#password').val()
                let passwordConfirm = $('#passwordConfirm').val()
                
                let body = {
                    '_token': token,
                    'name': name,
                    'email': email,
                    'password': password,
                    'passconfirm': passwordConfirm
                }
                
                $.ajax({
                    url: '{{route("registro")}}',
                    type: 'post',
                    data: body,
                    success: (res) => {
                        let mensaje = res.data

                        if (res.exito) {
                            $('#error').hide()
                            $('#registered').text(mensaje)
                            setTimeout(() => {
                                window.location.href = "/"
                            }, 5000);
                        } else {
                            $("#submit").prop('disabled', false)
                            $('#error').text(mensaje)
                        }
                    },
                    error: (err) => {
                        console.log(`error`, error)
                        $("#submit").prop('disabled', false)
                        $('#error').text('Algo ha ocurrido ...')
                    } 
                })
            })
        })
    </script>
@endsection
