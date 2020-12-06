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
	fecha_nacimiento date,
	eliminado BOOLEAN
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

insert into usuario(dni, nombreUsuario, contrasenia, nombre, apellido, fecha_nacimiento,eliminado)
values(123, 'admin','202cb962ac59075b964b07152d234b70','ABC','CBA', 19940918, false),
(124, 'segundo','202cb962ac59075b964b07152d234b70','Pewmafe','Fefar', 19940918, false),
(125, 'tercero','202cb962ac59075b964b07152d234b70','Pedro', 'Roco', 19940918, false),
(126, 'cuarto','202cb962ac59075b964b07152d234b70','Armando','Rodriguez', 19981018, false),
(127, 'quinto','202cb962ac59075b964b07152d234b70','Ramiro','Ledez', 19940923, false),
(128, 'sexto','202cb962ac59075b964b07152d234b70','CBZ','CRT', 19920912, false),
(129, 'pew','202cb962ac59075b964b07152d234b70','DFG','QWERTY', 19980908, false);


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
(2, 'gas'),
(3, 'liquido inflamable'),
(4, 'sólidos o sustancias inflamables');

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
(10, 'gas venenoso', 2),
(11, 'líquido con un punto de inflamación no superior a 60,5°C', 3),
(12, 'materiales autorreactivos', 4),
(13, 'explosivos insensibilizados que en estado seco son explosivos', 4),
(14, 'sólidos fácilmente combustibles que pueden provocar un incendio por fricción', 4);

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
######d
insert into direccion( id,	calle,	altura,	localidad) 
values (1,"Ventura Bustos", 1223,1),
(2,"falsa",1212,1),
(3,"verdadera",2223,8);

insert into cliente (cuit, nombre, apellido,telefono, direccion, denominacion)
values (123,"Roberto", "Mangera", 12345678, 1, "Coca Cola");
#####d
insert into estado_proforma 
values (1,'ACTIVO'),
(2,'PENDIENTE'),
(3,'FINALIZADO');

insert into hazard(id, imo_sub_class_id)
values (1, 2);

insert into reefer(id_reefer, temperatura)
values (1, 123);

insert into carga(id, hazard_id, peso_neto, reefer_id, tipo)
values(1, 1, 12.00, 1, 1);

insert into viaje (id, eta, etd, carga_id, acoplado_patente, vehiculo_patente, chofer_id, destino_id, partida_id)
values(1, "2020/12/12 16:02:00", "2020/11/01 03:40:00", 1, "ab456uu", "aa123bb", 4, 3, 2);

insert into proforma (id,cliente_cuit,viaje_id,estado)
values(1, 123, 1, 1),
(2, 123, 1, 2),
(3, 123, 1, 3);


select p.estado as 'estado_proforma', p.id as 'proforma_id', c.nombre as 'nombre_cliente', c.apellido as 'apellido_cliente',
c.email , c.telefono, v.eta ,v.etd ,v.id as 'viaje_id', a.chasis as 'acoplado_chasis',a.patente as 'acoplado_patente',
ta.descripcion as 'tipo_acoplado_desc', ca.hazard_id as 'hazard_carga', ca.peso_neto as 'peso_neto_carga', ca.reefer_id as 'reefeer_id_carga',
tv.descripcion as 'tipo_vehiculo_desc', ve.estado as 'vehiculo_estado', ve.fabricacion as 'vehiculo_fabricacion', 
ve.kilometraje as 'vehiculo_kilometraje', ve.marca as 'vehiculo_marca', ve.modelo as 'vehiculo_modelo', ve.patente as 'vehiculo_patente',
ve.nro_chasis as 'vehiculo_nro_chasis', ve.nro_motor as 'vehiculo_nro_motor', tc.descripcion as 'tipo_carga_desc', dp.altura as 'partida_altura',
dp.calle as 'partida_calle', dd.altura as 'destino_altura', dd.calle as 'destino_calle', lp.descripcion as 'partida_localidad', 
ld.descripcion as 'destino_localidad', pp.descripcion as 'partida_provincia', pd.descripcion 'destino_provincia'
from proforma p 
join cliente c on p.cliente_cuit = c.cuit 
join viaje v on v.id = p.viaje_id 
join carga ca on ca.id = v.carga_id 
join acoplado a on a.patente = v.acoplado_patente 
join vehiculo ve on ve.patente = v.vehiculo_patente 
join direccion dp on v.partida_id = dp.id 
join direccion dd on v.destino_id = dd.id 
join localidad lp on dp.localidad = lp.id 
join localidad ld on dd.localidad = ld.id 
join provincia pp on pp.id = lp.provincia_id 
join provincia pd on pd.id = ld.provincia_id 
join tipo_carga tc on tc.id_tipo_carga = ca.tipo 
join tipo_acoplado ta on ta.id = a.tipo 
join tipo_vehiculo tv on tv.id = ve.tipo 
where v.chofer_id = 1;
