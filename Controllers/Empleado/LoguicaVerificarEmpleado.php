<?php
 
require_once("../../Conexion.php");
require_once("../../Models/Empleado/Empleado.php");
require_once("../../Models/Empleado/BuscadorEmpleado.php");

$objtetoBuscadorEmpleado = new BuscadorEmpleado();
$objetoEmpleado = new Empleado();

// isset(), verifica si el valor de la variable NO es nulo
if(isset($_POST['usuario']) && isset($_POST['contrasenia'])){
        $usuario = $_POST['usuario'];
        //echo "usuario: ".$usuario;
        $contrasenia = $_POST['contrasenia'];

        $objetoEmpleado = $objtetoBuscadorEmpleado->devolverDatosDeEmpleadoPorLogin($usuario);
            //si hay registros a retornar
            if(!is_null($objetoEmpleado)){
                    
                    session_start();
                    $_SESSION['CiEmpleado'] = $objetoEmpleado->getCiEmpleado();
                    
                    if($objetoEmpleado->getCargo() == 1 &&  $objetoEmpleado->getContrasenia() == $contrasenia && $objetoEmpleado->getActivo() == true){

                            header('Location: ../../views/Empleado/index.php');
                            die();

                    }else{
                            if($objetoEmpleado->getCargo() == 2 && password_verify($contrasenia, $objetoEmpleado->getContrasenia()) && $objetoEmpleado->getActivo() == true){
                                //     echo "Usuario aSISTENCIA";
                                header('Location: ../../views/Empleado/index.php');
                                die();
                            }else{
                                    
                                echo '<script language="javascript"> alert("Usario o Contraseña incorrecto");</script>';
                            }
                    }
            }else{
                    echo "El usuario no existe";
            //echo '<script language="javascript"> alert("El usuario no existe"); </script>';
            }
        
}else{
echo "Llenar los campos";
}

?>