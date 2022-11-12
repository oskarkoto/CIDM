<!-- Vista crear devoluciones -->
<div class="upside">
    <a href="?c=detalleAllDevolucion" class="Inicio">« Regresar </a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> CREAR NUEVA DEVOLUCION </h2>
    </div>
    <form method="POST" action="?c=crearDevolucion" class='formulario'>        
        <div class="form-group" align="center" >
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idDevolucion" class='label_form'>ID de Devolución: </label>
                <?php foreach ($last as $id) { ?>
                <input type="number" class="col-sm-2 col-form-label" id="input_form" name="idDevolucion" value="<?php echo $id->idDevolucion+1; ?>" style="background-color:#f8f8f8; border-color: #d0d0d0" readonly>
                <?php } ?>
            </div>                
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idPrestamo" class='label_form'>ID de Préstamo:  </label>
                <select class="col-sm-2 col-form-label" name="idPrestamo" id="input_form">
                <?php foreach ($allPrestamo as $prestamo) { ?>
                    <option value="<?php echo $prestamo->idPrestamo; ?>"><?php echo $prestamo->idPrestamo; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="fechaRealDevolucion" class='label_form'>Fecha Real de Devolución: </label>
                <input type="date" class="col-sm-2 col-form-label" name="fechaRealDevolucion" required>
            </div>
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idEstadoDevolucionGeneral" class='label_form'>Estado de Devolución General:  </label>
                <select class="col-sm-2 col-form-label" name="idEstadoDevolucionGeneral" id="input_form">
                <?php foreach ($allEstadoDevGnrl as $value) { ?>
                    <option value="<?php echo $value->idEstadoDevolucionGeneral; ?>"><?php echo $value->descripcionEstadoDevolucionGeneral;?></option>
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