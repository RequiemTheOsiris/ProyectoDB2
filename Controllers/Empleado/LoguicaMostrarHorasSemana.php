<?php

    require_once("../../Conexion.php");
    require_once("../../Models/Empleado/Empleado.php");
    require_once("../../Models/Empleado/BuscadorEmpleado.php");
    require_once("../../Models/Feriado/Feriado.php");
    require_once("../../Models/Feriado/BuscadorFeriado.php");

    
    $objtetoEmpleado = new Empleado();
    $objtetoBuscadorEmpleado = new BuscadorEmpleado();

    $objtetoFeriado = new Feriado();
    $objtetoBuscadorFeriado = new BuscadorFeriado();

    $listaDeFeriados = array();
    $listaDeFeriados = $objtetoBuscadorFeriado->listaDeFeriados();

    $listaDeVacacione = array();
    $listaDeVacacione = $objtetoBuscadorFeriado->listaDeVacaciones();

    $CiEmpleado = $_REQUEST['txtCiEmpleado'];
    $FechaInicio = strtotime($_REQUEST['txtFechaInicio']);
    $FechaFin = strtotime($_REQUEST['txtFechaFin']);

    $Cargo = "";
    $Cargo = $objtetoBuscadorEmpleado->Cargo($CiEmpleado);
    // echo $FechaInicio,$FechaFin;
    $HorasMinimas = 0;
    $HorasMinimasTotal = 0;
    if($Cargo == "Seguridad"){
        $HorasMinimas = 12;
        $HorasMinimasTotal = 72;
    }else{
        $HorasMinimas = 8; 
        $HorasMinimasTotal = 40;
    }

    // echo $CiEmpleado;
    // Calculamos Todas las fechas
    $FechasIni = array();
    $Contador=0;
    for($i=$FechaInicio; $i<=$FechaFin; $i+=86400){
        $FechasIni[$Contador] = date("d-m-Y", $i);
        $Contador++;
    }
    // var_dump ($FechasIni);
    
    // Hordenamos Todas las fechas
    $FechasSalida = array();
    for($i=0; $i < count($FechasIni); $i++){ 
        $anio = date("Y", strtotime($FechasIni[$i]));
        $mes = date("m", strtotime($FechasIni[$i]));
        $dia = date("d", strtotime($FechasIni[$i]));
        $FechasSalida[$i] = $anio."-".$mes."-".$dia;
    }
    // var_dump ($FechasSalida);

    $Flexible = 0;
    $Flexible = $objtetoBuscadorEmpleado->HorarioFlexible($CiEmpleado);
    // echo $Flexible;

    $listaDeHorasPorSemana = array();
    $Dias = array('Lunes','Martes','Miercoles','Jueves','Viernes');
    $TotalHoras = 0;

    if($Flexible == 1){

        for($i=0; $i < count($FechasSalida); $i++){ 
            $TotalHorasPorDia = 0;
            $TotalHorasPorDia = $objtetoBuscadorEmpleado->listaDeHorasPorDiaSemana($CiEmpleado,$FechasSalida[$i]);
            $TotalHoras = $TotalHoras + $TotalHorasPorDia;
            if($TotalHorasPorDia == 0){
                foreach ($listaDeVacacione as $Feriado) {
                    if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                        $listaDeHorasPorSemana[0][$Dias[$i]] = $FechasSalida[$i]."<hr><b style='color: red;'>VACACION</b><hr><b>".$TotalHorasPorDia."</b>";
                        // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                    }else{
                        $listaDeHorasPorSemana[0][$Dias[$i]] = $FechasSalida[$i]."<hr><b style='color: red;'>FALTA</b><hr><b style='color: yellow;'>".$TotalHorasPorDia."</b>";
                        // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                    }
                }
            }else{
                foreach ($listaDeFeriados as $Feriado) {
                    if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                        $listaDeHorasPorSemana[0][$Dias[$i]] = $FechasSalida[$i]."<hr><b style='color: red;'>FERIADO</b><hr><b style='color: blue;'>".$TotalHorasPorDia."</b>";
                        // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                    }else{
                        if($TotalHorasPorDia < 8){
                            $listaDeHorasPorSemana[0][$Dias[$i]] = $FechasSalida[$i]."<hr><hr><b style='color: yellow;'>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }else{
                            $listaDeHorasPorSemana[0][$Dias[$i]] = $FechasSalida[$i]."<hr><hr>".$TotalHorasPorDia;
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }
                    }
                }
            }
        }
        if($TotalHoras < 40){
            $listaDeHorasPorSemana[0]['TotalHoras'] = "<b style='color: red;'>".$TotalHoras."<b>";
        }else{
            $listaDeHorasPorSemana[0]['TotalHoras'] = $TotalHoras;
        }
    }else{
        
        $listaDeHorasPorDiaConsulta = array();

        for($i=0; $i < count($FechasSalida); $i++){ 
            $listaDeHorasPorDiaConsulta = $objtetoBuscadorEmpleado->listaDeHorasPorSemana($CiEmpleado,$FechasSalida[$i]);
            if($listaDeHorasPorDiaConsulta == null){
                foreach ($listaDeVacacione as $Feriado) {
                    if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                        // foreach ($listaDeHorasPorDiaConsulta as $Empleado) {
                            $listaDeHorasPorSemana[0][$Dias[$i]] = "<hr><b style='color: red;'>VACACION</b><hr>";
                        // }
                    }else{
                        // foreach ($listaDeHorasPorDiaConsulta as $Empleado) {
                            $listaDeHorasPorSemana[0][$Dias[$i]] = "<hr><b style='color: red;'>FALTA</b><hr>";
                        // }
                    }
                }
            }else{
                $HorasDia = array();
                 foreach ($listaDeFeriados as $Feriado) {
                    if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                        $j = 0;
                        foreach ($listaDeHorasPorDiaConsulta as $Empleado) {
                            if($Empleado->getCargo() == 1){
                                $HorasDia[$j] = "<b style='color: red;'>".$Empleado->getHoraIngreso()."-".$Empleado->getHoraSalida()."</b><hr>";
                                $HorasDia[2] = "<b style='color: red;'>FERIADO</b><hr>".$Empleado->getTotalHoras();
                                // $TotalHoras = $TotalHoras + $Empleado->getTotalHoras();
                                $j++;
                            }
                            else{
                                $HorasDia[$j] = $Empleado->getHoraIngreso()."-".$Empleado->getHoraSalida()."</b><hr>";
                                $HorasDia[2] = "<b style='color: red;'>FERIADO</b><hr>".$Empleado->getTotalHoras();
                                // $TotalHoras = $TotalHoras + $Empleado->getTotalHoras();
                                $j++;
                                // $listaDeHorasPorSemana[0][$Dias[$i]] = $Empleado->getHoraIngreso()."-".$Empleado->getHoraSalida()."<hr><b style='color: red;'>FERIADO</b><hr>".$Empleado->getTotalHoras();
                            }
                        }
                        // $listaDeHorasPorSemana[0][$Dias[$i]] = "<b style='color: red;'>".$Empleado->getHoraIngreso()."-".$Empleado->getHoraSalida()."</b><hr><b style='color: red;'>FERIADO</b><hr>".$Empleado->getTotalHoras(); 
                        if($j == 2){
                            $listaDeHorasPorSemana[0][$Dias[$i]] = $HorasDia[0].$HorasDia[1].$HorasDia[2];
                        }else{
                            $listaDeHorasPorSemana[0][$Dias[$i]] = $HorasDia[0].$HorasDia[2];
                        }
                    }else{
                        $j = 0;
                        foreach ($listaDeHorasPorDiaConsulta as $Empleado) {
                            if($Empleado->getCargo() == 1){
                                $HorasDia[$j] = "<b style='color: red;'>".$Empleado->getHoraIngreso()."-".$Empleado->getHoraSalida()."</b><hr>";
                                if($Empleado->getTotalHoras() < $HorasMinimas){
                                    $HorasDia[2] = "<b style='color: yellow;'>".$Empleado->getTotalHoras()."</b>";
                                }else{
                                    $HorasDia[2] = $Empleado->getTotalHoras();
                                }
                                $j++;
                                // $listaDeHorasPorSemana[0][$Dias[$i]] = "<b style='color: red;'>".$Empleado->getHoraIngreso()."-".$Empleado->getHoraSalida()."</b><hr><hr>".$Empleado->getTotalHoras();
                            }else{
                                $HorasDia[$j] = $Empleado->getHoraIngreso()."-".$Empleado->getHoraSalida()."</b><hr>";
                                if($Empleado->getTotalHoras() < $HorasMinimas){
                                    $HorasDia[2] = "<b style='color: yellow;'>".$Empleado->getTotalHoras()."</b>";
                                }else{
                                    $HorasDia[2] = $Empleado->getTotalHoras();
                                }
                                // $HorasDia[2] = $Empleado->getTotalHoras();
                                $j++;
                                // $listaDeHorasPorSemana[0][$Dias[$i]] = $Empleado->getHoraIngreso()."-".$Empleado->getHoraSalida()."<hr><hr>".$Empleado->getTotalHoras();
                            }
                        }
                        if($j == 2){
                            $listaDeHorasPorSemana[0][$Dias[$i]] = $HorasDia[0].$HorasDia[1].$HorasDia[2];
                        }else{
                            $listaDeHorasPorSemana[0][$Dias[$i]] = $HorasDia[0].$HorasDia[2];
                        }
                    }                  
                }
            }
            foreach ($listaDeHorasPorDiaConsulta as $Empleado) {
                $TotalHoras = $TotalHoras + $Empleado->getTotalHoras();
            }
        }
        if($Cargo == "Contador"){
            $TotalHoras = $TotalHoras/2;
        }
        if($TotalHoras < $HorasMinimasTotal){
            $listaDeHorasPorSemana[0]['TotalHoras'] = "<b style='color: red;'>".$TotalHoras."</b>";
        }else{
            $listaDeHorasPorSemana[0]['TotalHoras'] = $TotalHoras;
        }
    }

    $jsonstring = json_encode($listaDeHorasPorSemana);
    echo $jsonstring;

?>