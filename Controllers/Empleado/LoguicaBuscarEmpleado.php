<?php
    require_once("../../Conexion.php");
    require_once("../../Models/Empleado/Empleado.php");
    require_once("../../Models/Empleado/BuscadorEmpleado.php");

    $ApellidoPaterno = $_REQUEST['txtApellidoPaterno'];
    $ApellidoMaterno = $_REQUEST['txtApellidoMaterno'];
    $PrimerNombre = $_REQUEST['txtPrimerNombre'];
    $SegundoNombre = $_REQUEST['txtSegundoNombre'];

    // si el valor de search no esta basio//
    if(empty($ApellidoPaterno)) {
        $ApellidoPaterno = " ";
    }
    if(empty($ApellidoMaterno)) {
        $ApellidoMaterno = " ";
    }
    if(empty($PrimerNombre)) {
        $PrimerNombre = " ";
    }
    if(empty($SegundoNombre)) {
        $SegundoNombre = " ";
    }

    // echo $ApellidoPaterno,$ApellidoMaterno,$PrimerNombre,$SegundoNombre;

    $objtetoBuscadorEmpleado = new BuscadorEmpleado();
    $listaDeEmpleado = array();
    $listaDeEmpleado = $objtetoBuscadorEmpleado->BuscadorEmpleadoPorNombre($ApellidoPaterno,$ApellidoMaterno,$PrimerNombre,$SegundoNombre);

    $jsonstring = json_encode($listaDeEmpleado);
    echo $jsonstring;
?>