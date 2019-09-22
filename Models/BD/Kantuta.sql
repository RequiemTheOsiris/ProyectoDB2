DROP DATABASE IF EXISTS kantuta;
CREATE DATABASE kantuta;
USE kantuta;

-- -----------------------------------------------------
-- Table `kantuta`.`empleado`
-- -----------------------------------------------------
CREATE TABLE Empleado(
  CiEmpleado VARCHAR(45) UNIQUE PRIMARY KEY,
  PrimerNombre VARCHAR(45) NOT NULL,
  SegundoNombre VARCHAR(45) NULL DEFAULT NULL,
  ApellidoPaterno VARCHAR(45) NOT NULL,
  ApellidoMaterno VARCHAR(45) NOT NULL,
  FechaNacimiento DATE NOT NULL,
  Genero VARCHAR(45) NOT NULL,
  EstdoCivil VARCHAR(45) NOT NULL,
  Activo INT(11) NOT NULL,
  NumeroCelular INT(11) NOT NULL,
  Fotografia VARCHAR(100) NOT NULL,
  Usuario VARCHAR(45) NOT NULL,
  Contrasenia VARCHAR(200) NOT NULL
);

-- -----------------------------------------------------
-- Table `kantuta`.`empleado`
-- -----------------------------------------------------
CREATE TABLE Contrato(
  IdContrato INT(11) PRIMARY KEY  AUTO_INCREMENT,
  Gestion DATE NOT NULL,
  CiEmpleado VARCHAR(45) NOT NULL,
  FOREIGN KEY (CiEmpleado) REFERENCES Empleado(CiEmpleado)
);

-- -----------------------------------------------------
-- Table `kantuta`.`acistencia`
-- -----------------------------------------------------
CREATE TABLE DiaHora (
  IdDiaHora INT(11) PRIMARY KEY  AUTO_INCREMENT,
  Fecha DATE NOT NULL,
  TotalHorasDia INT(11) NOT NULL,
  CiEmpleado VARCHAR(45) NOT NULL,
  FOREIGN KEY (CiEmpleado) REFERENCES Empleado(CiEmpleado)
);


-- -----------------------------------------------------
-- Table `kantuta`.`acistencia`
-- -----------------------------------------------------
CREATE TABLE Acistencia (
  IdAcistencia INT(11) PRIMARY KEY  AUTO_INCREMENT,
  HoraIngreso TIME NOT NULL,
  HoraSalida TIME NULL,
  Estado TINYINT(4) NULL,
  TotalHoras INT(11) NOT NULL,
  IdDiaHora INT(11) NOT NULL,
  FOREIGN KEY (IdDiaHora) REFERENCES DiaHora(IdDiaHora)
);


-- -----------------------------------------------------
-- Table `kantuta`.`horario`
-- -----------------------------------------------------
CREATE TABLE Turno (
  IdTurno INT(11) PRIMARY KEY AUTO_INCREMENT,
  Turno VARCHAR(11) NOT NULL
);


-- -----------------------------------------------------
-- Table `kantuta`.`cargo`
-- -----------------------------------------------------
CREATE TABLE cargo (
  IdCargo INT(11) PRIMARY KEY  AUTO_INCREMENT,
  Cargo VARCHAR(45) NOT NULL,
  EsFlexible TINYINT(1) NOT NULL
);


-- -----------------------------------------------------
-- Table `kantuta`.`horario`
-- -----------------------------------------------------
CREATE TABLE Horario (
  IdHorario INT(11) PRIMARY KEY AUTO_INCREMENT,
  HoraIngreso TIME NOT NULL,
  HoraSalida TIME NOT NULL,
  IdCargo INT(11) NULL,
  IdTurno INT(11) NOT NULL,
  FOREIGN KEY (IdCargo) REFERENCES Cargo(IdCargo),
  FOREIGN KEY (IdTurno) REFERENCES Turno(IdTurno)
);


-- -----------------------------------------------------
-- Table `kantuta`.`empleadocargo`
-- -----------------------------------------------------
CREATE TABLE EmpleadoCargo (
  IdEmpleadoCargo INT(11) PRIMARY KEY  AUTO_INCREMENT,
  IdCargo INT(11) NOT NULL,
  CiEmpleado VARCHAR(45) NOT NULL,
  FOREIGN KEY (IdCargo) REFERENCES Cargo(IdCargo),
  FOREIGN KEY (CiEmpleado) REFERENCES Empleado(CiEmpleado)
);


-- -----------------------------------------------------
-- Table `kantuta`.`feriado`
-- -----------------------------------------------------
CREATE TABLE Feriado (
  IdFeriado INT(11) PRIMARY KEY  AUTO_INCREMENT,
  FechaFeriado DATE NOT NULL
);

-- -----------------------------------------------------
-- Table `kantuta`.`referencia`
-- -----------------------------------------------------
CREATE TABLE Referencia (
  CiReferencia VARCHAR(45) UNIQUE PRIMARY KEY,
  PrimerNombre VARCHAR(45) NOT NULL,
  SegundoNombre VARCHAR(45) NULL DEFAULT NULL,
  ApellidoPaterno VARCHAR(45) NOT NULL,
  ApellidoMaterno VARCHAR(45) NOT NULL,
  Parentesco VARCHAR(45) NOT NULL,
  NumeroCelular VARCHAR(45) NOT NULL,
  CiEmpleado VARCHAR(45) NOT NULL,
  FOREIGN KEY (CiEmpleado) REFERENCES Empleado(CiEmpleado)
);

-- -----------------------------------------------------
-- Table `kantuta`.`hijo`
-- -----------------------------------------------------
CREATE TABLE Hijo (
  IdHijo INT(11) PRIMARY KEY  AUTO_INCREMENT,
  CiHijo VARCHAR(45) NULL,
  PrimerNombre VARCHAR(45) NOT NULL,
  SegundoNombre VARCHAR(45) NULL DEFAULT NULL,
  ApellidoPaterno VARCHAR(45) NOT NULL,
  ApellidoMaterno VARCHAR(45) NOT NULL,
  CiReferencia VARCHAR(45) NULL DEFAULT NULL,
  FOREIGN KEY (CiReferencia) REFERENCES Referencia(CiReferencia)
);


-- -----------------------------------------------------
-- Table `kantuta`.`profecion`
-- -----------------------------------------------------
CREATE TABLE Profecion (
  IdProfecion INT(11) PRIMARY KEY  AUTO_INCREMENT,
  Profecion VARCHAR(45) NOT NULL,
  CiEmpleado VARCHAR(45) NOT NULL,
  FOREIGN KEY (CiEmpleado) REFERENCES Empleado(CiEmpleado)
);


-- -----------------------------------------------------
-- Table `kantuta`.`vacacion`
-- -----------------------------------------------------
CREATE TABLE Vacacion (
  IdVacacion INT(11) PRIMARY KEY  AUTO_INCREMENT,
  FechaVacacion DATE NOT NULL
);
