<!-- Vista crear Dispositivos -->
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> ACTUALIZAR DISPOSITIVO </h2>
    </div>
    <form method="POST" action="?c=actualizarCondDispositivo" class='formulario'>       
        <?php foreach ($selectDispositivo as $value) { ?> 
        <div class="form-group" align="center" >
        <div class="col-md-12 col-xl-12 col-sm-12" >
                <?php foreach ($last as $prestamo) { ?>
                <input type="hidden" class="col-sm-2 col-form-label" id="input_form" name="idPrestamo" value="<?php echo $prestamo->idPrestamo; ?>" style="background-color:#f8f8f8; border-color: #d0d0d0" readonly>
                <?php } ?>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idDispositivo" class='label_form'>ID del Dispositivo: </label>
                <input type="text" class="col-sm-2 col-form-label" id="input_form" name="idDispositivo" value="<?php echo $value->idDispositivo; ?>" style="background-color:#f8f8f8; border-color: #d0d0d0" readonly>
            </div>                
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idTipoDispositivo" class='label_form'>Tipo:  </label>
                <select class="col-sm-2 col-form-label" name="idTipoDispositivo" id="input_form" style="background-color:#f8f8f8; border-color: #d0d0d0" readonly>
                <?php foreach ($allTipoDispositivo as $tipo) { if ($value->idTipoDispositivo == $tipo->idTipoDispositivo) { ?>
                    <option value="<?php echo $tipo->idTipoDispositivo; ?>" selected><?php echo $tipo->nombreTipoDispositivo; ?></option>
                <?php } } ?>
                </select>
            </div>
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idCondicionActual" class='label_form'>Condición actual:  </label>
                <select class="col-sm-2 col-form-label" name="idCondicionActual" id="input_form" required>
                <?php foreach ($allCondicionActual as $condicion) { if ($value->idCondicionActual == $condicion->idCondicionActual) { ?>
                    <option value="<?php echo $condicion->idCondicionActual; ?>" selected><?php echo $condicion->descripcionCondicionActual; ?></option>
                <?php } else { ?>
                    <option value="<?php echo $condicion->idCondicionActual; ?>"><?php echo $condicion->descripcionCondicionActual; ?></option>
                <?php } } ?>
                </select>
            </div>
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idEstadoInventario" class='label_form'>Estado en inventario:  </label>
                <select class="col-sm-2 col-form-label" name="idEstadoInventario" id="input_form" required>
                <?php foreach ($allEstadoInventario as $inventario) { if ($inventario->idEstadoInventario == $value->idEstadoInventario) { ?>
                    <option value="<?php echo $inventario->idEstadoInventario; ?>" selected><?php echo $inventario->descripcionEstadoInventario; ?></option>    
                <?php } else { ?>
                    <option value="<?php echo $inventario->idEstadoInventario; ?>"><?php echo $inventario->descripcionEstadoInventario; ?></option>
                <?php } } ?>
                </select>
            </div>     
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
        </div>     
        <div class="form-button" align="center" style="margin-bottom: 5rem;">
            <button type="submit" class="btn btn-primary boton-form" id="submit-button"> Actualizar</button>
            <button type="submit" class="btn btn-primary boton-form" id="submit-button"> Regresar</button>
        </div>
    </form>
    <?php } ?>
</div>