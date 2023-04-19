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
$BODY$;

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


--listo
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


--listo
create table medico(
	medico_id SERIAL,
	nombre varchar(30),
	apellido varchar(30),
	telefono varchar(8),
	dirección varchar(50),
	numero_colegiado varchar(12),
	especialidad varchar(40),
	Primary Key(medico_id)
);

CREATE TRIGGER bit_med
	after update or insert or delete
	on medico
	for each statement
	execute procedure fill_bitacora();

--listo
create table establecimiento(
	estab_id SERIAL PRIMARY KEY,
	nombre varchar(30),
	direccion varchar(30),
	tipo varchar(25) DEFAULT 'Hospital' CHECK (upper(tipo) = 'HOSPITAL' or upper(tipo) = 'CLINICA' or upper(tipo) = 'CENTRO DE SALUD')
);

CREATE TRIGGER bit_estab
	after update or insert or delete
	on establecimiento
	for each statement
	execute procedure fill_bitacora();

--listo 
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

--listo
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

--listo
create table trabajo(
	establecimiento INT REFERENCES establecimiento(estab_id),
	medico INT REFERENCES medico(medico_id)
);
CREATE TRIGGER bit_trab
	after update or insert or delete
	on trabajo
	for each statement
	execute procedure fill_bitacora();

--listo
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


--listo
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

--listo
create table Examenes(
	examen_id SERIAL PRIMARY KEY,
	nombre varchar(20)
);

CREATE TRIGGER bit_exa
	after update or insert or delete
	on examenes
	for each statement
	execute procedure fill_bitacora();

--listo
create table Cirugia(
	cirugia_id SERIAL PRIMARY KEY,
	nombre varchar(20)
);

CREATE TRIGGER bit_cir
	after update or insert or delete
	on cirugia
	for each statement
	execute procedure fill_bitacora();

