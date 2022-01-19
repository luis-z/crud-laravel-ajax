<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <div class="col-md-2">
                <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
            </div>
            <div class="col-md-6">
                <input id="nombre" type="text" class="form-control" name="nombre" required autocomplete="name" autofocus>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2">
                <label for="apellido" class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>
            </div>
            <div class="col-md-6">
                <input id="apellido" type="text" class="form-control" name="apellido" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2">
                <label for="edad" class="col-md-4 col-form-label text-md-end">{{ __('Edad') }}</label>
            </div>
            <div class="col-md-6">
                <input id="edad" type="text" class="form-control" name="edad" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2">
                <label for="dni" class="col-md-4 col-form-label text-md-end">{{ __('DNI') }}</label>
            </div>
            <div class="col-md-6">
                <input id="dni" type="text" class="form-control" name="dni" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2">
                <label for="promedio" class="col-md-4 col-form-label text-md-end">{{ __('Promedio') }}</label>
            </div>
            <div class="col-md-6">
                <input id="promedio" type="text" class="form-control" name="promedio" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2">
                <label for="grado" class="col-md-4 col-form-label text-md-end">{{ __('Grado') }}</label>
            </div>
            <div class="col-md-6">
                <input id="grado" type="text" class="form-control" name="grado" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2">
                <label for="seccion" class="col-md-4 col-form-label text-md-end">{{ __('Sección') }}</label>
            </div>
            <div class="col-md-6">
                <input id="seccion" type="text" class="form-control" name="seccion" required>
            </div>
        </div>
        <div class="row mb-3">
            <span id="error" class="error text-danger"></span>
            <span id="exito" class="text-success"></span>
        </div>

        <div class="box-footer mt20">
            <button id="submit" type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</div>