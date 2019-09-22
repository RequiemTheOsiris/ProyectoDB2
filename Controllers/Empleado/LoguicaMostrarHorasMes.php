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
    $Mes = $_REQUEST['txtMes'];
    $FechaMes = $Mes."-02";
    // echo $FechasMes;
    $fecha = new DateTime($FechaMes);
    $fecha->modify('first day of this month');
    $FechaInicio = $fecha->format('Y/m/d');
    $anio = date("Y", strtotime($FechaInicio));
    $mes = date("m", strtotime($FechaInicio));
    $dia = date("d", strtotime($FechaInicio));
    $FechaInicio = $dia."-".$mes."-".$anio;
    // echo $fecha->format('Y/m/d'); // imprime por ejemplo: 01/12/2012
    // $fecha = new DateTime();
    // echo $FechaInicio;
    $fecha->modify('last day of this month');
    // echo $fecha->format('Y/m/d'); // imprime por ejemplo: 31/12/2012
    $FechaFin = $fecha->format('Y/m/d');
    $anio = date("Y", strtotime($FechaFin));
    $mes = date("m", strtotime($FechaFin));
    $dia = date("d", strtotime($FechaFin));
    $FechaFin = $dia."-".$mes."-".$anio;
    // $nombre =  get_nombre_dia($FechaFin);
    // echo $nombre;

    $FechasIni = array();
    $Contador = 0;
    for($i = strtotime($FechaInicio); $i <= strtotime($FechaFin); $i += 86400){
        $FechasIni[$Contador] = date("d-m-Y", $i);
        $Contador++;
    }
    // var_dump ($FechasIni);

    $FechasSalidaA = array();
    for($i=0; $i < count($FechasIni); $i++){ 
        $anio = date("Y", strtotime($FechasIni[$i]));
        $mes = date("m", strtotime($FechasIni[$i]));
        $dia = date("d", strtotime($FechasIni[$i]));
        $FechasSalidaA[$i] = $anio."-".$mes."-".$dia;
    }
    // var_dump ($FechasSalida);

    $FechasSalida = array();
    $Aux = 0;
    for($i=0; $i < count($FechasSalidaA); $i++){ 
        $diaAux =  get_nombre_dia($FechasSalidaA[$i]);
        if($diaAux == "Domingo" || $diaAux == "Sabado"){
            
        }else{
            $FechasSalida[$Aux] = $FechasSalidaA[$i];
            $Aux++;
        }
    }
    // var_dump ($FechasSalida);

    $Flexible = 0;
    $Flexible = $objtetoBuscadorEmpleado->HorarioFlexible($CiEmpleado);

    $listaDeHorasPorSemana = array();
    // $Dias = array('Lunes','Martes','Miercoles','Jueves','Viernes');
    $TotalHoras = 0;
    $Aux = 0;

    if($Flexible == 1){

        for($i=0; $i < count($FechasSalida); $i++){ 
            
            $TotalHorasPorDia = 0;
            $diaAux =  get_nombre_dia($FechasSalida[$i]);
            if($diaAux == "Lunes"){
                $TotalHorasPorDia = $objtetoBuscadorEmpleado->listaDeHorasPorDiaSemana($CiEmpleado,$FechasSalida[$i]);
                $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                if($TotalHorasPorDia == 0){
                    foreach ($listaDeVacacione as $Feriado) {
                        if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                            $listaDeHorasPorSemana[$Aux]["Lunes"] = $FechasSalida[$i]."<hr><b style='color: red;'>VACACION</b><hr><b>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }else{
                            $listaDeHorasPorSemana[$Aux]["Lunes"] = $FechasSalida[$i]."<hr><b style='color: red;'>FALTA</b><hr><b style='color: yellow;'>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }
                    }
                }else{
                    foreach ($listaDeFeriados as $Feriado) {
                        if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                            $listaDeHorasPorSemana[$Aux]["Lunes"] = $FechasSalida[$i]."<hr><b style='color: red;'>FERIADO</b><hr><b style='color: blue;'>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }else{
                            if($TotalHorasPorDia < 8){
                                $listaDeHorasPorSemana[$Aux]["Lunes"] = $FechasSalida[$i]."<hr><hr><b style='color: yellow;'>".$TotalHorasPorDia."</b>";
                                // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                            }else{
                                $listaDeHorasPorSemana[$Aux]["Lunes"] = $FechasSalida[$i]."<hr><hr>".$TotalHorasPorDia;
                                // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                            }
                        }
                    }
                }
            }
            if($diaAux == "Martes"){
                $TotalHorasPorDia = $objtetoBuscadorEmpleado->listaDeHorasPorDiaSemana($CiEmpleado,$FechasSalida[$i]);
                $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                if($TotalHorasPorDia == 0){
                    foreach ($listaDeVacacione as $Feriado) {
                        if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                            $listaDeHorasPorSemana[$Aux]["Martes"] = $FechasSalida[$i]."<hr><b style='color: red;'>VACACION</b><hr><b>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }else{
                            $listaDeHorasPorSemana[$Aux]["Martes"] = $FechasSalida[$i]."<hr><b style='color: red;'>FALTA</b><hr><b style='color: yellow;'>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }
                    }
                }else{
                    foreach ($listaDeFeriados as $Feriado) {
                        if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                            $listaDeHorasPorSemana[$Aux]["Martes"] = $FechasSalida[$i]."<hr><b style='color: red;'>FERIADO</b><hr><b style='color: blue;'>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }else{
                            if($TotalHorasPorDia < 8){
                                $listaDeHorasPorSemana[$Aux]["Martes"] = $FechasSalida[$i]."<hr><hr><b style='color: yellow;'>".$TotalHorasPorDia."</b>";
                                // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                            }else{
                                $listaDeHorasPorSemana[$Aux]["Martes"] = $FechasSalida[$i]."<hr><hr>".$TotalHorasPorDia;
                                // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                            }
                        }
                    }
                }
            }
            if($diaAux == "Miercoles"){
                $TotalHorasPorDia = $objtetoBuscadorEmpleado->listaDeHorasPorDiaSemana($CiEmpleado,$FechasSalida[$i]);
                $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                if($TotalHorasPorDia == 0){
                    foreach ($listaDeVacacione as $Feriado) {
                        if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                            $listaDeHorasPorSemana[$Aux]["Miercoles"] = $FechasSalida[$i]."<hr><b style='color: red;'>VACACION</b><hr><b>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }else{
                            $listaDeHorasPorSemana[$Aux]["Miercoles"] = $FechasSalida[$i]."<hr><b style='color: red;'>FALTA</b><hr><b style='color: yellow;'>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }
                    }
                }else{
                    foreach ($listaDeFeriados as $Feriado) {
                        if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                            $listaDeHorasPorSemana[$Aux]["Miercoles"] = $FechasSalida[$i]."<hr><b style='color: red;'>FERIADO</b><hr><b style='color: blue;'>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }else{
                            if($TotalHorasPorDia < 8){
                                $listaDeHorasPorSemana[$Aux]["Miercoles"] = $FechasSalida[$i]."<hr><hr><b style='color: yellow;'>".$TotalHorasPorDia."</b>";
                                // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                            }else{
                                $listaDeHorasPorSemana[$Aux]["Miercoles"] = $FechasSalida[$i]."<hr><hr>".$TotalHorasPorDia;
                                // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                            }
                        }
                    }
                }
            }
            if($diaAux == "Jueves"){
                $TotalHorasPorDia = $objtetoBuscadorEmpleado->listaDeHorasPorDiaSemana($CiEmpleado,$FechasSalida[$i]);
                $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                if($TotalHorasPorDia == 0){
                    foreach ($listaDeVacacione as $Feriado) {
                        if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                            $listaDeHorasPorSemana[$Aux]["Jueves"] = $FechasSalida[$i]."<hr><b style='color: red;'>VACACION</b><hr><b>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }else{
                            $listaDeHorasPorSemana[$Aux]["Jueves"] = $FechasSalida[$i]."<hr><b style='color: red;'>FALTA</b><hr><b style='color: yellow;'>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }
                    }
                }else{
                    foreach ($listaDeFeriados as $Feriado) {
                        if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                            $listaDeHorasPorSemana[$Aux]["Jueves"] = $FechasSalida[$i]."<hr><b style='color: red;'>FERIADO</b><hr><b style='color: blue;'>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }else{
                            if($TotalHorasPorDia < 8){
                                $listaDeHorasPorSemana[$Aux]["Jueves"] = $FechasSalida[$i]."<hr><hr><b style='color: yellow;'>".$TotalHorasPorDia."</b>";
                                // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                            }else{
                                $listaDeHorasPorSemana[$Aux]["Jueves"] = $FechasSalida[$i]."<hr><hr>".$TotalHorasPorDia;
                                // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                            }
                        }
                    }
                }
            }
            if($diaAux == "Viernes"){
                $TotalHorasPorDia = $objtetoBuscadorEmpleado->listaDeHorasPorDiaSemana($CiEmpleado,$FechasSalida[$i]);
                $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                $Aux++;
                if($TotalHoras < 40){
                    $listaDeHorasPorSemana[$Aux-1]['TotalHoras'] = "<b style='color: red;'>".$TotalHoras."<b>";
                    $TotalHoras = 0;
                }else{
                    $listaDeHorasPorSemana[$Aux-1]['TotalHoras'] = $TotalHoras;
                    $TotalHoras = 0;
                }
                if($TotalHorasPorDia == 0){
                    foreach ($listaDeVacacione as $Feriado) {
                        if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                            $listaDeHorasPorSemana[$Aux-1]["Viernes"] = $FechasSalida[$i]."<hr><b style='color: red;'>VACACION</b><hr><b>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }else{
                            $listaDeHorasPorSemana[$Aux-1]["Viernes"] = $FechasSalida[$i]."<hr><b style='color: red;'>FALTA</b><hr><b style='color: yellow;'>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }
                    }
                }else{
                    foreach ($listaDeFeriados as $Feriado) {
                        if($FechasSalida[$i] == $Feriado->getFechaFeriado()){
                            $listaDeHorasPorSemana[$Aux-1]["Viernes"] = $FechasSalida[$i]."<hr><b style='color: red;'>FERIADO</b><hr><b style='color: blue;'>".$TotalHorasPorDia."</b>";
                            // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                        }else{
                            if($TotalHorasPorDia < 8){
                                $listaDeHorasPorSemana[$Aux-1]["Viernes"] = $FechasSalida[$i]."<hr><hr><b style='color: yellow;'>".$TotalHorasPorDia."</b>";
                                // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                            }else{
                                $listaDeHorasPorSemana[$Aux-1]["Viernes"] = $FechasSalida[$i]."<hr><hr>".$TotalHorasPorDia;
                                // $TotalHoras = $TotalHoras + $TotalHorasPorDia;
                            }
                        }
                    }
                }
            }
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

    function get_nombre_dia($fecha){
        $fechats = strtotime($fecha); //pasamos a timestamp
     
        //el parametro w en la funcion date indica que queremos el dia de la semana
        //lo devuelve en numero 0 domingo, 1 lunes,....
        switch (date('w', $fechats)){
            case 0: return "Domingo"; break;
            case 1: return "Lunes"; break;
            case 2: return "Martes"; break;
            case 3: return "Miercoles"; break;
            case 4: return "Jueves"; break;
            case 5: return "Viernes"; break;
            case 6: return "Sabado"; break;
        }
    }

?>