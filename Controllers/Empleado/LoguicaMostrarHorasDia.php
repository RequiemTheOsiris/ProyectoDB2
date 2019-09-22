<?php

    require_once("../../Conexion.php");
    require_once("../../Models/Empleado/Empleado.php");
    require_once("../../Models/Empleado/BuscadorEmpleado.php");

    $CiEmpleado = $_REQUEST['txtCiEmpleado'];
    $FechaActual = $_REQUEST['txtFechaActual'];

    // echo $CiEmpleado,$FechaActual;

    $objtetoBuscadorEmpleado = new BuscadorEmpleado();
    $listaDeHorasPorDia = array();
    $listaDeHorasPorDia = $objtetoBuscadorEmpleado->listaDeHorasPorDia($CiEmpleado,$FechaActual);

    $jsonstring = json_encode($listaDeHorasPorDia);
    echo $jsonstring;

?>