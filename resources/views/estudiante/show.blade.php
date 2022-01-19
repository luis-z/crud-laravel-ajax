@extends('layouts.app')

@section('template_title')
    <span id="nombreCompleto"></span>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
        @csrf
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle del Estudiante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estudiantes') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <center>
                            <span id="error" class="error text-danger"></span>
                            <span id="registered" class="text-success"></span>
                        </center>
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            <span id="nombre"></span>
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            <span id="apellido"></span>
                        </div>
                        <div class="form-group">
                            <strong>Edad:</strong>
                            <span id="edad"></span>
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            <span id="dni"></span>
                        </div>
                        <div class="form-group">
                            <strong>Promedio:</strong>
                            <span id="promedio"></span>
                        </div>
                        <div class="form-group">
                            <strong>Grado:</strong>
                            <span id="grado"></span>
                        </div>
                        <div class="form-group">
                            <strong>Seccion:</strong>
                            <span id="seccion"></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(() => {

            const url = window.location.href
            const estudianteId = url.split("/").pop()

            let body = {
                '_token': "{{ csrf_token() }}"
            }

            $.ajax({
                url: estudianteId,
                type: 'post',
                data: body,
                success: (res) => {
                    let mensaje = res.data

                    if (res.exito) {
                        // console.log(`res`, res)
                        const estudiante = res.data
                        $('#nombreCompleto').text(estudiante.nombre + ' ' + estudiante.apellido)
                        $('#nombre').text(estudiante.nombre)
                        $('#apellido').text(estudiante.apellido)
                        $('#dni').text(estudiante.dni)
                        $('#edad').text(estudiante.edad)
                        $('#promedio').text(estudiante.promedio)
                        $('#grado').text(estudiante.grado)
                        $('#seccion').text(estudiante.seccion)
                    } else {
                        $('#error').text(mensaje)
                    }
                },
                error: (err) => {
                    console.log(`error`, error)
                    $('#error').text('Algo ha ocurrido ...')
                } 
            })
        })
    </script>
@endsection
