<?php
	class ManejadorEmpleado 
	{
		private $Conexion;

		function __construct()
		{
			$this->Conexion =  new Conexion();
		}

		// public function registrarEmpleado(Empleado $objetoEmpleado)
		public function registrarEmpleado()
		{
            // $PrimerNombre = $objetoEstudiante->getPrimerNombre();
            // $SegundoNombre = $objetoEstudiante->getSegundoNombre();
            // $ApellidoPaterno = $objetoEstudiante->getApellidoPaterno();
            // $ApellidoMaterno = $objetoEstudiante->getApellidoMaterno();
            // $CiEstudiante = $objetoEstudiante->getCi();
            // $FechaNacimiento = $objetoEstudiante->getFechaNacimiento();
            // $Genero = $objetoEstudiante->getGenero();  
            // $Direccion = $objetoEstudiante->getDireccion();
            // $Fotografia = $objetoEstudiante->getFotografia();
            // $FotoCarnetAmverso = $objetoEstudiante->getFotoCarnetAmverso();  
            // $FotoCarnetReverso = $objetoEstudiante->getFotoCarnetReverso();  
            // $Activo = $objetoEstudiante->getActivo();  

            // $CiTutor = $objetoEstudiante->getCiTutor();
            // $PrimerNombreTutor = $objetoEstudiante->getPrimerNombreTutor();
            // $SegundoNombreTutor = $objetoEstudiante->getSegundoNombreTutor();
            // $ApellidoPaternoTutor = $objetoEstudiante->getApellidoPaternoTutor();
            // $ApelldioMaternoTutor = $objetoEstudiante->getApellidoMaternoTutor();
            // $DireccionTutor = $objetoEstudiante->getDireccionTutor();
            // $CelularTutor = $objetoEstudiante->getNumeroCelularTutor();
            // $FotoTutor = $objetoEstudiante->getFotoTutor();
            // $TipoTutor = $objetoEstudiante->getTipoTutor();
                        
            // echo $CiEstudiante."#".$FechaNacimiento."#".$Genero.$Direccion.$Fotografia.$FotoCarnetAmverso.$FotoCarnetReverso.$Activo."///";
            
            $Contrasenia = "321";
            $pass_cifrado = password_hash($Contrasenia, PASSWORD_DEFAULT);

            $sqlInsertarEstudiante = "INSERT INTO Empleado
                (CiEmpleado,PrimerNombre,SegundoNombre,ApellidoPaterno,ApellidoMaterno,FechaNacimiento,Genero,EstdoCivil,Activo,NumeroCelular,Fotografia,Usuario,Contrasenia)
                VALUES
                ('321','Maria','','Fernadez','Apaza','2000-10-19','F','Divorciado',1,60771615,'Foto','Maria321','$pass_cifrado'); ";
            try{
                $cmd = $this->Conexion->prepare($sqlInsertarEstudiante);
                $cmd->execute();
                return 1;
            }catch(PDOException $e){
                echo 'ERROR: No se logro realizar la nueva inserción - '.$e->getMesage();
                exit();
                return 0;
            }
        }//end function
    }
?>
