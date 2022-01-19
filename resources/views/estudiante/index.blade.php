@extends('layouts.app')

@section('template_title')
    Estudiante
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de Estudiantes') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('vistacrearestudiante') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Agregar un nuevo estudiante') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="tablaEstudiantes">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var page = null
        listarEstudiantes(1)

        $(document).ready(() => {
            $(document).on('click','.pagination a', function (event) {
                event.preventDefault()
                $('li').removeClass('active')
                $(this).parent('li').addClass('active')
                page = $(this).attr('href').split('page=')[1]
                listarEstudiantes(page)
            })
        })
        function listarEstudiantes(page) {
            $.ajax({
                url : 'listarestudiantes?page=' + page,
            }).done( (data) => {
                $('#tablaEstudiantes').html(data)
            }).fail( (jqXHR,ajaxOptions,thrownError) => {
                alert('No response from server')
            })
        }

        function eliminarEstudiante (estudianteId) {

            // console.log(`estudianteId`, estudianteId)

            let body = {
                '_token': "{{ csrf_token() }}"
            }

            $.ajax({
                url: 'destroy/' + estudianteId,
                type: 'post',
                data: body,
                success: (res) => {
                    let mensaje = res.data

                    if (res.exito) {
                        // console.log(`res`, res)
                        let current = page ? page : 1
                        listarEstudiantes(page)
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
