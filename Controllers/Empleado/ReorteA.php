<?php

    require_once("../../Conexion.php");
    require_once("../../Models/Empleado/Empleado.php");
    require_once("../../Models/Empleado/BuscadorEmpleado.php");


    $objtetoBuscadorEmpleado = new BuscadorEmpleado();
    $listaDeEmpleado = array();
    $listaDeEmpleado = $objtetoBuscadorEmpleado->ReporteA();

    $jsonstring = json_encode($listaDeEmpleado);
    echo $jsonstring;

?>