<?php

class BuscadorEmpleado
{
	private $conexion;

	function __construct()
	{
		$this->conexion =  new Conexion();
	}

	public function devolverDatosDeEmpleadoPorLogin($usuario){
		$objEmpleado = new Empleado();

		$sqlListaEmpleado = "SELECT e.CiEmpleado, CONCAT(e.primerNombre,' ',e.segundoNombre,' ',e.apellidoPaterno,' ',e.apellidoMaterno) as NombreEmpleado, c.IdCargo, e.Usuario, e.contrasenia, e.activo 
		fROM Empleado e JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
		AND e.Usuario = '$usuario'
		JOIN Cargo c ON ec.IdCargo=c.IdCargo; ";
		$cmd = $this->conexion->prepare($sqlListaEmpleado);
		$cmd->execute();
		$listaDeEmpleadoDeLaConsulta = $cmd->fetch();
		
		//verificar si hay datos y cargarlos
		if($listaDeEmpleadoDeLaConsulta){
				$objEmpleado->setCiEmpleado($listaDeEmpleadoDeLaConsulta['CiEmpleado']);	
				$objEmpleado->setNombreCompleto($listaDeEmpleadoDeLaConsulta['NombreEmpleado']);
				$objEmpleado->setCargo($listaDeEmpleadoDeLaConsulta['IdCargo']);
				$objEmpleado->setUsuario($listaDeEmpleadoDeLaConsulta['Usuario']);
				$objEmpleado->setContrasenia($listaDeEmpleadoDeLaConsulta['contrasenia']);
				$objEmpleado->setActivo($listaDeEmpleadoDeLaConsulta['activo']);
		}else{
				$objEmpleado = null;
		}
		return $objEmpleado;
	}//end function

	public function listaDeEmpleado(){
		$sqlListaEmpleado ="SELECT e.CiEmpleado, CONCAT(e.primerNombre,' ',e.segundoNombre,' ',e.apellidoPaterno,' ',e.apellidoMaterno) as NombreEmpleado ,e.FechaNacimiento , c.Cargo
        fROM Empleado e JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
        JOIN Cargo c ON ec.IdCargo=c.IdCargo; ";
		$cmd = $this->conexion->prepare($sqlListaEmpleado);
		$cmd->execute();
		$listaDeEmpleadoDeLaConsulta = $cmd->fetchAll();
		$listaDeEmpleado = array();
		$i = 0;
		foreach ($listaDeEmpleadoDeLaConsulta as $Empleado) {
			$objEmpleado = new Empleado();
			$objEmpleado->setCiEmpleado($Empleado['CiEmpleado']);
			$objEmpleado->setNombreCompleto($Empleado['NombreEmpleado']);
			$objEmpleado->setFechaNacimiento($Empleado['FechaNacimiento']);
			$objEmpleado->setCargo($Empleado['Cargo']);
			$listaDeEmpleado[$i]=$objEmpleado;
			$i++;
		}
		return $listaDeEmpleado;
	}

	public function listaDeHorasPorDia($CiEmpleado,$FechaActual){
		$sqlListaEmpleado ="SELECT a.HoraIngreso, a.HoraSalida, d.Fecha, a.TotalHoras, d.TotalHorasDia
		fROM Empleado e JOIN DiaHora d ON e.CiEmpleado = d.CiEmpleado
		AND e.CiEmpleado='$CiEmpleado'
		JOIN Acistencia a ON d.IdDiaHora = a.IdDiaHora 
		AND d.Fecha = '$FechaActual'; ";
		$cmd = $this->conexion->prepare($sqlListaEmpleado);
		$cmd->execute();
		$listaDeEmpleadoDeLaConsulta = $cmd->fetchAll();
		$listaDeEmpleado = array();
		$i = 0;
		foreach ($listaDeEmpleadoDeLaConsulta as $Empleado) {
			$objEmpleado = new Empleado();
			$objEmpleado->setHoraIngreso($Empleado['HoraIngreso']);
			$objEmpleado->setHoraSalida($Empleado['HoraSalida']);
			$objEmpleado->setDia($Empleado['Fecha']);
			$objEmpleado->setTotalHoras($Empleado['TotalHoras']);
			$listaDeEmpleado[$i]=$objEmpleado;
			$i++;
		}
		return $listaDeEmpleado;
	}

