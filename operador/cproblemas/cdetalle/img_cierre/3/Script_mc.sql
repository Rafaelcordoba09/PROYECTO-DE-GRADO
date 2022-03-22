/*DROP database media_co;*/
CREATE database media_co;
USE media_co;

CREATE TABLE usuario (
id INT AUTO_INCREMENT PRIMARY KEY,
usuario varchar(100) NOT NULL UNIQUE,
clave varchar(100) NOT NULL,
perfil varchar(1) NOT NULL,
estado varchar(1) NOT NULL);
  
CREATE TABLE nodo
(id_nodo INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(50) NOT NULL,
 latitud DECIMAL (10,7) NOT NULL,
 longitud DECIMAL (10,7)  NOT NULL,
 fk_id_usuario INT NOT NULL
 );
ALTER TABLE nodo ADD CONSTRAINT fk_usuario_nodo  FOREIGN KEY (fk_id_usuario)
REFERENCES usuario(id) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE servicio
(id_servicio INT AUTO_INCREMENT PRIMARY KEY,
 proveedor VARCHAR(50) NOT NULL,
 frecuencia VARCHAR(50) NOT NULL,
 descripcion VARCHAR(200) NOT NULL,
 capacidad VARCHAR(100),
 fk_id_nodo INT NOT NULL
 );

 ALTER TABLE servicio ADD CONSTRAINT fk_servicio_nodo  FOREIGN KEY (fk_id_nodo)
 REFERENCES nodo(id_nodo) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO usuario (usuario,clave,perfil,estado) VALUES ('administrador', md5('admin'),'A','A');
INSERT INTO usuario (usuario,clave,perfil,estado) VALUES ('reporte', md5('reporte'),'R','A');
INSERT INTO usuario (usuario,clave,perfil,estado) VALUES ('operario', md5('operario'),'O','A');
INSERT INTO usuario (usuario,clave,perfil,estado) VALUES ('operario2', md5('operario2'),'O','A');
/*
dirección punta origen, dirección punta destino, 
distancia total de la fibra, georreferenciar o ingresar coordenadas 
de cada kilómetro que compone el tramo de fibra, cantidad de hilos utilizados
*/
CREATE TABLE tramo
(id INT AUTO_INCREMENT PRIMARY KEY,
 id_tramo INT NOT NULL,
 dir_origen_lat DECIMAL(10,7) NOT NULL,
 dir_origen_lon DECIMAL(10,7) NOT NULL,
 distancia_fibra INT NOT NULL,
 cantidad_hilos INT NOT NULL,
 fk_id_nodo INT,
 CONSTRAINT U_Tramo UNIQUE (id_tramo,fk_id_nodo)
);

ALTER TABLE tramo ADD CONSTRAINT fk_tramo_nodo  FOREIGN KEY (fk_id_nodo)
REFERENCES nodo(id_nodo) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE incidente
(id_incidente INT AUTO_INCREMENT PRIMARY KEY,
 fk_id_tramo INT NOT NULL,
 fecha DATE NOT NULL,
 hora TIME NOT NULL,
 tipo VARCHAR(30) NOT NULL,
 observaciones VARCHAR (200) NOT NULL,
 estado VARCHAR(10),
 usuarioasig INT
 );
 
 
 ALTER TABLE incidente ADD CONSTRAINT fk_tramo_incidente  FOREIGN KEY (fk_id_tramo)
 REFERENCES tramo(id) ON DELETE RESTRICT ON UPDATE RESTRICT;
 
 ALTER TABLE incidente ADD CONSTRAINT fk_usuario_incidente  FOREIGN KEY (usuarioasig)
 REFERENCES usuario(id) ON DELETE RESTRICT ON UPDATE RESTRICT;
 
 CREATE TABLE sol_incidente
 (id_sol_incidente INT AUTO_INCREMENT PRIMARY KEY,
  fecha DATE NOT NULL,
  hora TIME NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  fk_id_incidente INT
 );
 
 ALTER TABLE sol_incidente ADD CONSTRAINT fk_incidente_solincidente  
 FOREIGN KEY (fk_id_incidente) REFERENCES incidente(id_incidente) ON DELETE RESTRICT ON UPDATE RESTRICT;
 
 CREATE TABLE cie_incidente
 (id_cie_incidente INT AUTO_INCREMENT PRIMARY KEY,
  fecha DATE NOT NULL,
  hora TIME NOT NULL,
  accion VARCHAR(100) NOT NULL,
  tipo_falla VARCHAR(50) NOT NULL,
  causa_falla VARCHAR(50) NOT NULL,
  no_clientes INT NOT NULL,
  adjunto VARCHAR(100),
  fk_id_incidente INT
 );
 
 ALTER TABLE cie_incidente ADD CONSTRAINT fk_incidente_cieincidente  
 FOREIGN KEY (fk_id_incidente) REFERENCES incidente(id_incidente) ON DELETE RESTRICT ON UPDATE RESTRICT;

