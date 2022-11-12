<!--Controlador para detallar todos los Prestamos de Dispositivo.-->
<?php
include 'model/PrestamoDispositivo.php';

        $prestamoDispositivo = new PrestamoDispositivo();
        $allPrestamoDispositivo = $prestamoDispositivo->seleccionarAllPrestamoDispositivo();
        //Select Dispositivo
        $Dispositivo = new Dispositivo();
        $allDispositivo = $Dispositivo->seleccionarAllDispositivo();
        //Select Estado de Devolucion
        $EstadoDevolucion = new EstadoDevolucion();
        $allEstadoDevolucion = $EstadoDevolucion->seleccionarAllEstadoDevolucion();
        //Select Tipo Dispositivo
        $TipoDispositivo = new TipoDispositivo();
        $allTipoDispositivo = $TipoDispositivo->seleccionarAllTipoDispositivo();
        $msg = NULL;
        include 'view/verAllPrestamoDispositivo.php';