<?php if ($msg != NULL){ ?>
    <div class="alert alert-info" role="alert">
        <h6 id = "alerta"><?php echo $msg; ?> </h6>
    </div>
<?php } ?>    
<!-- Vista de Reporte Tipo 2 -->
<div class="upside">
    <a href="index.php" class="Inicio">« Inicio</a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> SUMINISTROS DAÑADOS </h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tipo de Suministro</th>
                <th scope="col">Condición Actual</th>
                <th scope="col">Estado en Inventario</th>
                <th scope="col">Fecha de Inclusión</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($resultsReporte as $value) {    
        ?>
            <tr>
                <td ><?php echo $value->idSuministro; ?></td>
                <td><?php echo $value->nombreTipoSuministro; ?></td>
                <td><?php echo $value->descripcionCondicionActual; ?></td>
                <td><?php echo $value->descripcionEstadoInventario; ?></td>
                <td><?php echo $value->fechaInclusion; ?></td>
                
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>