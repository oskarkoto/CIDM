<!-- Vista crear prestamos -->
<div class="upside">
    <a href="?c=detalleAllPrestamo" class="Inicio">« Regresar </a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> CREAR NUEVO PRESTAMO </h2>
    </div>
    <form method="POST" action="?c=crearPrestamo" class='formulario'>        
        <div class="form-group" align="center" >
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idPrestamo" class='label_form'>ID de Préstamo: </label>
                <?php foreach ($last as $id) { ?>
                <input type="number" class="col-sm-2 col-form-label" id="input_form" name="idPrestamo" value="<?php echo $id->idPrestamo+1; ?>" style="background-color:#f8f8f8; border-color: #d0d0d0" readonly>
                <?php } ?>
            </div>                
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idTecnico" class='label_form'>Técnico responsable:  </label>
                <select class="col-sm-2 col-form-label" name="idTecnico" id="input_form" required>
                <?php foreach ($allTecnico as $value) { ?>
                    <option value="<?php echo $value->idTecnico; ?>"><?php echo $value->primerNombre; ?> <?php echo $value->primerApellido; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="fechaPrestamo" class='label_form'>Fecha del Préstamo: </label>
                <input type="date" class="col-sm-2 col-form-label" name="fechaPrestamo" required>
            </div>
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="fechaEsperadaDevolucion" class='label_form'>Fecha de Devolución Esperada: </label>
                <input type="date" class="col-sm-2 col-form-label" name="fechaEsperadaDevolucion" required>
            </div>
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="cliente" class='label_form'>Nombre del cliente: </label>
                <input type="text" class="col-sm-2 col-form-label" id="input_form" name="cliente" placeholder="Nombre del cliente" required>
            </div>  
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
        </div>
        <div class="form-button" align="center" >
            <button type="submit" class="btn btn-primary boton-form" id="submit-button">Agregar</button>
        </div>
    </form>
</div>