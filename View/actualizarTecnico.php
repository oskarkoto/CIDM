<!-- Vista actualizar tecnicos -->
<div class="upside">
    <a href="?c=detalleAllTecnico" class="Inicio">« Regresar </a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> ACTUALIZAR TECNICO </h2>
    </div>
    <form method="POST" action="?c=actualizarTecnico" class='formulario'>
    <?php foreach ($selectTecnico as $value) { ?>    
        <div class="row" style="margin-left: 2.5rem;">        
            <div class="col-md-6 col-xl-6 col-sm-12" >
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="idTecnico" class='label_form'>ID de Técnico:</label>
                    <input type="text" class="col-form-label" id="input_form" name="idTecnico" value="<?php echo $value->idTecnico; ?>" style="background-color:#f8f8f8; border-color: #d0d0d0" readonly> 
                    <strong>(No es posible cambiar)</strong>
                </div>    
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="primerNombre" class='label_form'>Primer nombre: </label>
                    <input type="text" class="col-form-label" id="input_form" name="primerNombre" value="<?php echo $value->primerNombre; ?>" required>
                </div>        
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="segundoNombre" class='label_form'>Segundo nombre: </label>
                    <input type="text" class="col-form-label" id="input_form" name="segundoNombre" value="<?php echo $value->segundoNombre; ?>" >
                </div>          
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="primerApellido" class='label_form'>Primer apellido: </label>
                    <input type="text" class="col-form-label" id="input_form" name="primerApellido" value="<?php echo $value->primerApellido; ?>" required>
                </div>  
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="segundoApellido" class='label_form'>Segundo apellido: </label>
                    <input type="text" class="col-form-label" id="input_form" name="segundoApellido" value="<?php echo $value->segundoApellido; ?>" required>
                </div>
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="telefono" class='label_form'>Teléfono: </label>
                    <input type="text" class="col-form-label" id="input_form" name="telefono" value="<?php echo $value->telefono; ?>" required>
                </div>
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
            </div>
            <div class="col-md-6 col-xl-6 col-sm-12">                       
            <br>
            <br>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="correoElectronico" class='label_form'>Correo electrónico: </label>
                    <input type="text" class="col-form-label" id="input_form" name="correoElectronico" value="<?php echo $value->correoElectronico; ?>" required>
                </div>
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="direccion" class='label_form'>Dirección: </label>
                    <textarea class="col-form-label" style="resize:none" name="direccion" id="input_form" rows="2" cols="22" required><?php echo $value->direccion; ?></textarea>
                </div>
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="fechaInclusion" class='label_form'>Fecha de Inclusión: </label>
                    <input type="date" class="col-form-label" id="input_form" name="fechaInclusion" value="<?php echo $value->fechaInclusion; ?>" required>
                </div>
                <br>
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
            </div>     
        </div>    
        <div class="form-button" align="center" style="margin-bottom: 5rem;">
            <button type="submit" class="btn btn-primary boton-form" id="submit-button">Actualizar</button>
        </div>
    </form>
    <?php } ?>
</div>