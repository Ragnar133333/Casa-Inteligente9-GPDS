CREATE DATABASE "HOMETECH"
WITH
OWNER=postgres
ENCODING='UTF8'
CONNECTION LIMIT=-1
TABLESPACE = pg_default; 


CREATE TABLE CATEGORIA(
	idCategoria int not null constraint PK_idCategoria primary key,
	nombre varchar(50) not null,
	descripcion varchar(200)
);

CREATE TABLE PRODUCTOS(
	idProducto int not null constraint PK_idProducto primary key,
	categoria varchar(50) not null,
	nombre varchar(50) not null,
	foto bytea,
	descripcion varchar(200),
	precio decimal(10,2) not null,
	idCategoria int, constraint fk_PRODUCTOS_CATEGORIA foreign key(idCategoria) references CATEGORIA(idCategoria)
);

CREATE TABLE ALMACEN(
	cantidadExistente int not null,
	estado boolean,
	idProducto int, constraint fk_ALMACEN_PRODUCTOS foreign key(idProducto) references PRODUCTOS(idProducto)
)

CREATE TABLE VENTAS(
	idVenta int not null constraint PK_idVentas primary key,
	fecha date not null,
	cantidad int not null,
	total decimal(10,2),
	idProducto int, constraint fk_VENTAS_PRODUCTOS foreign key(idProducto) references PRODUCTOS(idProducto)
)

CREATE TABLE DETALLE_VENTAS(
	idDetalleV int not null constraint PK_idDetalleV primary key,
	cantidad decimal(10,2),
	formaPago varchar(50),
	impuestos decimal(10,2),
	precio decimal(10,2),
	idVenta int, constraint fk_DETALLE_VENTAS_VENTAS foreign key(idVenta) references VENTAS(idVenta)
)

CREATE TABLE CLIENTE(
	idCliente int not null constraint PK_idCliente primary key,
	nombre varchar(50),
	apellidos varchar(50),
	pais varchar(50),
	provicia varchar(50),
	direccion varchar(50),
	codP char(5),
	telefono varchar(10),
	correo varchar(50)
)
CREATE TABLE ADMINISTRADOR(
	idAdmin int not null constraint PK_idAdmin primary key,
	nombre varchar(50) not null,
	apellidos varchar(50) not null,
	usuario varchar(10) not null,
	contraseña varchar(10) not null
)