<?php if ($msg != NULL){ ?>
    <div class="alert alert-info" role="alert">
        <h6 id = "alerta"><?php echo $msg; ?> </h6>
    </div>
<?php   }  ?>
<!-- Vista de Detalle de Tecnico -->
<div class="upside">
    <a href="index.php" class="Inicio">« Inicio</a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> DETALLES DE TECNICO </h2>
    </div>
    <?php
        foreach ($selectTecnico as $value) {    ?>
    <div class="card-body">      
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>Nombre completo: </strong> <?php echo $value->primerNombre; ?> <?php echo $value->segundoNombre; ?>
            <?php echo $value->primerApellido; ?> <?php echo $value->segundoApellido; ?></p>
                <div class="dropdown-divider"></div>
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>Teléfono: </strong> <?php echo $value->telefono; ?></p>
                    <div class="dropdown-divider"></div>
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>Correo electrónico: </strong> <?php echo $value->correoElectronico; ?></p>
                    <div class="dropdown-divider"></div>            
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong> Dirección: </strong><?php echo $value->direccion; ?></p>
                <div class="dropdown-divider"></div>    
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>Fecha de inclusión: </strong> <?php echo $value->fechaInclusion; ?></p>
                <div class="dropdown-divider"></div>
    </div>    
    <div class="card-dfooter">        
        <a href="?c=eliminarTecnico&idTecnico=<?php echo $value->idTecnico; ?>" class="card-link">Eliminar</a>
        <a href="?c=actualizarTecnico&idTecnico=<?php echo $value->idTecnico; ?>" class="card-link">Editar</a>
        <a href="?c=detalleAllTecnico" class="card-link">Volver</a>
    </div>
    <?php   }  ?>
</div>

