<div class="card-body">
    <div class="table-responsive">
        <table id="paginacionEstudiantes" class="table table-striped table-hover table-sm">
            <thead class="thead">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Dni</th>
                    <th>Promedio</th>
                    <th>Grado</th>
                    <th>Sección</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->id }}</td>
                        <td>{{ $estudiante->nombre }}</td>
                        <td>{{ $estudiante->apellido }}</td>
                        <td>{{ $estudiante->edad }}</td>
                        <td>{{ $estudiante->dni }}</td>
                        <td>{{ $estudiante->promedio }}</td>
                        <td>{{ $estudiante->grado }}</td>
                        <td>{{ $estudiante->seccion }}</td>

                        <td>
                            <form action="{{ route('eliminarestudiante',$estudiante->id) }}" method="POST">
                                <a class="btn btn-sm btn-primary " href="{{ route('vistadetalleestudiante',$estudiante->id) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                <a class="btn btn-sm btn-success" href="{{ route('vistaeditarestudiante',$estudiante->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                <a onClick="eliminarEstudiante({{ $estudiante->id }})" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i> Eliminar</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $estudiantes->render() !!}
    </div>
</div>
