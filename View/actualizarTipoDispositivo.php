<!-- Vista actualizar tipos de Dispositivo -->
<div class="upside">
    <a href="?c=detalleAllTipoDispositivo" class="Inicio">« Regresar </a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> ACTUALIZAR TIPO DE Dispositivo </h2>
    </div>
    <form method="POST" action="?c=actualizarTipoDispositivo" class='formulario'>        
        <?php foreach ($selectTipoDispositivo as $value) { ?>
            <div class="form-group" align="center" >
                <div class="col-md-12 col-xl-12 col-sm-12" style="margin-left: 5.5rem">
                    <label for="idTipoDispositivo" class='label_form'>ID del Tipo de Dispositivo: </label>
                    <input type="text" class="col-sm-2 col-form-label" id="input_form" name="idTipoDispositivo" value="<?php echo $value->idTipoDispositivo; ?>" style="background-color:#f8f8f8; border-color: #d0d0d0" readonly>
                    <strong>(No es posible cambiar)</strong>
                </div>                
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="nombreTipoDispositivo" class='label_form'>Nombre del Dispositivo: </label>
                    <input type="text" class="col-sm-2 col-form-label" id="input_form" name="nombreTipoDispositivo" value="<?php echo $value->nombreTipoDispositivo; ?>" required>
                </div>                
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="descripcionTipoDispositivo" class='label_form'>Descripción del Dispositivo: </label>
                    <textarea class="col-form-label" style="resize:none" name="descripcionTipoDispositivo" id="input_form" rows="2" cols="31" required><?php echo $value->descripcionTipoDispositivo; ?></textarea>
                </div>                
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="marcaTipoDispositivo" class='label_form'>Marca del Dispositivo: </label>
                    <input type="text" class="col-sm-2 col-form-label" id="input_form" name="marcaTipoDispositivo" value="<?php echo $value->marcaTipoDispositivo; ?>" required>
                </div>                
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="existenciaMinima" class='label_form'>Existencia mínima en Stock: </label>
                    <input type="number" class="col-sm-2 col-form-label" id="input_form" name="existenciaMinima" value="<?php echo $value->existenciaMinima; ?>" required>
                </div>          
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
            </div>     
            <div class="form-button" align="center" style="margin-bottom: 5rem;">
                <button type="submit" class="btn btn-primary boton-form" id="submit-button">Actualizar</button>
            </div>
    </form>
    <?php } ?>
</div>