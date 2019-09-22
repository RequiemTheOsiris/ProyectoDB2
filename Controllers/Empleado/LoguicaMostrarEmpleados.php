<?php

    require_once("../../Conexion.php");
    require_once("../../Models/Empleado/Empleado.php");
    require_once("../../Models/Empleado/BuscadorEmpleado.php");
    require_once("../../Models/Empleado/ManejadorEmpleado.php");


    $objtetoBuscadorEmpleado = new BuscadorEmpleado();
    $listaDeEmpleado = array();
    $listaDeEmpleado = $objtetoBuscadorEmpleado->listaDeEmpleado();
    
    $objtetoManejadorEmpleado = new ManejadorEmpleado();
    $daniel = $objtetoManejadorEmpleado->registrarEmpleado();

    $jsonstring = json_encode($listaDeEmpleado);
    echo $jsonstring;

?>