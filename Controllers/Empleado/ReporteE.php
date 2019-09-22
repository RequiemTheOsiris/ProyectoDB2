<?php

    require_once("../../Conexion.php");
    require_once("../../Models/Empleado/Empleado.php");
    require_once("../../Models/Empleado/BuscadorEmpleado.php");


    $objtetoBuscadorEmpleado = new BuscadorEmpleado();
    $listaDeEmpleado = array();
    $listaDeEmpleado = $objtetoBuscadorEmpleado->ReporteE();
    
    $EstadoABC = array('S','C','D','V');
    $ListaFinal = array();

    foreach ($listaDeEmpleado as $Empleado) {
        $ListaFinal[0][$Empleado->getEstdoCivil()] =  $Empleado->getTotalHoras();
    }

    $jsonstring = json_encode($ListaFinal);
    echo $jsonstring;

?>