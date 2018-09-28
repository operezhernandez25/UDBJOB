create database computrabajo;
use computrabajo;

create table empresa(
	idEmpresa int primary key auto_increment,
    nombre varchar(300),
    razonSocial varchar(300),
    NIT varchar(17),
    pais varchar(300),
    region varchar(300),
    direccion varchar(500),
    sector varchar(300),
    numTrabajadores int
)

create table usuarioEmpresa(
	idUsuarioEmpresa int primary key auto_increment,
    nombre varchar(300),
    apellido varchar(300),
    idEmpresa int,
    foreign key fk_idempresa (idEmpresa) references empresa(idEmpresa)
)

create table propuesta(
	idPropuesta int primary key auto_increment,
    titulo varchar(500),
    descripcion varchar(500),
    idUsuarioEmpresa int,
    fecha date,
    pruebaTecnica varchar(500),
    foreign key fk_idusuarioempresa (idUsuarioEmpresa) references usuarioEmpresa(idUsuarioEmpresa)
)

create table tipoTelefono(
	idTipoTelefono int primary key auto_increment,
    tipo varchar(250)
)

create table telefonos(
	idTelefono int primary key auto_increment,
    idTipoTelefono int,
    numero varchar(9),
    foreign key fk_idtipotelefono (idTipoTelefono) references tipoTelefono(idTipoTelefono)
)

create table conocimientos(
	idConocimientos int primary key auto_increment,
    conocimientos varchar(500)
)

create table niveles(
	idNivel int primary key auto_increment,
    Nivel varchar(250)
)


create table usuario(
	idUsusario int primary key auto_increment,
    nombres varchar(300),
    apellidos varchar(300),
    curriculum varchar(500),
    fechaNacimiento date,
    genero varchar(250),
    estadoCivil varchar(250),
    skype varchar(300),
    pais varchar(250),
    departamento varchar(250),
    ciudad varchar(250),
    direccion varchar(500),
    nacionalidad varchar(300),
    foto varchar(500),
    idTelefono int,
    foreign key fk_idtelefono (idTelefono) references telefonos(idTelefono)
)

create table usuarioConocimiento(
	idUsuario int,
    idConocimiento int,
    idNivel int,
    foreign key fk_usuario (idUsuario) references usuario(idUsuario),
    foreign key fk_idconocimiento (idConocimiento) references conocimientos(idConocimiento),
    foreign key fk_nivel (idNivel) references niveles(idNivel)
)


create table postulaciones(
	idPostulacion int primary key auto_increment,
    idUsuario int,
    idPropuesta int,
    estado bit,
    fecha date,
    uploadPruebaTecnica varchar(500),
    foreign key fk_idUsuarioPostulacion (idUsuario) references usuario(idUsuario),
    foreign key fk_PropuestaPostulacion (idPropuesta) references propuesta(idPropuesta)
)

create table mensajes(
	idPostulacion int,
    remitente varchar(500),
    mensaje varchar(500),
    fecha date,
    foreign key fk_postulacionmsg (idPostulacion) references postulaciones(idPostulacion)
)

create table propuestaConocimiento(
	idConocimiento int,
    idPropuesta int,
    idNivel int,
    foreign key fk_proconocimiento (idConocimiento) references conocimientos(idConocimientos),
    foreign key fk_propuesta (idPropuesta) references propuesta(idPropuesta)
)

