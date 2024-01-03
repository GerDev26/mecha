
CREATE DATABASE NAVAJAMOTOS;
USE NAVAJAMOTOS;

CREATE TABLE CONDICION_IVA(
idCondicionIva INT AUTO_INCREMENT,
condicion VARCHAR(45),
PRIMARY KEY(idCondicionIva)
);

CREATE TABLE MARCAS(
idMarcas INT AUTO_INCREMENT,
marca VARCHAR(45),
PRIMARY KEY(idMarcas)
);

CREATE TABLE LOCALIDADES(
idLocalidades INT AUTO_INCREMENT,
Localidad VARCHAR(45),
PRIMARY KEY(idLocalidades)
);

CREATE TABLE CLIENTES(
idClientes INT AUTO_INCREMENT,
nombre VARCHAR(45),
apellido VARCHAR(45),
fechaNacimineto DATE,
estado BOOL,
cuil VARCHAR(11),
direccion VARCHAR(45),
telefono INT(20),
telefonoMovil INT(20),
email VARCHAR(45),
rutaImagen VARCHAR(45),
fkCondicionIva INT,
fkLocalidades INT,
PRIMARY KEY(idClientes),
FOREIGN KEY (fkLocalidades) REFERENCES LOCALIDADES(idLocalidades),
FOREIGN KEY (fkCondicionIva) REFERENCES CONDICION_IVA(idCondicionIva)
);

CREATE TABLE USUARIOS(
idUsuarios INT AUTO_INCREMENT,
nombre VARCHAR(45),
apellido VARCHAR(45),
fechaNacimineto DATE,
estado BOOL,
cuil VARCHAR(11),
direccion VARCHAR(45),
telefono INT(20),
telefonoMovil INT(20),
email VARCHAR(45),
nick VARCHAR(45),
pass VARCHAR(45),
fkLocalidades INT,
PRIMARY KEY(idUsuarios),
FOREIGN KEY (fkLocalidades) REFERENCES LOCALIDADES(idLocalidades)
);

CREATE TABLE VEHICULOS(
idVehiculos INT AUTO_INCREMENT,
modelo VARCHAR(45),
estado BOOL,
fecha VARCHAR(4),
cilindrada INT(4),
rutaImagen VARCHAR(60),
fkMarca INT,
PRIMARY KEY(idVehiculos),
FOREIGN KEY (fkMarca) REFERENCES MARCAS(idMarcas)
);

CREATE TABLE PROPIETARIOS(
idPropietarios INT AUTO_INCREMENT,
fkCliente INT,
fkVehiculo INT,
cedulaVerde VARCHAR(45),
patente INT(10),
PRIMARY KEY(idPropietarios),
FOREIGN KEY (fkCliente) REFERENCES CLIENTES(idClientes),
FOREIGN KEY (fkVehiculo) REFERENCES VEHICULOS(idVehiculos)
);

CREATE TABLE TRABAJOS(
idTrabajos INT AUTO_INCREMENT,
tipo VARCHAR(45),
precio FLOAT(10,5),
fechaInicial DATE,
fechaFinal DATE,
estado BOOL,
fkPropietarios INT,
PRIMARY KEY(idTrabajos),
FOREIGN KEY (fkPropietarios) REFERENCES PROPIETARIOS(idPropietarios)
);

CREATE TABLE TECNOLOGIAS(
idTecnologias INT AUTO_INCREMENT,
tecnologia VARCHAR(45),
PRIMARY KEY(idTecnologias)
);

CREATE TABLE VEH_TEC(
idVEH_TEC INT AUTO_INCREMENT,
fkTecnologia INT,
fkVehiculo INT,
PRIMARY KEY(idVEH_TEC),
FOREIGN KEY (fkTecnologia) REFERENCES TECNOLOGIAS(idTecnologias),
FOREIGN KEY (fkVehiculo) REFERENCES VEHICULOS(idVehiculos)
);

SELECT TECNOLOGIAS.tecnologia FROM VEH_TEC JOIN VEHICULOS ON VEH_TEC.fkVehiculo = VEHICULOS.idVehiculos JOIN TECNOLOGIAS ON VEH_TEC.fkTecnologia = TECNOLOGIAS.idTecnologias WHERE TECNOLOGIAS.tecnologia NOT IN ('Inyeccion Electronica', 'ABS', 'Control de Traccion');