--listo
create table Procedimientos(
	proced_id SERIAL PRIMARY KEY,
	tipo varchar(7) CHECK (UPPER(tipo) = 'EXAMEN' OR UPPER(tipo) = 'CIRUGIA' ),
	id_tipo INT,
	medico INT REFERENCES medico(medico_id),
	paciente INT REFERENCES medico(medico_id),
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







--POBLAR PACIENTE
INSERT INTO paciente (nombre, apellido, IMC, altura, peso, adicciones, telefono, dirección)
VALUES 
('Maria', 'Gomez', 21.2, 1.7, 56.0, 0, '12345678', 'Calle 1 #123'),
('Pedro', 'Lopez', 25.5, 1.8, 78.0, 0, '23456789', 'Calle 2 #234'),
('Ana', 'Martinez', 32.0, 1.6, 92.0, 1, '34567890', 'Calle 3 #345'),
('Jose', 'Garcia', 23.1, 1.75, 70.0, 0, '45678901', 'Calle 4 #456'),
('Sofia', 'Rodriguez', 27.6, 1.65, 75.0, 1, '56789012', 'Calle 5 #567'),
('Carlos', 'Perez', 19.8, 1.85, 65.0, 0, '67890123', 'Calle 6 #678'),
('Laura', 'Gonzalez', 24.5, 1.7, 70.0, 0, '78901234', 'Calle 7 #789'),
('David', 'Sanchez', 31.2, 1.8, 90.0, 1, '89012345', 'Calle 8 #890'),
('Isabel', 'Hernandez', 28.7, 1.65, 80.0, 0, '90123456', 'Calle 9 #901'),
('Luis', 'Diaz', 22.4, 1.75, 68.0, 0, '01234567', 'Calle 10 #012'),
('Carla', 'Ramirez', 26.1, 1.6, 70.0, 1, '12345670', 'Calle 11 #123'),
('Mario', 'Cruz', 29.8, 1.7, 85.0, 0, '23456701', 'Calle 12 #234'),
('Patricia', 'Torres', 33.5, 1.65, 95.0, 1, '34567812', 'Calle 13 #345'),
('Gabriel', 'Ruiz', 25.9, 1.8, 75.0, 0, '45678923', 'Calle 14 #456'),
('Lucia', 'Alvarez', 27.4, 1.7, 72.0, 0, '56789034', 'Calle 15 #567'),
('Fernando', 'Mendoza', 30.1, 1.75, 88.0, 1, '67890145', 'Calle 16 #678'),
('Mariana', 'Gutierrez', 20.5, 1.6, 60.0, 0, '78901256', 'Calle 17 #829');


--POBLAR MEDICO
INSERT INTO medico (nombre, apellido, telefono, dirección, numero_colegiado, especialidad)
VALUES 
('Juan', 'Perez', '12345678', 'Calle 1 #123', '1234', 'Cardiología'),
('Maria', 'Garcia', '23456789', 'Calle 2 #234', '2345', 'Pediatría'),
('Luis', 'Hernandez', '34567890', 'Calle 3 #345', '3456', 'Oftalmología'),
('Ana', 'Martinez', '45678901', 'Calle 4 #456', '4567', 'Ginecología'),
('Carlos', 'Lopez', '56789012', 'Calle 5 #567', '5678', 'Dermatología'),
('Marta', 'Sanchez', '67890123', 'Calle 6 #678', '6789', 'Neurología'),
('Jorge', 'Gonzalez', '78901234', 'Calle 7 #789', '7890', 'Oncología'),
('Elena', 'Rodriguez', '89012345', 'Calle 8 #890', '8901', 'Traumatología'),
('Rafael', 'Diaz', '90123456', 'Calle 9 #901', '9012', 'Psiquiatría'),
('Isabel', 'Pérez', '01234567', 'Calle 10 #012', '0123', 'Urología'),
('Diego', 'Gomez', '12345670', 'Calle 11 #123', '1235', 'Endocrinología'),
('Lucia', 'Ruiz', '23456701', 'Calle 12 #234', '2346', 'Otorrinolaringología'),
('Mario', 'Torres', '34567812', 'Calle 13 #345', '3457', 'Hematología'),
('Fernanda', 'Alvarez', '45678923', 'Calle 14 #456', '4568', 'Nutrición'),
('Jose', 'Cruz', '56789034', 'Calle 15 #567', '5679', 'Neumología'),
('Sofia', 'Mendoza', '67890145', 'Calle 16 #678', '6780', 'Infectología'),
('Pedro', 'Gutierrez', '78901256', 'Calle 17 #789', '7891', 'Anestesiología');


--POBLAR ESTABLECIMIENTO
INSERT INTO establecimiento (nombre, direccion, tipo)
VALUES 
('Hospital Central', 'Calle 1 #123', 'Hospital'),
('Clinica San Juan', 'Calle 2 #234', 'Clinica'),
('Centro de Salud 24h', 'Calle 3 #345', 'Centro de Salud'),
('Hospital San Francisco', 'Calle 4 #456', 'Hospital'),
('Clinica Santa Maria', 'Calle 5 #567', 'Clinica'),
('Hospital San Gabriel', 'Calle 6 #678', 'Hospital'),
('Centro de Salud Los Alpes', 'Calle 7 #789', 'Centro de Salud'),
('Hospital Santa Elena', 'Calle 8 #890', 'Hospital'),
('Clinica del Norte', 'Calle 9 #901', 'Clinica'),
('Centro de Salud La Floresta', 'Calle 10 #012', 'Centro de Salud'),
('Hospital San Jose', 'Calle 11 #123', 'Hospital'),
('Clinica San Ignacio', 'Calle 12 #234', 'Clinica'),
('Centro de Salud La Colina', 'Calle 13 #345', 'Centro de Salud'),
('Hospital de la Misericordia', 'Calle 14 #456', 'Hospital'),
('Clinica del Sur', 'Calle 15 #567', 'Clinica'),
('Centro de Salud San Blas', 'Calle 16 #678', 'Centro de Salud'),
('Hospital San Agustin', 'Calle 17 #789', 'Hospital'),
('Clinica El Rosario', 'Calle 18 #890', 'Clinica');


--POBLAR INSUMO
INSERT INTO insumos (tipo, nombre)
VALUES
    ('MEDICINA', 'Ibuprofeno'),
    ('MEDICINA', 'Paracetamol'),
    ('MEDICINA', 'Aspirina'),
    ('MEDICINA', 'Amoxicilina'),
    ('MEDICINA', 'Loratadina'),
    ('MEDICINA', 'Omeprazol'),
    ('MEDICINA', 'Dipirona'),
    ('MEDICINA', 'Ciprofloxacino'),
    ('MEDICINA', 'Clonazepam'),
    ('MEDICINA', 'Sertralina'),
    ('UTENSILIO', 'Termómetro'),
    ('UTENSILIO', 'Jeringa'),
    ('UTENSILIO', 'Guantes'),
    ('UTENSILIO', 'Mascarilla'),
    ('UTENSILIO', 'Gasas'),
    ('UTENSILIO', 'Tijeras'),
    ('UTENSILIO', 'Esparadrapo'),
    ('UTENSILIO', 'Lavandina'),
    ('UTENSILIO', 'Alcohol'),
    ('UTENSILIO', 'Pinzas');

alter table inventario drop constraint inventario_pkey;

--POBLAR INVENTARIO
INSERT INTO inventario (establecimiento, insumos, cantidad, caduca)
SELECT 
    e.estab_id,
    i.insumo_id,
    (random()*100)::int,
    CURRENT_DATE + (random()*365)::int * '1 day'::interval
FROM 
    establecimiento e
CROSS JOIN 
    insumos i
LIMIT 150;

-- POBLAR TRABAJO
INSERT INTO trabajo (establecimiento, medico)
SELECT random() * 18 + 1, random() * 17 + 1;



--POBLAR CITA	
																					
INSERT INTO cita(paciente, establecimiento, fecha) 
SELECT
	p.pac_id,
	e.estab_id,
	 CURRENT_DATE + (random()*365)::int * '1 day'::interval
FROM
	paciente p
CROSS JOIN
	establecimiento e
LIMIT 60;

--POBLAR ENFERMEDAD
INSERT INTO enfermedad (nombre) VALUES
('Gripe'),
('Fiebre tifoidea'),
('Hepatitis A'),
('Hepatitis B'),
('Cáncer de mama'),
('Cáncer de próstata'),
('Cáncer de pulmón'),
('Artritis'),
('Asma'),
('EPOC'),
('Alzheimer'),
('Parkinson'),
('Esclerosis múltiple'),
('Enfermedad de Crohn'),
('Colitis ulcerosa'),
('Diabetes tipo 1'),
('Diabetes tipo 2'),
('Hipotiroidismo'),
('Hipertiroidismo'),
('Anemia ferropénica'),
('Leucemia'),
('Linfoma'),
('Sida'),
('VIH'),
('Sífilis'),
('Gonorrea'),
('Clamidia'),
('Herpes genital'),
('Herpes labial'),
('Varicela'),
('Sarampión'),
('Paperas'),
('Rubéola'),
('Tuberculosis'),
('Malaria'),
('Dengue'),
('Zika'),
('Chikungunya'),
('Ébola'),
('Fiebre amarilla'),
('Cólera'),
('Meningitis'),
('Neumonía'),
('Influenza'),
('Rabia'),
('Hantavirus'),
('Fiebre del Nilo Occidental'),
('Fiebre Q'),
('Fiebre del Valle del Rift');

--POBLAR EXAMENES
INSERT INTO Examenes (nombre) VALUES
('Hemograma'),
('Orina'),
('Glucosa'),
('Colesterol'),
('Creatinina'),
('Ácido úrico'),
('Electrocardiograma'),
('Radiografía'),
('Tomografía'),
('Resonancia magnética');

alter table cirugia alter column nombre SET DATA TYPE VARCHAR(40);

--POBLAR CIRUGIA
INSERT INTO Cirugia (nombre) VALUES
('Cirugía de cataratas'),
('Cirugía de apendicitis'),
('Cirugía de hernia'),
('Cirugía de próstata'),
('Cirugía de vesícula'),
('Cirugía de corazón abierto'),
('Cirugía de bypass gástrico'),
('Cirugía de reemplazo de rodilla'),
('Cirugía de reemplazo de cadera'),
('Cirugía de tumor cerebral'),
('Cirugía de tiroides'),
('Cirugía de columna vertebral'),
('Cirugía de cáncer de mama'),
('Cirugía de cáncer de colon'),
('Cirugía de útero'),
('Cirugía de ovarios'),
('Cirugía de próstata'),
('Cirugía de páncreas'),
('Cirugía de hígado'),
('Cirugía de riñón'),
('Cirugía de estómago'),
('Cirugía de colon'),
('Cirugía de recto'),
('Cirugía de aneurisma'),
('Cirugía de vesícula biliar'),
('Cirugía de divertículos'),
('Cirugía de fractura de hueso'),
('Cirugía de endometriosis'),
('Cirugía de escoliosis'),
('Cirugía de cadera'),
('Cirugía de mano'),
('Cirugía de pie'),
('Cirugía de oído'),
('Cirugía de nariz'),
('Cirugía de garganta'),
('Cirugía de laringe'),
('Cirugía de labio leporino'),
('Cirugía de paladar hendido'),
('Cirugía de reconstrucción facial'),
('Cirugía plástica'),
('Cirugía de glaucoma'),
('Cirugía de miopía'),
('Cirugía de astigmatismo'),
('Cirugía de hipermetropía');



--POBLAR PROCEDIMIENTOS
INSERT INTO Procedimientos (tipo, id_tipo, medico, paciente)
VALUES 
('Examen', 1, 1, 1),
('Cirugia', 1, 2, 2),
('Examen', 2, 3, 3),
('Cirugia', 2, 4, 4),
('Examen', 3, 5, 5),
('Cirugia', 3, 6, 6),
('Examen', 4, 7, 7),
('Cirugia', 4, 8, 8),
('Examen', 5, 9, 9),
('Cirugia', 5, 10, 10),
('Examen', 6, 1, 2),
('Cirugia', 6, 2, 3),
('Examen', 7, 3, 4),
('Cirugia', 7, 4, 5),
('Examen', 8, 5, 6),
('Cirugia', 8, 6, 7),
('Examen', 9, 7, 8),
('Cirugia', 9, 8, 9),
('Examen', 10, 9, 10),
('Cirugia', 10, 10, 1),
('Examen', 1, 2, 3),
('Cirugia', 1, 3, 4),
('Examen', 2, 4, 5),
('Cirugia', 2, 5, 6),
('Examen', 3, 6, 7),
('Cirugia', 3, 7, 8),
('Examen', 4, 8, 9),
('Cirugia', 4, 9, 10),
('Examen', 5, 10, 1),
('Cirugia', 5, 1, 2);




