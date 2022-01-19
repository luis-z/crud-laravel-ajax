@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form id="formularioLogin" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <center>
                                    <span id="error" class="error text-danger"></span>
                                    <span id="exito" class="text-success"></span>
                                </center>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button id="submit" type="submit" class="btn btn-primary">
                                        {{ __('Iniciar Sesión') }}
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
            $('#formularioLogin').submit((e) => {
                e.preventDefault();
                $("#submit").prop('disabled', true)
                
                let token = $('input[name="_token"').val()
                let email = $('#email').val()
                let password = $('#password').val()
                
                let body = {
                    '_token': token,
                    'email': email,
                    'password': password
                }
                
                $.ajax({
                    url: '{{route("login")}}',
                    type: 'post',
                    data: body,
                    success: (res) => {
                        let mensaje = res.data

                        if (res.exito) {
                            $('#error').hide()
                            $('#exito').text(mensaje)
                            setTimeout(() => {
                                window.location.href = "/estudiantes"
                            }, 1000);
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