	public function listaDeHorasPorSemana($CiEmpleado, $Fecha){
		$sqlListaEmpleado ="SELECT a.HoraIngreso, a.HoraSalida, d.TotalHorasDia, a.Estado
		fROM Empleado e JOIN DiaHora d ON e.CiEmpleado = d.CiEmpleado
		AND e.CiEmpleado = '$CiEmpleado'
		JOIN Acistencia a ON d.IdDiaHora = a.IdDiaHora 
		AND d.Fecha = '$Fecha'; ";
		$cmd = $this->conexion->prepare($sqlListaEmpleado);
		$cmd->execute();
		$listaDeEmpleadoDeLaConsulta = $cmd->fetchAll();
		$listaDeEmpleado = array();
		$i = 0;
		foreach ($listaDeEmpleadoDeLaConsulta as $Empleado) {
			$objEmpleado = new Empleado();
			$objEmpleado->setCargo($Empleado['Estado']);
			// $objEmpleado->setDia($Empleado['Fecha']);
			$objEmpleado->setHoraIngreso($Empleado['HoraIngreso']);
			$objEmpleado->setHoraSalida($Empleado['HoraSalida']);
			$objEmpleado->setTotalHoras($Empleado['TotalHorasDia']);
			$listaDeEmpleado[$i]=$objEmpleado;
			$i++;
		}
		return $listaDeEmpleado;
	}

	public function BuscadorEmpleadoPorNombre($ApellidoPaterno,$ApellidoMaterno,$PrimerNombre,$SegundoNombre){
		$sqlListaEmpleado ="SELECT e.CiEmpleado, CONCAT(e.primerNombre,' ',e.segundoNombre,' ',e.apellidoPaterno,' ',e.apellidoMaterno) as NombreEmpleado,e.FechaNacimiento ,c.Cargo
		FROM Empleado e  JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
		JOIN Cargo c ON ec.IdCargo=c.IdCargo 
		WHERE e.primerNombre LIKE '%$PrimerNombre%' || e.segundoNombre LIKE '%$SegundoNombre%' || e.apellidoPaterno LIKE '%$ApellidoPaterno%' || e.apellidoMaterno  LIKE '%$ApellidoMaterno%' || e.CiEmpleado  LIKE '% %'
		order by e.apellidoPaterno,e.primerNombre; ";
		$cmd = $this->conexion->prepare($sqlListaEmpleado);
		$cmd->execute();
		$listaDeEmpleadoDeLaConsulta = $cmd->fetchAll();
		$listaDeEmpleado = array();
		$i = 0;
		foreach ($listaDeEmpleadoDeLaConsulta as $Empleado) {
			$objEmpleado = new Empleado();
			$objEmpleado->setCiEmpleado($Empleado['CiEmpleado']);
			$objEmpleado->setNombreCompleto($Empleado['NombreEmpleado']);
			$objEmpleado->setFechaNacimiento($Empleado['FechaNacimiento']);
			$objEmpleado->setCargo($Empleado['Cargo']);
			$listaDeEmpleado[$i]=$objEmpleado;
			$i++;
		}
		return $listaDeEmpleado;
	}
	
	public function HorarioFlexible($CiEmpleado){
		$sqlListaEmpleado ="SELECT c.EsFlexible
		fROM Empleado e JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
		AND e.CiEmpleado = '$CiEmpleado'
		JOIN Cargo c ON ec.IdCargo=c.IdCargo; ";
		$cmd = $this->conexion->prepare($sqlListaEmpleado);
		$cmd->execute();
		$listaDeEmpleadoDeLaConsulta = $cmd->fetchAll();
		$listaDeEmpleado = 0;
		$i = 0;
		foreach ($listaDeEmpleadoDeLaConsulta as $Empleado) {
			$listaDeEmpleado = $Empleado['EsFlexible'];
			$i++;
		}
		return $listaDeEmpleado;
	}

