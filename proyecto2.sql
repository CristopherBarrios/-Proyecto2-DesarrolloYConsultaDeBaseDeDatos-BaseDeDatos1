--tabla login para el login
CREATE TABLE login (
  id SERIAL PRIMARY KEY,
  usuar varchar(50),
  password varchar(50),
  email varchar(50),
  pasadmin varchar(50)
);

--Esta tabla solo es de prueba para inserciones de la base de datos
CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  health_unit VARCHAR(20) NOT NULL,
  information TEXT,
  date_added DATE NOT NULL
);

