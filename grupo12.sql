drop database grupo12;
create database if not exists grupo12;
use grupo12;

create table tipo_acoplado(
	id int primary key,
	descripcion varchar(100)
);

create table acoplado(
	patente varchar(10) primary key,
	chasis varchar(50),
	tipo int,
	constraint fk_acoplado_tipo 
	foreign key (tipo) 
	references tipo_acoplado(id)
);

create table tipo_carga(
	id_tipo_carga int primary key,
	descripcion varchar(100)
);

create table carga(
	id int primary key,
	hazard varchar(100),
	peso_neto decimal(10,2),
	reefer varchar(100),
	tipo int,
	constraint fk_carga_tipo 
	foreign key (tipo)
	references tipo_carga(id_tipo_carga)
);

create table usuario(
	dni int primary key ,
	nombreUsuario varchar(100),
	contrasenia varchar(100),
	nombre varchar(100),
	apellido varchar(100),
	fecha_nacimiento date
);

create table tipo_empleado(
	id_tipo_empleado int primary key,
	descripcion varchar(100)
);

create table empleado (
	id int primary key auto_increment,
	tipo_de_licencia varchar(100),
	tipo_empleado int,
	dni_usuario int,
	constraint fk_empleado_tipo
	foreign key (tipo_empleado)
	references tipo_empleado(id_tipo_empleado),
	constraint fk_empleado_usuario
	foreign key (dni_usuario)
	references usuario(dni) ON UPDATE CASCADE
);

create table tipo_mantenimiento(
	id_tipo_mantenimiento int primary key,
	descripcion varchar(100)
);

create table estado_vehiculo(
	id int primary key,
	descripcion varchar(100)
);

create table tipo_vehiculo(
	id int primary key,
	descripcion varchar(100)
);

create table vehiculo(
	patente varchar(10) primary key,
	nro_chasis int,
	nro_motor int,
	kilometraje int,
	fabricacion date,
	marca varchar(100),
	modelo varchar(100),
	calendario_service datetime,
	estado int,
	tipo int,
	constraint fk_vehiculo_estado
	foreign key (estado)
	references estado_vehiculo(id),
	constraint fk_vehiculo_tipo
	foreign key (tipo)
	references tipo_vehiculo(id)
);

create table reporte_estadistico(
	id int primary key,
	tiempo datetime,
	km_recorridos int,
	tiempo_fuera_serv datetime,
	combustible varchar(100),
	costo_mantenimiento decimal(10,2),
	costo_km_recorrido decimal(10,2),
	reporte_desvio varchar (300),
	km int,
	patente_vehiculo varchar(10),
	constraint fk_reporte_estadistico 
	foreign key (patente_vehiculo)
	references vehiculo(patente)
);

create table mantenimiento(
	id int primary key,
	km_unidad int,
	service_interno_externo smallint,
	costo decimal(10,2),
	fecha_service datetime,
	repuestos_cambiados varchar(500),
	tipo int,
	patente_vehiculo varchar(10),
	constraint fk_mantemiento_tipo
	foreign key (tipo)
	references tipo_mantenimiento(id_tipo_mantenimiento),
	constraint fk_mantenimiento_vehiculo 
	foreign key(patente_vehiculo)
	references vehiculo(patente)
);

create table empleado_mantenimiento(
	id_empleado int,
	id_mantenimiento int,
	mecanico_responsable int,
	constraint pk_empleado_mantenimiento 
	primary key(id_empleado,id_mantenimiento),
	constraint fk_empleado_mantenimiento_empleado
	foreign key (id_empleado) 
	references empleado(id),
	constraint fk_empleado_mantenimiento_mantenimiento
	foreign key (id_mantenimiento) 
	references mantenimiento(id),
	constraint fk_empleado_mantenimiento_responsable
	foreign key (mecanico_responsable) 
	references empleado(id)
);

create table provincia(
	id int primary key,
	descripcion varchar(100)
);

create table localidad(
	id int primary key,
	descripcion varchar(100),
	provincia int,
	constraint fk_localidad_provincia 
	foreign key (provincia)
	references provincia(id)
);

create table direccion(
	id int primary key,
	calle varchar(100),
	altura int,
	localidad int,
	constraint fk_direccion_localidad
	foreign key (localidad)
	references localidad(id)
);

