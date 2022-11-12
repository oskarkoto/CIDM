<?php if ($msg != NULL){ ?>
    <div class="alert alert-info" role="alert">
        <h6 id = "alerta"><?php echo $msg; ?> </h6>
    </div>
<?php } ?>    
<!-- Vista de Reporte Tipo 3 -->
<div class="upside">
    <a href="index.php" class="Inicio">« Inicio</a>
</div>
<div class="card" id="ListaCompleta">
    <div class="card-title">
        <h2> PRESTAMOS ATRASADOS </h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID del Préstamo</th>
                <th scope="col">ID del Técnico</th>
                <th scope="col">Fecha del Préstamo</th>
                <th scope="col">Fecha Esperada de Devolución</th>
                <th scope="col">Cliente</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($resultsReporte as $value) {    
        ?>
            <tr>
                <td ><?php echo $value->idPrestamo; ?></td>
                <td><?php echo $value->idTecnico; ?></td>
                <td><?php echo $value->fechaPrestamo; ?></td>
                <td><?php echo $value->fechaEsperadaDevolucion; ?></td>
                <td><?php echo $value->cliente; ?></td>
                
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>