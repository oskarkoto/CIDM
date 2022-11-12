<!-- Vista crear tecnicos -->
<div class="upside">
    <a href="?c=detalleAllTecnico" class="Inicio">« Regresar </a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> CREAR NUEVO TECNICO </h2>
    </div>
    <form method="POST" action="?c=crearTecnico" class='formulario'>
        <div class="row" style="margin-left: 2.5rem;">        
            <div class="col-md-6 col-xl-6 col-sm-12" >
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="idTecnico" class='label_form'>ID de Técnico: </label>
                    <?php foreach ($last as $id) { ?>
                <input type="number" class="col-sm-2 col-form-label" id="input_form" name="idTecnico" value="<?php echo $id->idTecnico+1; ?>" style="background-color:#f8f8f8; border-color: #d0d0d0" readonly>
                <?php } ?>
                </div> 
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="primerNombre" class='label_form'>Primer nombre: </label>
                    <input type="text" class="col-form-label" id="input_form" name="primerNombre" placeholder="Primer Nombre" required>
                </div>        
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="segundoNombre" class='label_form'>Segundo nombre: </label>
                    <input type="text" class="col-form-label" id="input_form" name="segundoNombre" placeholder="Segundo Nombre">
                </div>          
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="primerApellido" class='label_form'>Primer apellido: </label>
                    <input type="text" class="col-form-label" id="input_form" name="primerApellido" placeholder="Primer Apellido" required>
                </div>  
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="segundoApellido" class='label_form'>Segundo apellido: </label>
                    <input type="text" class="col-form-label" id="input_form" name="segundoApellido" placeholder="Segundo Apellido" required>
                </div>
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
            </div>
            <div class="col-md-6 col-xl-6 col-sm-12">            
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="telefono" class='label_form'>Teléfono: </label>
                    <input type="text" class="col-form-label" id="input_form" name="telefono" placeholder="8888 8888" required>
                </div>
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="correoElectronico" class='label_form'>Correo electrónico: </label>
                    <input type="text" class="col-form-label" id="input_form" name="correoElectronico" placeholder="Correo Electrónico" required>
                </div>
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="direccion" class='label_form'>Dirección: </label>
                    <textarea class="col-form-label" style="resize:none" name="direccion" id="input_form" rows="2" cols="22" placeholder="Dirección" required></textarea>
                </div>
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
                <div class="col-md-12 col-xl-12 col-sm-12" >
                    <label for="fechaInclusion" class='label_form'>Fecha de Inclusión: </label>
                    <input type="date" class="col-form-label" id="input_form" name="fechaInclusion" required>
                </div>
                <br>
                <div class="dropdown-divider" id="dropdown-divider-form"></div>
            </div>     
        </div>    
        <div class="form-button" align="center" style="margin-bottom: 5rem;">
            <button type="submit" class="btn btn-primary boton-form" id="submit-button">Agregar</button>
        </div>
    </form>
</div>