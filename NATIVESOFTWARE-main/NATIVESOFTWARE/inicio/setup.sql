DROP DATABASE if exists usuarioApi;

CREATE DATABASE IF NOT exists usuario(
correo VARCHAR(30) NOT NULL;
nombreUsuario VARCHAR(25) NOT NULL;
contrasena VARCHAR(20) NOT NULL;
fechaNacimiento DATE;
PRIMARY KEY(correo)
)
ENGINE=INNODB;