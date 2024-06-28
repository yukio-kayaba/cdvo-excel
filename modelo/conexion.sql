CREATE SCHEMA ficheros;
use ficheros;
CREATE TABLE `ficheros`.`usuarios_ficher_0001_z` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dni` VARCHAR(9) NULL,
  `contrasenia` VARCHAR(145) NULL,
  `nombre_user` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `ficheros`.`archivos_ficher_0001_z` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_user` INT NULL,
  `nombre_archivo` VARCHAR(145) NULL,
  PRIMARY KEY (`id`));


USE `ficheros`;
DROP function IF EXISTS `validador_cuenta`;

DELIMITER $$
USE `ficheros`$$
CREATE FUNCTION validador_cuenta(dni_x varchar(9),contrasenia_x varchar(145))
RETURNS INTEGER
BEGIN
	declare id_dni integer default -1;
    declare id_contra integer default -1;
	declare valor integer default -1;
    
    set id_dni = (SELECT id FROM usuarios_ficher_0001_z where dni = dni_x);
    set id_contra = (SELECT id FROM usuarios_ficher_0001_z where contrasenia = contrasenia_x and dni = dni_x);
    
    if id_dni = -1 and id_contra = -1 then
		return -1;
    end if;
    
    if id_dni = id_contra then
		set valor = id_dni;
    end if;
    
    
RETURN valor;
END$$

DELIMITER ;