	public function listaDeHorasPorDiaSemana($CiEmpleado,$Fecha){
		$sqlListaEmpleado ="SELECT d.TotalHorasDia
		fROM Empleado e JOIN DiaHora d ON e.CiEmpleado = d.CiEmpleado
		AND e.CiEmpleado = '$CiEmpleado' 
		AND d.Fecha = '$Fecha'; ";
		$cmd = $this->conexion->prepare($sqlListaEmpleado);
		$cmd->execute();
		$listaDeEmpleadoDeLaConsulta = $cmd->fetchAll();
		$listaDeEmpleado = 0;
		$i = 0;
		if($listaDeEmpleadoDeLaConsulta == null){
			return 0;
		}else{
			foreach ($listaDeEmpleadoDeLaConsulta as $Empleado) {
				$listaDeEmpleado = $Empleado['TotalHorasDia'];
				$i++;
			}
			return $listaDeEmpleado;
		}
	}

	public function Cargo($CiEmpleado){
		$sqlListaEmpleado ="SELECT c.Cargo
		fROM Empleado e JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
		AND e.CiEmpleado = '$CiEmpleado'
		JOIN Cargo c ON ec.IdCargo=c.IdCargo; ";
		$cmd = $this->conexion->prepare($sqlListaEmpleado);
		$cmd->execute();
		$listaDeEmpleadoDeLaConsulta = $cmd->fetchAll();
		$listaDeEmpleado = "";
		$i = 0;
		foreach ($listaDeEmpleadoDeLaConsulta as $Empleado) {
			$listaDeEmpleado = $Empleado['Cargo'];
			$i++;
		}
		return $listaDeEmpleado;
	}

	public function ReporteA(){
		$sqlListaEmpleado ="SELECT COUNT(e.CiEmpleado) AS Cantidad, c.Cargo
		fROM Empleado e JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
		JOIN Cargo c ON ec.IdCargo=c.IdCargo
		GROUP BY c.Cargo; ";
		$cmd = $this->conexion->prepare($sqlListaEmpleado);
		$cmd->execute();
		$listaDeEmpleadoDeLaConsulta = $cmd->fetchAll();
		$listaDeEmpleado = array();
		$i = 0;
		foreach ($listaDeEmpleadoDeLaConsulta as $Empleado) {
			$objEmpleado = new Empleado();
			$objEmpleado->setTotalHoras($Empleado['Cantidad']);
			$objEmpleado->setCargo($Empleado['Cargo']);
			$listaDeEmpleado[$i]=$objEmpleado;
			$i++;
		}
		return $listaDeEmpleado;
	}
	

	public function ReporteD($Anio){
		$sqlListaEmpleado ="SELECT COUNT(e.CiEmpleado) AS Cantidad, e.Genero
		fROM Empleado e JOIN Contrato c ON e.CiEmpleado = c.CiEmpleado
		AND YEAR(c.Gestion) <= '$Anio'
		GROUP BY e.Genero; ";
		$cmd = $this->conexion->prepare($sqlListaEmpleado);
		$cmd->execute();
		$listaDeEmpleadoDeLaConsulta = $cmd->fetchAll();
		$listaDeEmpleado = array();
		$i = 0;
		foreach ($listaDeEmpleadoDeLaConsulta as $Empleado) {
			$objEmpleado = new Empleado();
			$objEmpleado->setTotalHoras($Empleado['Cantidad']);
			$objEmpleado->setGenero($Empleado['Genero']);
			$listaDeEmpleado[$i]=$objEmpleado;
			$i++;
		}
		return $listaDeEmpleado;
	}

	public function ReporteE(){
		$sqlListaEmpleado ="SELECT COUNT(e.CiEmpleado) AS Cantidad, e.EstdoCivil
		fROM Empleado e 
		GROUP BY e.EstdoCivil; ";
		$cmd = $this->conexion->prepare($sqlListaEmpleado);
		$cmd->execute();
		$listaDeEmpleadoDeLaConsulta = $cmd->fetchAll();
		$listaDeEmpleado = array();
		$i = 0;
		foreach ($listaDeEmpleadoDeLaConsulta as $Empleado) {
			$objEmpleado = new Empleado();
			$objEmpleado->setTotalHoras($Empleado['Cantidad']);
			$objEmpleado->setEstdoCivil($Empleado['EstdoCivil']);
			$listaDeEmpleado[$i]=$objEmpleado;
			$i++;
		}
		return $listaDeEmpleado;
	}
}

 
?>