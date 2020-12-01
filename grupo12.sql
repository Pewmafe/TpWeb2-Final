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

create table reefer(
	id_reefer int primary key auto_increment,
	temperatura int
);

create table imo_class(
	id int primary key,
	descripcion varchar(100)
);

create table imo_sub_class(
	id int primary key,
	descripcion varchar(100),
	imo_class_id int,
	constraint fk_imo_class_id
	foreign key (imo_class_id)
	references imo_class(id)
);

create table hazard(
	id int primary key auto_increment,
	imo_sub_class_id int,
	constraint fk_imo_sub_class_id
	foreign key (imo_sub_class_id)
	references imo_sub_class(id)
);

create table carga(
	id int primary key auto_increment,
	hazard_id int,
	peso_neto decimal(10,2),
	reefer_id int,
	tipo int,
	constraint fk_carga_tipo
	foreign key (tipo)
	references tipo_carga(id_tipo_carga),
	constraint fk_reefer_id
	foreign key (reefer_id)
	references reefer(id_reefer),
	constraint fk_hazard_id
	foreign key (hazard_id)
	references hazard(id)
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
	provincia_id int,
	constraint fk_localidad_provincia
	foreign key (provincia_id)
	references provincia(id)
);

create table direccion(
	id int primary key auto_increment,
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
	nombre varchar(100),
	apellido varchar(100),
	telefono int,
	direccion int,
	denominacion varchar(100),
	contacto1 varchar(100),
	contacto2 varchar(100),
	constraint fk_cliente_direccion
	foreign key (direccion)
	references direccion(id)
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
	id int primary key auto_increment,
	eta datetime,
	etd datetime,
	carga_id int,
	acoplado_patente varchar(10),
	vehiculo_patente varchar(10),
	chofer_id int,
	destino_id int,
	partida_id int,
	constraint fk_viaje_carga foreign key (carga_id) references carga(id),
	constraint fk_viaje_acoplado foreign key (acoplado_patente) references acoplado(patente),
	constraint fk_viaje_vehiculo foreign key (vehiculo_patente) references vehiculo(patente),
	constraint fk_viaje_chofer foreign key (chofer_id) references empleado(id),
	constraint fk_viaje_destino foreign key (destino_id) references direccion(id),
	constraint fk_viaje_partida foreign key (partida_id) references direccion(id)
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

create table estado_proforma(
    id int primary key,
    descripcion varchar(50)
);

create table proforma(
	id int primary key auto_increment,
	cliente_cuit int,
	viaje_id int,
	estado int,
	constraint fk_estado foreign key (estado) references estado_proforma(id),
	constraint fk_cliente foreign key (cliente_cuit) references cliente(cuit),
	constraint fk_viaje foreign key (viaje_id) references viaje(id)
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
(3, 'tractor', 4, 127),
(4, 'camion', 4, 128),
(5, 'auto', 2, 125);

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


insert into tipo_carga(id_tipo_carga, descripcion)
values(1, 'granel'),
(2, 'liquida'),
(3, "20''"),
(5, "40''"),
(6, 'jaula'),
(7, 'carCarrier');

insert into imo_class(id, descripcion)
values(1, 'explosivo'),
(2, 'gas');

insert into imo_sub_class(id, descripcion, imo_class_id)
values(1, '1.1', 1),
(2, '1.2', 1),
(3, '1.3', 1),
(4, '1.4', 1),
(5, '1.5', 1),
(6, '1.6', 1),
(7, 'gas inflamable', 2),
(8, 'gas ininflamable', 2),
(9, 'gas oxigeno', 2),
(10, 'gas venenoso', 2);

insert into provincia(id, descripcion)
values(1, 'Buenos Aires'),
(2, 'Cordoba'),
(3, 'Rosario');

insert into localidad(id, descripcion, provincia_id)
values(1, 'Bahía Blanca',1),
(2, 'El palomar',1),
(3, 'Pontevedra',1),
(4, 'Amboy',2),
(5, 'La Falda',2),
(6, 'Pasco',2),
(7, 'Pergamino',3),
(8, 'Venado Tuerto',3),
(9, 'Gran Rosario',3);

insert into estado_proforma values
(1,'ACTIVO'),
(2,'PENDIENTE'),
(3,'FINALIZADO');

select * from proforma;
#concat(vehiculo_patente,descripcion) as 'suma'
select  ep.descripcion as 'estado',
                        pd.descripcion as 'destino',
                        pp.descripcion as 'partida',
                        j.eta,
                        j.etd 
                from proforma p
                    join viaje j on p.viaje_id = j.id
                    join direccion dp on j.partida_id = dp.id
                    join direccion dd on j.destino_id = dd.id
                    join localidad lp on lp.id = dp.localidad
                    join localidad ld on ld.id = dd.localidad
                    join provincia pp on pp.id = lp.provincia_id
                    join provincia pd on pd.id = ld.provincia_id
                    join estado_proforma ep on ep.id = p.estado
                        where j.chofer_id = 4
                        and p.estado = 2;