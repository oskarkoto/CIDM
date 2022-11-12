<!-- Vista crear prestamos de Dispositivo-->
<div class="upside">
    <a href="?c=detalleAllPrestamoDispositivo" class="Inicio">« Regresar </a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> CREAR NUEVO PRESTAMO DE Dispositivo</h2>
    </div>
    <form method="POST" action="?c=crearPrestamoDispositivo" class='formulario'>        
        <div class="form-group" align="center" >
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idPrestamoDispositivo" class='label_form'>ID de Préstamo de Dispositivo: </label>
                <?php foreach ($last as $id) { ?>
                <input type="number" class="col-sm-2 col-form-label" id="input_form" name="idPrestamoDispositivo" value="<?php echo $id->idPrestamoDispositivo+1; ?>" style="background-color:#f8f8f8; border-color: #d0d0d0" readonly>
                <?php } ?>
            </div>                
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idPrestamo" class='label_form'>ID del Préstamo:  </label>
                <select class="col-sm-2 col-form-label" name="idPrestamo" id="input_form" required>
                <?php foreach ($allPrestamo as $value) { ?>
                    <option value="<?php echo $value->idPrestamo; ?>"><?php echo $value->idPrestamo; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idDispositivo" class='label_form'>Dispositivo:  </label>
                <select class="col-sm-2 col-form-label" name="idDispositivo" id="input_form" required>
                    <?php foreach ($allDispositivo as $Dispositivo) { foreach($allTipoDispositivo as $tipo) { if ($Dispositivo->idTipoDispositivo == $tipo->idTipoDispositivo && $Dispositivo->idEstadoInventario == 1) { ?>
                        <option value="<?php echo $Dispositivo->idDispositivo; ?>"> <?php echo $tipo->nombreTipoDispositivo; ?></option>
                    <?php } } } ?>
                </select>
            </div>
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idEstadoDevolucion" class='label_form'>Estado actual:  </label>
                <select class="col-sm-2 col-form-label" name="idEstadoDevolucion" id="input_form" required>
                <?php foreach ($allEstadoDevolucion as $value) { ?>
                    <option value="<?php echo $value->idEstadoDevolucion; ?>"><?php echo $value->descripcionEstadoDevolucion; ?></option>
                <?php } ?>
                </select>
            </div>            
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
        </div>
        <div class="form-button" align="center" >
            <button type="submit" class="btn btn-primary boton-form" id="submit-button">Agregar</button>
        </div>
    </form>
</div>