DELIMITER $$
CREATE TRIGGER zucaritas_1 AFTER INSERT ON cie_incidente
FOR EACH ROW
BEGIN
	UPDATE incidente SET estado="CERRADO" where id_incidente=NEW.fk_id_incidente;
END;
$$

CREATE TABLE problema
(id_problema INT AUTO_INCREMENT PRIMARY KEY,
 fk_id_tramo INT NOT NULL,
 fecha DATE NOT NULL,
 hora TIME NOT NULL,
 tipo VARCHAR(30) NOT NULL,
 observaciones VARCHAR (200) NOT NULL,
 estado VARCHAR(10),
 usuarioasig INT
 );
 
 
 ALTER TABLE problema ADD CONSTRAINT fk_tramo_problema  FOREIGN KEY (fk_id_tramo)
 REFERENCES tramo(id) ON DELETE RESTRICT ON UPDATE RESTRICT;
 
 ALTER TABLE problema ADD CONSTRAINT fk_usuario_problema  FOREIGN KEY (usuarioasig)
 REFERENCES usuario(id) ON DELETE RESTRICT ON UPDATE RESTRICT;
 
 CREATE TABLE sol_problema
 (id_sol_problema INT AUTO_INCREMENT PRIMARY KEY,
  fecha DATE NOT NULL,
  hora TIME NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  fk_id_problema INT
 );
 
 ALTER TABLE sol_problema ADD CONSTRAINT fk_problema_solproblema  
 FOREIGN KEY (fk_id_problema) REFERENCES problema(id_problema) ON DELETE RESTRICT ON UPDATE RESTRICT;
 
 CREATE TABLE cie_problema
 (id_cie_problema INT AUTO_INCREMENT PRIMARY KEY,
  fecha DATE NOT NULL,
  hora TIME NOT NULL,
  accion VARCHAR(100) NOT NULL,
  tipo_falla VARCHAR(50) NOT NULL,
  causa_falla VARCHAR(50) NOT NULL,
  no_clientes INT NOT NULL,
  adjunto VARCHAR(100),
  fk_id_problema INT
 );
 
 DELIMITER $$
CREATE TRIGGER zucaritas_2 AFTER INSERT ON cie_problema
FOR EACH ROW
BEGIN
	UPDATE problema SET estado="CERRADO" where id_problema=NEW.fk_id_problema;
END;
$$

 DELIMITER $$
 CREATE OR REPLACE PROCEDURE generar_problemas()
 BEGIN
DECLARE tramo INT;
DECLARE cuenta INT;
DECLARE resultado INT;
DECLARE finished INT;
DECLARE cursor_c1 CURSOR FOR SELECT id_tramo, COUNT(*) FROM 
tramo a INNER JOIN incidente b ON (a.id_tramo=b.fk_id_tramo)
WHERE DATEDIFF(CURRENT_TIMESTAMP,fecha)>90
HAVING COUNT(*) >= 3;

DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;

 /*Primer Condición Verificar Si tiene 3 o más eventos en un tiempo menor de 3 meses
 debe verificar que no tenga casos activos en problema o en incidente*/
 OPEN cursor_c1;
 alarma1: LOOP
		FETCH cursor_c1 INTO tramo,cuenta;
		IF finished = 1 THEN 
			LEAVE alarma1;
		END IF;
		
        /*Verificar si tiene casos abiertos actualmente */
        /*Fin verificar casos abiertos*/
        
 END LOOP alarma1;
 CLOSE cursor_c1;
 /*Fin Primer Condición*/
 END;
 $$