create table cliente(
	cuit int primary key,
	email varchar(100),
	telefono int,
	direccion int,
	denominacion varchar(100),
	contacto1 int,
	contacto2 int,
	constraint fk_cliente_direccion 
	foreign key (direccion) 
	references direccion(id),
	constraint fk_cliente_cliente1 
	foreign key (contacto1) 
	references cliente(cuit),
	constraint fk_cliente_cliente2 
	foreign key (contacto2) 
	references cliente(cuit)
);

create table costeo(
	id int primary key,
	etd varchar(100),
	reefer varchar(100),
	ETA varchar(100),
	kilometros int,
	combustible varchar(100),
	peajes_pasajes varchar(150),
	extras varchar(250),
	viaticos decimal(10,2),
	hazard varchar(200),
	total decimal(12,2),
	fee decimal (10,2)
);

	
create table viaje(
	id int primary key,
	eta varchar(100),
	carga int,
	acoplado varchar(10),
	chofer int,
	fecha_incio datetime,
	fecha_fin datetime,
	destino int,
	partida int,
	constraint fk_viaje_carga foreign key (carga) references carga(id),
	constraint fk_viaje_acoplado foreign key (acoplado) references acoplado(patente),
	constraint fk_viaje_chofer foreign key (chofer) references empleado(id),
	constraint fk_viaje_destino foreign key (destino) references direccion(id),
	constraint fk_viaje_partida foreign key (partida) references direccion(id)
);

create table posicion(
	id int primary key,
	x decimal(10,5),
	y decimal(10,5)
);

create table seguimiento(
	id int primary key,
	combustible_consumido int,
	posicion_actual int,
	km_recorridos int,
	vehiculo varchar(10),
	viaje int,
	constraint fk_seguimiento_vehiculo foreign key (vehiculo) references vehiculo(patente),
	constraint fk_seguimiento_viaje foreign key (viaje) references viaje(id),
	constraint fk_seguimiento_posicion foreign key (posicion_actual) references posicion(id)
);

insert into tipo_empleado(id_tipo_empleado, descripcion)
values(1, "administrador"),
(2, "supervisor"),
(3, "encargado"),
(4,"chofer"),
(5,"mecanico");

insert into usuario(dni, nombreUsuario, contrasenia, nombre, apellido, fecha_nacimiento)
values(123, 'admin','202cb962ac59075b964b07152d234b70','ABC','CBA', 19940918),
(124, 'segundo','202cb962ac59075b964b07152d234b70','Pewmafe','Fefar', 19940918),
(125, 'tercero','202cb962ac59075b964b07152d234b70','Pedro', 'Roco', 19940918),
(126, 'cuarto','202cb962ac59075b964b07152d234b70','Armando','Rodriguez', 19981018),
(127, 'quinto','202cb962ac59075b964b07152d234b70','Ramiro','Ledez', 19940923),
(128, 'sexto','202cb962ac59075b964b07152d234b70','CBZ','CRT', 19920912),
(129, 'pew','202cb962ac59075b964b07152d234b70','DFG','QWERTY', 19980908);


insert into empleado(id, tipo_de_licencia, tipo_empleado, dni_usuario)
values(1, 'camion', 1, 123),
(2, 'auto', 3, 124),
(3, 'auto', 4, 127);

insert into vehiculo(patente, nro_chasis, nro_motor, kilometraje, fabricacion, marca, modelo, calendario_service, estado, tipo)
values('aa123bb', 10, 100, 20000, 20150505, 'Iveco', 'Scavenger', 20180209, null, null);

insert into vehiculo(patente, nro_chasis, nro_motor, kilometraje, fabricacion, marca, modelo, calendario_service, estado, tipo)
values('ab145bb', 11, 101, 15000, 20160608, 'Iveco', 'Scavenger', 20191011, null, null);

insert into vehiculo(patente, nro_chasis, nro_motor, kilometraje, fabricacion, marca, modelo, calendario_service, estado, tipo)
values('ba531aa', 12, 102, 18000, 20191108, 'Scania', 'g150', 20200201, null, null);


insert into tipo_acoplado(id, descripcion)
values (1, 'Araña'), (2, 'CarCarrier'), (3, 'Jaula'), (4, 'Granel'), (5, 'Tanque');


insert into acoplado(patente, chasis, tipo)
values('aa159yy', 123789, 1), ('ab456uu', 456789, 3);

