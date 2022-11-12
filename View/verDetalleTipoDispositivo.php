<?php if ($msg != NULL){ ?>
    <div class="alert alert-info" role="alert">
        <h6 id = "alerta"><?php echo $msg; ?> </h6>
    </div>
<?php   }  ?>
<!-- Vista de Detalle de Tipo de Dispositivo -->
<div class="upside">
    <a href="index.php" class="Inicio">« Inicio</a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> DETALLES DE TIPO DE Dispositivo </h2>
    </div>
    <?php
        foreach ($selectTipoDispositivo as $value) {    ?>
    <div class="card-body">      
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>Nombre: </strong> <?php echo $value->nombreTipoDispositivo; ?></p>
                <div class="dropdown-divider"></div>
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>Descripción: </strong> <?php echo $value->descripcionTipoDispositivo; ?></p>
                    <div class="dropdown-divider"></div>
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>Marca: </strong> <?php echo $value->marcaTipoDispositivo; ?></p>
                <div class="dropdown-divider"></div>                    
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong> Existencia mínima en inventario: </strong><?php echo $value->existenciaMinima; ?></p>
                <div class="dropdown-divider"></div>    
    </div>    
    <div class="card-dfooter">        
        <a href="?c=eliminarTipoDispositivo&idTipoDispositivo=<?php echo $value->idTipoDispositivo; ?>" class="card-link">Eliminar</a>
        <a href="?c=actualizarTipoDispositivo&idTipoDispositivo=<?php echo $value->idTipoDispositivo; ?>" class="card-link">Editar</a>
        <a href="?c=detalleAllTipoDispositivo" class="card-link">Volver</a>
    </div>
    <?php   }  ?>
</div>