<?php if ($msg != NULL){ ?>
    <div class="alert alert-info" role="alert">
        <h6 id = "alerta"><?php echo $msg; ?> </h6>
    </div>
<?php   }  ?>
<!-- Vista de Detalle de Prestamo de Dispositivo -->
<div class="upside">
    <a href="index.php" class="Inicio">« Inicio</a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> DETALLES DE PRESTAMO DE Dispositivo </h2>
    </div>
    <?php
        foreach ($selectPrestamoDispositivo as $value) {    ?>
    <div class="card-body">      
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>ID: </strong> <?php echo $value->idPrestamoDispositivo; ?></p>
                <div class="dropdown-divider"></div>
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>ID del Préstamo: </strong> <?php echo $value->idPrestamo; ?></p>
                    <div class="dropdown-divider"></div>
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong> Dispositivo: </strong>
            <?php foreach ($allDispositivo as $Dispositivo) { foreach($allTipoDispositivo as $tipo) { if ($value->idDispositivo == $Dispositivo->idDispositivo && $Dispositivo->idTipoDispositivo == $tipo->idTipoDispositivo) {?>
                <?php echo $tipo->nombreTipoDispositivo; ?>
            <?php } } } ?> </p>
                <div class="dropdown-divider"></div>    
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>Estado de devolución: </strong> 
            <?php foreach ($allEstadoDevolucion as $estado) { if ($value->idEstadoDevolucion  == $estado->idEstadoDevolucion) {?>
                <?php echo $estado->descripcionEstadoDevolucion; ?>
                <?php } } ?>
        </p>
                <div class="dropdown-divider"></div>
    </div>    
    <div class="card-dfooter">
        <a href="?c=eliminarPrestamoDispositivo&idPrestamoDispositivo=<?php echo $value->idPrestamoDispositivo; ?>" class="card-link">Eliminar</a>
        <a href="?c=detalleAllPrestamoDispositivo" class="card-link">Volver</a>   
    </div>
    <?php   }  ?>
</div>

