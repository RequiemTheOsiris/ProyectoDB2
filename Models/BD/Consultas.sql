SELECT e.CiEmpleado, CONCAT(e.primerNombre,' ',e.segundoNombre,' ',e.apellidoPaterno,' ',e.apellidoMaterno) as NombreEmpleado,e.FechaNacimiento ,c.Cargo
fROM Empleado e JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
JOIN Cargo c ON ec.IdCargo=c.IdCargo;

SELECT e.CiEmpleado, CONCAT(e.primerNombre,' ',e.segundoNombre,' ',e.apellidoPaterno,' ',e.apellidoMaterno) as NombreEmpleado, c.IdCargo, e.Usuario, e.contrasenia, e.activo 
fROM Empleado e JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
AND e.Usuario = 'Daniel123'
JOIN Cargo c ON ec.IdCargo=c.IdCargo;

SELECT c.Cargo
fROM Empleado e JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
AND e.CiEmpleado = "123"
JOIN Cargo c ON ec.IdCargo=c.IdCargo;

SELECT c.EsFlexible
fROM Empleado e JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
AND e.CiEmpleado = "5678"
JOIN Cargo c ON ec.IdCargo=c.IdCargo;


SELECT d.TotalHorasDia
fROM Empleado e JOIN DiaHora d ON e.CiEmpleado = d.CiEmpleado
AND e.CiEmpleado="789" 
AND d.Fecha = "2019-09-09";

SELECT a.HoraIngreso, a.HoraSalida, d.TotalHorasDia, a.Estado
fROM Empleado e JOIN DiaHora d ON e.CiEmpleado = d.CiEmpleado
AND e.CiEmpleado="789"
JOIN Acistencia a ON d.IdDiaHora = a.IdDiaHora 
AND d.Fecha = "2019-09-09";

SELECT h.HoraIngreso, h.HoraSalida, t.Turno
fROM Empleado e JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
AND e.CiEmpleado="789"
JOIN Cargo c ON ec.IdCargo = c.IdCargo
JOIN Horario h ON c.IdCargo = h.IdCargo
JOIN Turno t ON h.IdTurno = t.IdTurno;

SELECT e.CiEmpleado, CONCAT(e.primerNombre,' ',e.segundoNombre,' ',e.apellidoPaterno,' ',e.apellidoMaterno) as NombreEmpleado,e.FechaNacimiento ,c.Cargo
fROM Empleado e  JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado

JOIN Cargo c ON ec.IdCargo=c.IdCargo
WHERE e.primerNombre LIKE '%D%' || e.segundoNombre LIKE '% %' || e.apellidoPaterno LIKE '% %' || e.apellidoMaterno  LIKE '% %' || e.CiEmpleado  LIKE '%3%'
-- AND c.Cargo = ""
order by e.apellidoPaterno,e.primerNombre;

SELECT e.CiEmpleado, CONCAT(e.primerNombre,' ',e.segundoNombre,' ',e.apellidoPaterno,' ',e.apellidoMaterno) as NombreEmpleado,e.FechaNacimiento ,c.Cargo
FROM Empleado e  JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
JOIN Cargo c ON ec.IdCargo=c.IdCargo 
WHERE e.primerNombre LIKE '%dani%' || e.segundoNombre LIKE '% %' || e.apellidoPaterno LIKE '% %' || e.apellidoMaterno  LIKE '% %' || e.CiEmpleado  LIKE '% %'
order by e.apellidoPaterno,e.primerNombre;
-- a

SELECT COUNT(e.CiEmpleado) AS Cantidad, c.Cargo
fROM Empleado e JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
JOIN Cargo c ON ec.IdCargo=c.IdCargo
GROUP BY c.Cargo;


-- b

SELECT COUNT(e.CiEmpleado), e.Genero
fROM Empleado e JOIN Contrato c ON e.CiEmpleado = c.CiEmpleado
AND YEAR(c.Gestion) = "2017"
GROUP BY e.Genero;

-- c

SELECT COUNT(e.CiEmpleado), e.Genero
fROM Empleado e JOIN Contrato c ON e.CiEmpleado = c.CiEmpleado
AND YEAR(c.Gestion) <= "2019"
GROUP BY e.Genero;

-- d

SELECT COUNT(e.CiEmpleado), e.EstdoCivil
fROM Empleado e 
GROUP BY e.EstdoCivil;

-- e

SELECT COUNT(e.CiEmpleado), c.Cargo
fROM Empleado e JOIN EmpleadoCargo ec ON e.CiEmpleado = ec.CiEmpleado
JOIN Cargo c ON ec.IdCargo=c.IdCargo
GROUP BY c.cargo;

-- f

SELECT CONCAT(e.primerNombre,' ',e.segundoNombre,' ',e.apellidoPaterno,' ',e.apellidoMaterno) as NombreEmpleado, COUNT(h.IdHijo)
fROM Empleado e JOIN Referencia r ON e.CiEmpleado = r.CiEmpleado
JOIN Hijo h ON r.CiReferencia=h.CiReferencia
GROUP BY e.CiEmpleado;

-- g

SELECT CONCAT(e.primerNombre,' ',e.segundoNombre,' ',e.apellidoPaterno,' ',e.apellidoMaterno) as NombreEmpleado, COUNT(h.IdHijo) AS Hijos
fROM Empleado AS e JOIN Referencia r ON e.CiEmpleado = r.CiEmpleado
JOIN Hijo h ON r.CiReferencia=h.CiReferencia
AND 3 = (SELECT COUNT(h1.IdHijo)
        fROM Empleado e1 JOIN Referencia r1 ON e1.CiEmpleado = r1.CiEmpleado
        JOIN Hijo h1 ON r1.CiReferencia=h1.CiReferencia
        WHERE e.CiEmpleado = e1.CiEmpleado)
GROUP BY e.CiEmpleado;

-- h

SELECT COUNT(e.CiEmpleado) ,YEAR(e.FechaNacimiento)
fROM Empleado e 
GROUP BY YEAR(e.FechaNacimiento);