<?php if ($msg != NULL){ ?>
    <div class="alert alert-info" role="alert">
        <h6 id = "alerta"><?php echo $msg; ?> </h6>
    </div>
<?php   }  ?>
<!-- Vista de Detalle de Reporte -->
<div class="upside">
    <a href="index.php" class="Inicio">« Inicio</a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> DETALLES DE REPORTE </h2>
    </div>
    <?php foreach ($selectReporte as $value) {    ?>
    <div class="card-body">      
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>Título: </strong> <?php echo $value->tituloReporte; ?></p>
                <div class="dropdown-divider"></div>
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong> Tipo de reporte: </strong>
            <?php foreach ($allTipoReporte as $tiporeporte) { if ($value->idTipoReporte  == $tiporeporte->idTipoReporte) {?>
                <td><?php echo $tiporeporte->nombreTipoReporte; ?></td>
            <?php } }  ?>
        </p>
                <div class="dropdown-divider"></div>    
        <p class="card-subtitle mb-2" id="card-subtitle">
            <strong>Fecha: </strong> <?php echo $value->fechaReporte; ?></p>
                <div class="dropdown-divider"></div>
    </div>    
    <div class="card-dfooter">        
        <a href="?c=detalleAllReporte" class="card-link">Volver</a>
    </div>
    <?php   }  ?>
</div>