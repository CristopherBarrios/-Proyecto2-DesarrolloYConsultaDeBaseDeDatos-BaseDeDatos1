--tabla login para el login
CREATE TABLE login (
  id SERIAL PRIMARY KEY,
  usuar varchar(50),
  password varchar(50),
  email varchar(50),
  pasadmin varchar(50)
);

CREATE TRIGGER bit_log
	after update or insert or delete
	on login
	for each statement
	execute procedure fill_bitacora();

--Esta tabla solo es de prueba para inserciones de la base de datos
CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  health_unit VARCHAR(20) NOT NULL,
  information TEXT,
  date_added DATE NOT NULL
);

CREATE TRIGGER bit_user
	after update or insert or delete
	on users
	for each statement
	execute procedure fill_bitacora();

create table paciente(
	pac_id SERIAL,
	nombre varchar(30),
	apellido varchar(30),
	IMC float,
	altura float,
	peso float, 
	adicciones INT CHECK (adicciones between 0 and 1),
	telefono varchar(8),
	dirección varchar(50),
	PRIMARY KEY(pac_id)
);

CREATE TRIGGER bit_pac
	after update or insert or delete
	on paciente
	for each statement
	execute procedure fill_bitacora();

create table estado(
	paciente INT REFERENCES paciente(pac_id),
	estado VARCHAR(9) CHECK(UPPER(estado) = 'CURADO' or UPPER(estado) = 'ENFERMO' OR UPPER(estado) = 'FALLECIDO')
);

CREATE TRIGGER bit_est
	after update or insert or delete
	on estado
	for each statement
	execute procedure fill_bitacora();

create table medico(
	medico_id SERIAL,
	nombre varchar(30),
	apellido varchar(30),
	telefono varchar(8),
	dirección varchar(50),
	numero_colegiado varchar(12),
	especialidad varchar(15),
	Primary Key(medico_id)
);

CREATE TRIGGER bit_med
	after update or insert or delete
	on medico
	for each statement
	execute procedure fill_bitacora();

create table establecimiento(
	estab_id SERIAL PRIMARY KEY,
	nombre varchar(30),
	direccion varchar(30),
	tipo varchar(25) DEFAULT 'Hospital' CHECK (upper(tipo) = 'HOSPITAL' or upper(tipo) = 'CLINICA' or (tipo = 'CENTRO DE SALUD'))
);

CREATE TRIGGER bit_estab
	after update or insert or delete
	on establecimiento
	for each statement
	execute procedure fill_bitacora();
 
create table insumos(
	insumo_id SERIAL PRIMARY KEY,
	tipo VARCHAR(10) CHECK (upper(tipo) = 'MEDICINA' OR upper(tipo) = 'UTENSILIO'),
	nombre VARCHAR(20)
);

CREATE TRIGGER bit_ins
	after update or insert or delete
	on insumos
	for each statement
	execute procedure fill_bitacora();

create table inventario(
	establecimiento INT PRIMARY KEY REFERENCES establecimiento(estab_id),
	insumos INT REFERENCES insumos(insumo_id),
	cantidad INT,
	caduca DATE
);

CREATE TRIGGER bit_inv
	after update or insert or delete
	on inventario
	for each statement
	execute procedure fill_bitacora();

create table trabajo(
	establecimiento INT REFERENCES establecimiento(estab_id),
	medico INT REFERENCES medico(medico_id)
);
CREATE TRIGGER bit_trab
	after update or insert or delete
	on trabajo
	for each statement
	execute procedure fill_bitacora();

create table cita(
	numero SERIAL PRIMARY KEY,
	paciente INT REFERENCES paciente(pac_id),
	establecimiento INT REFERENCES establecimiento(estab_id),
	fecha DATE
);

CREATE TRIGGER bit_cita
	after update or insert or delete
	on cita
	for each statement
	execute procedure fill_bitacora();

create table enfermedad(
	enfermedad_id SERIAL PRIMARY KEY,
	nombre varchar(50)
);

CREATE TRIGGER bit_enf
	after update or insert or delete
	on enfermedad
	for each statement
	execute procedure fill_bitacora();

create table Diagnostico(
	diagnostico_id SERIAL PRIMARY KEY,
	enfermedad INT REFERENCES enfermedad(enfermedad_id),
	evolucion TEXT DEFAULT 'Ninguna',
	paciente INT REFERENCES paciente(pac_id),
	medico INT REFERENCES medico(medico_id)
);

CREATE TRIGGER bit_dia
	after update or insert or delete
	on diagnostico
	for each statement
	execute procedure fill_bitacora();

create table Resultado(
	resultado VARCHAR(20) DEFAULT 'No Curado' 
	CHECK (UPPER(resultado) = 'CURADO' or UPPER(resultado) = 'NO CURADO' or UPPER(resultado) = 'FALLECIDO'
		   OR UPPER(resultado) = 'SIN INFORMACION'),
	diagnostico INT REFERENCES diagnostico(diagnostico_id)
);

CREATE TRIGGER bit_res
	after update or insert or delete
	on resultado
	for each statement
	execute procedure fill_bitacora();

create table Examenes(
	examen_id SERIAL PRIMARY KEY,
	nombre varchar(20)
);

CREATE TRIGGER bit_exa
	after update or insert or delete
	on examenes
	for each statement
	execute procedure fill_bitacora();

create table Cirugia(
	cirugia_id SERIAL PRIMARY KEY,
	nombre varchar(20)
);

CREATE TRIGGER bit_cir
	after update or insert or delete
	on cirugia
	for each statement
	execute procedure fill_bitacora();

create table Procedimientos(
	proced_id SERIAL PRIMARY KEY,
	tipo varchar(7) CHECK (UPPER(tipo) = 'EXAMEN' OR UPPER(tipo) = 'CIRUGIA' ),
	id_tipo INT,
	medico VARCHAR(30),
	paciente VARCHAR(30),
	CONSTRAINT fk_procex FOREIGN KEY(id_tipo) REFERENCES Examenes(examen_id),
	CONSTRAINT fk_procig FOREIGN KEY(id_tipo) REFERENCES Cirugia(cirugia_id)
);

CREATE TRIGGER bit_proced
	after update or insert or delete
	on procedimientos
	for each statement
	execute procedure fill_bitacora();

create table bitacora(
	tabla VARCHAR(30),
	accion VARCHAR (10),
	fecha DATE,
	descripcion TEXT
);

create or replace function fill_bitacora()
returns trigger
LANGUAGE PLPGSQL
AS 
$BODY$
BEGIN
	IF OLD IS NOT NULL THEN INSERT INTO bitacora values( TG_TABLE_NAME, TG_OP, NOW(),  NEW);
	ELSE INSERT INTO bitacora values( TG_TABLE_NAME, TG_OP, NOW());
	END IF;
	
	RETURN NULL;
END;
$BODY$














