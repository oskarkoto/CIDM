<?php if ($msg != NULL){ ?>
    <div class="alert alert-info" role="alert">
        <h6 id = "alerta"><?php echo $msg; ?> </h6>
    </div>
<?php   }  ?>
<!-- Vista de Detalle de Devolucion -->
<div class="upside">
    <a href="index.php" class="Inicio">« Inicio</a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> DETALLES DE DEVOLUCION </h2>
    </div>
    <?php
        foreach ($selectDevolucion as $value) {    ?>
    <div class="card-body">      
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>ID: </strong> <?php echo $value->idDevolucion; ?></p>
                <div class="dropdown-divider"></div>
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>ID Préstamo: </strong> <?php echo $value->idPrestamo; ?></p>
                    <div class="dropdown-divider"></div>
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong> Fecha Real de Devolución: </strong><?php echo $value->fechaRealDevolucion; ?></p>
                <div class="dropdown-divider"></div>    
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>Estado de Devolución General: </strong> 
            <?php foreach ($allEstadoDevGnrl as $valor2) {  
                if ($value->idEstadoDevolucionGeneral == $valor2->idEstadoDevolucionGeneral) { ?>
                    <?php echo $valor2->descripcionEstadoDevolucionGeneral	; ?>
            <?php } } ?>
        </p>
                <div class="dropdown-divider"></div>
    </div>    
    
    <div class="card-dfooter">        
        <a href="?c=eliminarDevolucion&idDevolucion=<?php echo $value->idDevolucion; ?>" class="card-link">Eliminar</a>
        <a href="?c=detalleAllDevolucion" class="card-link">Volver</a>
    </div>
    <?php   }  ?>
</div>