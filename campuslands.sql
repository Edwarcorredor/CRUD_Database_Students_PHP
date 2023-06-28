CREATE DATABASE campuslands

USE campuslands

CREATE TABLE pais(
    idPais INT(11) NOT NULL PRIMARY KEY,
    nombrePais VARCHAR(50) NOT NULL
);

CREATE TABLE departamento(
    idDep INT(11) NOT NULL PRIMARY KEY,
    nombreDep VARCHAR(50) NOT NULL,
    idPais INT(11) NOT NULL
);

 CREATE TABLE region(
    idReg INT(11) NOT NULL PRIMARY KEY,
    nombreReg VARCHAR(60) NOT NULL,
    idDep INT(11) NOT NULL
);

CREATE TABLE campers(
    idCamper INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombreCamper VARCHAR(50) NOT NULL,
    apellidoCamper VARCHAR(50) NOT NULL,
    fechaNac DATE NOT NULL,
    idReg INT(11) NOT NULL
);


ALTER TABLE departamento ADD CONSTRAINT FK_departamento_pais FOREIGN KEY (idPais) REFERENCES pais(idPais);


ALTER TABLE region ADD CONSTRAINT FK_region_departamento FOREIGN KEY (idDep) REFERENCES departamento(idDep);


ALTER TABLE campers ADD CONSTRAINT FK_campers_region FOREIGN KEY (idReg) REFERENCES region(idReg);

INSERT INTO pais(idPais, nombrePais) VALUES (1,"colombia"); 

INSERT INTO departamento(idDep, nombreDep, idPais) VALUES (1, "santander",1);

INSERT INTO region(idReg, nombreReg, idDep) VALUES (1, "bucaramanga",1);