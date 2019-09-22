<?php

    require_once("../../Conexion.php");
    require_once("../../Models/Empleado/Empleado.php");
    require_once("../../Models/Empleado/BuscadorEmpleado.php");


    $objtetoBuscadorEmpleado = new BuscadorEmpleado();
    $listaDeEmpleado = array();
    // $listaDeEmpleado = $objtetoBuscadorEmpleado->ReporteD();

    $Anios = array('2017','2018','2019');
    $AnioABC = array('A','B','C');

    $ListaFinal = array();

    for ($i=0; $i < count($Anios); $i++) { 
        $listaDeEmpleado = $objtetoBuscadorEmpleado->ReporteD($Anios[$i]);
        foreach ($listaDeEmpleado as $Empleado) {
            $ListaFinal[0][$AnioABC[$i]."".$Empleado->getGenero()] =  $Empleado->getTotalHoras();
        }
    }

    $jsonstring = json_encode($ListaFinal);
    echo $jsonstring;

?>