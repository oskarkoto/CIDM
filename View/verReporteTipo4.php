<?php if ($msg != NULL){ ?>
    <div class="alert alert-info" role="alert">
        <h6 id = "alerta"><?php echo $msg; ?> </h6>
    </div>
<?php } ?>    
<!-- Vista de Reporte Tipo 4 -->
<div class="upside">
    <a href="index.php" class="Inicio">« Inicio</a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> INFORME DE TECNICO - PRESTAMOS - DAÑOS </h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID del Préstamo</th>
                <th scope="col">ID del Técnico</th>
                <th scope="col">Primer Nombre</th>
                <th scope="col">Segundo Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($resultsReporte as $value) {    
        ?>
            <tr>
                <td ><?php echo $value->idPrestamo; ?></td>
                <td><?php echo $value->idTecnico; ?></td>
                <td><?php echo $value->primerNombre; ?></td>
                <td><?php echo $value->segundoNombre; ?></td>
                <td><?php echo $value->primerApellido; ?></td>
                <td><?php echo $value->segundoApellido; ?></td>
                <td><?php echo $value->telefono; ?></td>
                <td><?php echo $value->correoElectronico; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>