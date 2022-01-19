@extends('layouts.app')

@section('template_title')
    Update Estudiante
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Estudiante</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estudiantes') }}"> Regresar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="editarEstudiante" method="POST" role="form">
                            @csrf

                            @include('estudiante.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">

        const url = window.location.href
        const estudianteId = url.split("/").pop()
        
        cargarEstudiante()

        $(document).ready(() => {
            

            $('#editarEstudiante').submit((e) => {
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

                // console.log(`body`, body)
                
                $.ajax({
                    url: '/edit/' + estudianteId,
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

        function cargarEstudiante ()
        {

            let body = {
                '_token': "{{ csrf_token() }}"
            }

            $.ajax({
                url: '/detalleestudiante/' + estudianteId,
                type: 'post',
                data: body,
                success: (res) => {
                    let mensaje = res.data

                    if (res.exito) {
                        const estudiante = res.data
                        $('#nombre').val(estudiante.nombre)
                        $('#apellido').val(estudiante.apellido)
                        $('#dni').val(estudiante.dni)
                        $('#edad').val(estudiante.edad)
                        $('#promedio').val(estudiante.promedio)
                        $('#grado').val(estudiante.grado)
                        $('#seccion').val(estudiante.seccion)
                    } else {
                        $('#error').text(mensaje)
                    }
                },
                error: (err) => {
                    console.log(`error`, error)
                    $('#error').text('Algo ha ocurrido ...')
                } 
            })
        }
    </script>
@endsection
