<!-- Vista crear tipos de Dispositivo -->
<div class="upside">
    <a href="?c=detalleAllTipoDispositivo" class="Inicio">« Regresar </a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> CREAR NUEVO TIPO DE DISPOSITIVO </h2>
    </div>
    <form method="POST" action="?c=crearTipoDispositivo" class='formulario'>        
        <div class="form-group" align="center" >
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idTipoDispositivo" class='label_form'>ID del Tipo de Dispositivo: </label>
                <input type="text" class="col-sm-2 col-form-label" id="input_form" name="idTipoDispositivo" placeholder="ID del Tipo Dispositivo" required>
            </div>                
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="nombreTipoDispositivo" class='label_form'>Nombre del Dispositivo: </label>
                <input type="text" class="col-sm-2 col-form-label" id="input_form" name="nombreTipoDispositivo" placeholder="Nombre del Dispositivo" required>
            </div>                
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="descripcionTipoDispositivo" class='label_form'>Descripción del Dispositivo: </label>
                <textarea class="col-form-label" style="resize:none" name="descripcionTipoDispositivo" id="input_form" rows="2" cols="31" placeholder="Descripción" required></textarea>
            </div>                
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="marcaTipoDispositivo" class='label_form'>Marca del Dispositivo: </label>
                <input type="text" class="col-sm-2 col-form-label" id="input_form" name="marcaTipoDispositivo" placeholder="Marca del Dispositivo" required>
            </div>                
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="existenciaMinima" class='label_form'>Existencia mínima en Stock: </label>
                <input type="number" class="col-sm-2 col-form-label" id="input_form" name="existenciaMinima" placeholder="1" required>
            </div>          
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
        </div>     
        <div class="form-button" align="center" style="margin-bottom: 5rem;">
            <button type="submit" class="btn btn-primary boton-form" id="submit-button">Agregar</button>
        </div>
    </form>
</div>