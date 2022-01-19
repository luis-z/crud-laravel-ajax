@extends('layouts.app')

@section('template_title')
    Create Estudiante
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Estudiante</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estudiantes') }}"> Regresar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="crearEstudiante" method="POST">
                            @csrf

                            @include('estudiante.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(() => {
            $('#crearEstudiante').submit((e) => {
                e.preventDefault();
                $("#submit").prop('disabled', true)
                
                let body = {
                    '_token': $('input[name="_token"').val(),
                    'nombre': $('#nombre').val(),
                    'apellido': $('#apellido').val(),
                    'edad': $('#edad').val(),
                    'dni': $('#dni').val(),
                    'promedio': $('#promedio').val(),
                    'grado': $('#grado').val(),
                    'seccion': $('#seccion').val(),
                }
                
                $.ajax({
                    url: '{{route("crearestudiante")}}',
                    type: 'post',
                    data: body,
                    success: (res) => {
                        let mensaje = res.data

                        if (res.exito) {
                            $('#error').hide()
                            $('#exito').text(mensaje)
                            setTimeout(() => {
                                window.location.href = "/estudiantes"
                            }, 2000);
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
