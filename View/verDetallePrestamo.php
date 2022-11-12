<?php if ($msg != NULL){ ?>
    <div class="alert alert-info" role="alert">
        <h6 id = "alerta"><?php echo $msg; ?> </h6>
    </div>
<?php   }  ?>
<!-- Vista de Detalle de Prestamo -->
<div class="upside">
    <a href="index.php" class="Inicio">« Inicio</a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> DETALLES DE PRESTAMO </h2>
    </div>
    <?php
        foreach ($selectPrestamo as $value) {    ?>
    <div class="card-body">      
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>ID: </strong> <?php echo $value->idPrestamo; ?></p>
                <div class="dropdown-divider"></div>
        <p class="card-subtitle mb-2" id="card-subtitle">
        <strong>Técnico: </strong>
        <?php foreach ($allTecnico as $tecnico) { if ($tecnico->idTecnico == $value->idTecnico){ ?>
             <?php echo $tecnico->primerNombre; ?> <?php echo $tecnico->primerApellido; ?></p>
        <?php } } ?>
                <div class="dropdown-divider"></div>
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong> Fecha del préstamo: </strong><?php echo $value->fechaPrestamo; ?></p>
                <div class="dropdown-divider"></div>    
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>Fecha esperada de devolución: </strong> <?php echo $value->fechaEsperadaDevolucion; ?></p>
                <div class="dropdown-divider"></div>
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>Cliente: </strong> <?php echo $value->cliente; ?></p>
                <div class="dropdown-divider"></div>
    </div>    
    <div class="card-dfooter">
        <a href="?c=eliminarPrestamo&idPrestamo=<?php echo $value->idPrestamo; ?>" class="card-link">Eliminar</a>
        <a href="?c=detalleAllPrestamo" class="card-link">Volver</a>   
    </div>
    <?php   }  ?>
</div>