INSERT INTO Empleado
(CiEmpleado,PrimerNombre,SegundoNombre,ApellidoPaterno,ApellidoMaterno,FechaNacimiento,Genero,EstdoCivil,Activo,NumeroCelular,Fotografia,Usuario,Contrasenia)
VALUES
('123','Daniel','','Delgado','Camacho','1999-10-19','M','Soltero',1,60771615,'Foto','Daniel123','123'),
-- ('321','Maria','','Fernadez','Apaza','2000-10-19','F','Divorciado',1,60771615,'Foto','Maria321','321'),
('456','Juan','','Delgado','Camacho','1999-10-19','M','Casado',1,60771615,'Foto','Juan','456'),
('654','Marta','','Fernadez','Apaza','1999-10-19','F','Soltero',1,60771615,'Foto','Marta','654'),
('789','Miguel','','Delgado','Camacho','1999-10-19','M','Casado',1,60771615,'Foto','Miguel','789'),
('987','Jose','','Fernadez','Apaza','1999-10-19','M','Casado',1,60771615,'Foto','Jose','987'),
('1234','Jhessy','','Delgado','Camacho','1999-10-19','F','Casado',1,60771615,'Foto','Jhessy','1234'),
('4321','David','','Fernadez','Apaza','1999-10-19','M','Viudo',1,60771615,'Foto','David','4321'),
('5678','Rodri','','Delgado','Camacho','1979-10-19','M','Divorciado',1,60771615,'Foto','Rodri','5678'),
('8765','Magui','','Fernadez','Apaza','1989-10-19','F','Casado',1,60771615,'Foto','Magui8765','8765'),
('12','Daniel','','Delgado','Camacho','1979-10-19','M','Casado',1,60771615,'Foto','Daniel12','12'),
('21','Maria','','Fernadez','Apaza','1989-10-19','F','Viudo',1,60771615,'Foto','Maria','21'),
('34','Fernando','','Delgado','Camacho','1999-10-19','M','Casado',1,60771615,'Foto','Fernando','34'),
('43','Fernanda','','Fernadez','Apaza','1999-10-19','F','Casado',1,60771615,'Foto','Fernanda','43'),
('56','Alex','','Delgado','Camacho','1989-10-19','M','Soltero',1,60771615,'Foto','Alex','56'),
('65','Cristian','','Fernadez','Apaza','1999-10-19','M','Soltero',1,60771615,'Foto','Cristian','65'),
('78','Alexandra','','Delgado','Camacho','1999-10-19','F','Casado',1,60771615,'Foto','Alexandra','78'),
('87','Abel','','Fernadez','Apaza','1979-10-19','M','Casado',1,60771615,'Foto','Abel','87'),
('910','Daniela','','Delgado','Camacho','1999-10-19','F','Divorciado',1,60771615,'Foto','Daniela','910');


INSERT INTO Contrato
(Gestion, CiEmpleado)
VALUES
('2019-09-02','123'),
('2019-09-02','456'),
-- ('2019-09-02','321'),
('2019-09-02','654'),
('2019-09-02','910'),
('2018-09-02','789'),
('2018-09-02','987'),
('2018-09-02','1234'),
('2017-09-02','4321'),
('2017-09-03','5678'),
('2017-09-03','8765');

-- ===============================Prueba===============================
INSERT INTO Contrato
(Gestion, CiEmpleado)
VALUES
('2019-09-02','321');
-- ===============================Prueba===============================

INSERT INTO DiaHora
(Fecha,TotalHorasDia,CiEmpleado)
VALUES
-- 123
('2019-09-09',8,'123'),
('2019-09-10',7,'123'),
-- ('2019-09-11',0,'123'),
('2019-09-12',8,'123'),
-- 789
('2019-09-09',8,'789'),
('2019-09-10',7,'789'),
-- ('2019-09-11',0,'789'),
('2019-09-12',8,'789'),
-- 4321
('2019-09-09',12,'4321'),
('2019-09-10',11,'4321'),
-- ('2019-09-11',0,'4321'),
('2019-09-12',12,'4321'),
-- 5678
('2019-09-09',8,'5678'),
('2019-09-10',7,'5678'),
-- ('2019-09-11',0,'5678'),
('2019-09-12',8,'5678');

INSERT INTO Acistencia
(HoraIngreso,HoraSalida,Estado,TotalHoras,IdDiaHora)
VALUES
-- 123 
('06:00:00','14:00:00',0,8,1),
('06:00:00','13:00:00',1,7,2),
-- ('00:00:00','00:00:00',0,0,3),
('06:00:00','14:00:00',0,8,3),
-- 789 
('08:00:00','12:00:00',0,4,4),
('14:00:00','18:00:00',0,4,4),
('08:00:00','12:00:00',0,4,5),
('15:00:00','18:00:00',1,3,5),
-- ('08:00:00','12:00:00',0,4,7),
-- ('14:00:00','18:00:00',0,4,7),
('08:00:00','12:00:00',0,4,6),
('14:00:00','18:00:00',0,4,6),
-- 4321 
('08:00:00','20:00:00',0,12,7),
('08:00:00','19:00:00',1,11,8),
-- ('00:00:00','00:00:00',0,0,11),
('08:00:00','20:00:00',0,12,9),
-- 5678 
('07:00:00','11:00:00',0,4,10),
('12:00:00','14:00:00',0,2,10),
('15:00:00','17:00:00',0,2,10),
('07:00:00','11:00:00',0,4,11),
('13:00:00','16:00:00',0,3,11),
-- ('00:00:00','00:00:00',0,0,15),
('07:00:00','11:00:00',0,4,12),
('12:00:00','14:00:00',0,2,12),
('15:00:00','17:00:00',0,2,12);

INSERT INTO Turno
(Turno)
VALUES
('M'),
('T'),
('N');


INSERT INTO cargo
(Cargo,EsFlexible)
VALUES
('Prensista',0),
('Obrero',0),
('Supervisor',0),
('Almasenero',0),
('Contador',0),
('Auditor',0),
('Secretario',0),
('Seguridad',0),
('Limpieza',1),
('Administrador',1),
('Distribuidor',1),
('Chofer',1),
('Diseniador',1),
('Marqueting',1),
('Editor',1),
('Publicista',1),
('Vendedor',1),
('Asistente',1),
('Revisor',1);


INSERT INTO Horario
(HoraIngreso,HoraSalida,IdCargo,IdTurno)
VALUES
('06:00:00','14:00:00',1,1),
('08:00:00','12:00:00',2,1),
('14:00:00','18:00:00',2,2),
('08:00:00','20:00:00',3,3);


INSERT INTO EmpleadoCargo
(IdCargo,CiEmpleado)
VALUES
(1,'123'),
-- (2,'321'),
(3,'456'),
(4,'654'),
(5,'789'),
(6,'987'),
(7,'1234'),
(8,'4321'),
(9,'5678'),
(10,'8765'),
(11,'12'),
(12,'21'),
(13,'34'),
(14,'43'),
(15,'56'),
(16,'65'),
(17,'78'),
(18,'87'),
(19,'910');

-- ===============================Prueba===============================
INSERT INTO EmpleadoCargo
(IdCargo,CiEmpleado)
VALUES
(2,'321');
-- ===============================Prueba===============================

INSERT INTO Feriado
(FechaFeriado)
VALUES
('2019-09-03'),
('2019-09-09');

INSERT INTO Vacacion
(FechaVacacion)
VALUES
('2019-09-11');

INSERT INTO Vacacion
(FechaVacacion)
VALUES
('2019-09-10');

-- printhis.js