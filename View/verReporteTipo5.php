<?php if ($msg != NULL){ ?>
    <div class="alert alert-info" role="alert">
        <h6 id = "alerta"><?php echo $msg; ?> </h6>
    </div>
<?php } ?>    
<!-- Vista de Reporte Tipo 6 -->
<div class="upside">
    <a href="index.php" class="Inicio">« Inicio</a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> DispositivoS CON INVENTARIO BAJO </h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID del Tipo de Dispositivo</th>
                <th scope="col">Tipo de Dispositivo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Marca</th>
                <th scope="col">Existencia Mínima</th>
                <th scope="col">Existencia Actual</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($resultsReporte as $value) {    
        ?>
            <tr>
                <td ><?php echo $value->idTipoDispositivo; ?></td>
                <td><?php echo $value->nombreTipoDispositivo; ?></td>
                <td><?php echo $value->descripcionTipoDispositivo; ?></td>
                <td><?php echo $value->marcaTipoDispositivo; ?></td>
                <td><?php echo $value->existenciaMinima; ?></td>
                <td><?php echo $value->existenciaActual; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>