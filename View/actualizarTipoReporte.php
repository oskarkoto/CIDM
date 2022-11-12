<!-- Vista actualizar Tipo de Reporte-->
<div class="upside">
    <a href="?c=detalleAllTipoReporte" class="Inicio">« Regresar </a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> ACTUALIZAR TIPO DE REPORTE</h2>
    </div>
    <form method="POST" action="?c=actualizarTipoReporte" class='formulario'>
        <?php 
            foreach ($selectTipoReporte as $value) { 
                ?>        
        <div class="form-group" align="center" >
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="idTipoReporte" class='label_form'>ID del Tipo de Reporte: </label>
                <input type="number" class="col-sm-2 col-form-label" id="input_form" name="idTipoReporte" value="<?php echo $value->idTipoReporte; ?>" readonly>
            </div>                
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="nombreTipoReporte" class='label_form'>Nombre del Tipo de Reporte: </label>
                <input type="text" class="col-sm-2 col-form-label" id="input_form" name="nombreTipoReporte" value="<?php echo $value->nombreTipoReporte; ?>" required>
            </div>      
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="detalleTipoReporte" class='label_form'>Detalle: </label>        
                <textarea class="col-sm-2 col-form-label" style="resize:none" name="detalleTipoReporte" id="input_form" rows="2" cols="5" required><?php echo $value->detalleTipoReporte; ?></textarea>
            </div>
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
            <div class="col-md-12 col-xl-12 col-sm-12" >
                <label for="queryTipoReporte" class='label_form'>Query: </label>
                <input type="text" class="col-sm-2 col-form-label" id="input_form" name="queryTipoReporte" value="<?php echo $value->queryTipoReporte; ?>" required>
            </div>
            <div class="dropdown-divider" id="dropdown-divider-form"></div>
        </div>
        <div class="form-button" align="center" >
            <button type="submit" class="btn btn-primary boton-form" id="submit-button">Actualizar</button>
        </div>
    </form>
    <?php } ?>
</div>