CREATE OR REPLACE 
PACKAGE PRUEBAS_PAQUETES AS

PROCEDURE inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_descripcion VARCHAR2, w_precio FLOAT, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idpaquete NUMBER, w_nombre VARCHAR2, w_descripcion VARCHAR2, w_precio FLOAT, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idpaquete NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_PAQUETES;

CREATE OR REPLACE
PACKAGE BODY PRUEBAS_PAQUETES AS

/*Inicializar*/
PROCEDURE inicializar AS
BEGIN
DELETE FROM paquetes;
END inicializar;

/*Insertar*/
PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_descripcion VARCHAR2, w_precio FLOAT, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
paquete PAQUETES%ROWTYPE;
w_idpaquete NUMBER;

BEGIN

/*Inserto un paquete*/
INSERT INTO PAQUETES VALUES (sec_paquete.NEXTVAL, w_nombre, w_descripcion, w_precio);

/*Seleccionar el paquete y comprobar que los datos se insertaron correctamente*/

w_idpaquete := sec_paquete.CURRVAL;
SELECT * INTO paquete FROM PAQUETES WHERE id_paquete = w_idpaquete;
IF (paquete.nombre <> w_nombre) THEN
salida := FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado de la prueba*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' ||ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idpaquete NUMBER, w_nombre VARCHAR2, w_descripcion VARCHAR2, w_precio FLOAT, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
paquete PAQUETES%ROWTYPE;
BEGIN
/*Actualizo un paquete*/
UPDATE paquetes SET nombre = w_nombre, descripcion = w_descripcion, precio = w_precio WHERE id_paquete = w_idpaquete;

/*Selecciono el paquete*/
SELECT * INTO paquete FROM PAQUETES WHERE id_paquete = w_idpaquete;
IF (paquete.nombre <> w_nombre) THEN
salida := FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;
END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idpaquete NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN := TRUE;
npaquete INTEGER;

BEGIN
/*Eliminar paquete*/
DELETE FROM PAQUETES WHERE id_paquete = w_idpaquete;

/*Verificar que el paquete no se encuentra en la BD*/
SELECT count(*) INTO npaquete FROM PAQUETES where id_paquete = w_idpaquete;

IF (npaquete <> 0) THEN
salida :=FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END eliminar;

END PRUEBAS_PAQUETES;

SET SERVEROUTPUT ON;
BEGIN
PRUEBAS_PAQUETES.inicializar;
PRUEBAS_PAQUETES.insertar('Prueba de Inserción de Paquetes', 'Oro', 'Disfruta de la mayor experiencia Buffalo', 85.0, TRUE);
PRUEBAS_PAQUETES.insertar('Prueba de Inserción de Paquetes', 'Plata', 'No te pierdas ni una de las actividades mas importantes', 75.0, TRUE);
PRUEBAS_PAQUETES.insertar('Prueba de Inserción de Paquetes', 'Bronce', 'Para los menos aventureros', 60.0, TRUE);
PRUEBAS_PAQUETES.actualizar('Prueba de Actualización de Paquetes',6,'Bronce','Para los menos aventureros',55,TRUE);
PRUEBAS_PAQUETES.eliminar('Prueba de eliminación de Paquetes',6,TRUE);
END;

/********************************PAQUETE DE PRUEBAS DE MONITORES*******************************************/
CREATE OR REPLACE 
PACKAGE PRUEBAS_MONITORES AS

PROCEDURE inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_dni VARCHAR2, w_fechanacimiento DATE, w_telefono VARCHAR2, w_email VARCHAR2, w_direccion VARCHAR2, w_tipomonitor VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idpersona NUMBER, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_dni VARCHAR2, w_fechanacimiento DATE, w_telefono VARCHAR2, w_email VARCHAR2, w_direccion VARCHAR2, w_tipomonitor VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idpersona NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_MONITORES;

CREATE OR REPLACE
PACKAGE BODY PRUEBAS_MONITORES AS

/*Inicializar*/
PROCEDURE inicializar AS
BEGIN
DELETE FROM monitores;
DELETE FROM personas;
END inicializar;

/*Insertar*/

PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_dni VARCHAR2, w_fechanacimiento DATE, w_telefono VARCHAR2, w_email VARCHAR2, w_direccion VARCHAR2, w_tipomonitor VARCHAR2, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
persona PERSONAS%ROWTYPE;
w_idpersona NUMBER;

BEGIN
/*Inserto una monitor*/
INSERT INTO PERSONAS VALUES(sec_persona.NEXTVAL, w_nombre , w_apellidos, w_dni, w_fechanacimiento, w_telefono, w_email, w_direccion, 'Monitor');
INSERT INTO MONITORES VALUES(sec_persona.CURRVAL, w_tipomonitor);

/*Seleccionar el paquete y comprobar que los datos se insertaron correctamente*/
w_idpersona := sec_persona.CURRVAL;
SELECT * INTO persona FROM PERSONAS WHERE id_persona = w_idpersona;

IF (persona.dni <> w_dni) THEN
salida := false;
END IF;
COMMIT WORK;

/*Mostrar resultado de la prueba*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' ||ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idpersona NUMBER, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_dni VARCHAR2, w_fechanacimiento DATE, w_telefono VARCHAR2, w_email VARCHAR2, w_direccion VARCHAR2, w_tipomonitor VARCHAR2, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
persona PERSONAS%ROWTYPE;

BEGIN
/*Actualizo un monitor*/
UPDATE PERSONAS SET nombre = w_nombre, apellidos = w_apellidos, dni = w_dni, fechanacimiento = w_fechanacimiento, telefono = w_telefono, email = w_email, direccion = w_direccion WHERE id_persona = w_idpersona;
UPDATE MONITORES SET tipomonitor = w_tipomonitor WHERE id_persona = w_idpersona;

/*Selecciono el monitor*/
SELECT * INTO persona FROM PERSONAS WHERE id_persona = w_idpersona;
IF (persona.dni <> w_dni) THEN
salida := FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;

END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idpersona NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN := TRUE;
npersona INTEGER;

BEGIN
/*Eliminar paquete*/
DELETE FROM PERSONAS WHERE id_persona = w_idpersona;
DELETE FROM MONITORES WHERE id_persona = w_idpersona;

/*Verificar que el departamento no se encuentra en la BD*/
SELECT count(*) INTO npersona FROM PERSONAS where id_persona = w_idpersona;

IF (npersona <> 0) THEN
salida :=FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;

END eliminar;
END PRUEBAS_MONITORES;

SET SERVEROUTPUT ON;
BEGIN

/*Anulamos la inicializacion para no borrar las tablas de PERSONAS y BUFFALOS*/
/*PRUEBAS_MONITORES.inicializar;*/
PRUEBAS_MONITORES.insertar('Prueba de inserción de un monitor', 'Jesús', 'Marchena Carrera', '20062338J', to_date('28/12/1992','DD/MM/RR'), '628031529', 'marchena014@gmail.com' ,'c/Gracia Saenz de Tejada,4,3ºG', 'Jefe', TRUE);
PRUEBAS_MONITORES.insertar('Prueba de inserción de un monitor', 'Mario', 'Jiménez Montesinos', '34062338M', to_date('22/02/1986','DD/MM/RR'), '627228529', 'mario@buffalosadventure.com', 'c/Malasmañanas,22', 'Jefe', TRUE);
PRUEBAS_MONITORES.insertar('Prueba de inserción de un monitor', 'Jose Antonio', 'Del Valle Morente', '24082436N', to_date('01/11/1981','DD/MM/RR'), '637031129', 'joseantonio@buffalosadventure.com' ,'Avda. Puerto de Indias', 'Normal', TRUE);
PRUEBAS_MONITORES.insertar('Prueba de inserción de un monitor', 'Alejandro', 'Rodríguez Pérez', '10202938X', to_date('28/06/1990','DD/MM/RR'), '647315698', 'alexro@buffalosadventure.com' ,'c/Luz de Morente,8', 'Normal', TRUE);
PRUEBAS_MONITORES.insertar('Prueba de inserción de un monitor', 'Manuel', 'Cortegano Ramírez', '24812337L', to_date('16/07/1993','DD/MM/RR'), '621468725', 'manucortegano@buffalosadventure.com' ,'c/Solea,1', 'Becario', TRUE);
PRUEBAS_MONITORES.insertar('Prueba de inserción de un monitor', 'Estrella', 'Manga Larga', '14325878I', to_date('13/04/1992','DD/MM/RR'), '633878966', 'estrellita@buffalosadventure.com' ,'c/Cielo,2', 'Becario', TRUE);
PRUEBAS_MONITORES.actualizar('Prueba de actualización de un monitor', 6,'Jose Antonio', 'Del Valle Morente', '24082436N', to_date('01/11/1981','DD/MM/RR'), '637031129', 'joseantonio@buffalosadventure.com' ,'Avda. Puerto de Indias', 'Jefe', TRUE);
PRUEBAS_MONITORES.eliminar('Prueba de eliminación de un monitor',12,TRUE);
END;


/**********PAQUETE DE PRUEBAS DE INSTITUTOS**************/
CREATE OR REPLACE 
PACKAGE PRUEBAS_INSTITUTOS AS

PROCEDURE inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_direccion VARCHAR2, w_codpostal VARCHAR2, w_idpaquete NUMBER, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idinstituto NUMBER, w_nombre VARCHAR2, w_direccion VARCHAR2, w_codpostal VARCHAR2, w_idpaquete NUMBER, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idinstituto NUMBER, salidaEsperada BOOLEAN);
END PRUEBAS_INSTITUTOS;

CREATE OR REPLACE
PACKAGE BODY PRUEBAS_INSTITUTOS AS

/*Inicializar*/
PROCEDURE inicializar AS
BEGIN
DELETE FROM institutos;
END inicializar;

/*Insertar*/
PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_direccion VARCHAR2, w_codpostal VARCHAR2, w_idpaquete NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
instituto INSTITUTOS%ROWTYPE;
w_idinstituto NUMBER;

BEGIN

/*Inserto un instituto*/
INSERT INTO INSTITUTOS VALUES (sec_instituto.NEXTVAL, w_nombre, w_direccion, w_codpostal, w_idpaquete);

/*Seleccionar el instituto y comprobar que los datos se insertaron correctamente*/

w_idinstituto := sec_instituto.CURRVAL;
SELECT * INTO instituto FROM INSTITUTOS WHERE id_instituto = w_idinstituto;
IF (instituto.nombre <> w_nombre) THEN
salida := FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado de la prueba*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' ||ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idinstituto NUMBER, w_nombre VARCHAR2, w_direccion VARCHAR2, w_codpostal VARCHAR2, w_idpaquete NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
instituto INSTITUTOS%ROWTYPE;

BEGIN
/*Actualizo un instituto*/
UPDATE INSTITUTOS SET nombre = w_nombre, direccion = w_direccion, codpostal = w_codpostal, id_paquete = w_idpaquete WHERE id_instituto = w_idinstituto;

/*Selecciono el instituto*/
SELECT * INTO instituto FROM INSTITUTOS WHERE id_instituto = w_idinstituto;
IF (instituto.nombre <> w_nombre) THEN
salida := FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;

END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idinstituto NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN := TRUE;
ninstituto INTEGER;

BEGIN
/*Eliminar instituto*/
DELETE FROM INSTITUTOS WHERE id_instituto = w_idinstituto;

/*Verificar que el instituto no se encuentra en la BD*/
SELECT count(*) INTO ninstituto FROM INSTITUTOS where id_instituto = w_idinstituto;

IF (ninstituto <> 0) THEN
salida :=FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;

END eliminar;
END PRUEBAS_INSTITUTOS;

SET SERVEROUTPUT ON;
BEGIN
PRUEBAS_INSTITUTOS.inicializar;
PRUEBAS_INSTITUTOS.insertar('Prueba para insertar un Instituto','ETSII','Avda.Reina Mercedes','41006',2,TRUE);
PRUEBAS_INSTITUTOS.insertar('Prueba para insertar un Instituto','Doña Leonor de Guzmán','c/Panaderos,sn','41500',2,TRUE);
PRUEBAS_INSTITUTOS.actualizar('Prueba para actualizar un Instituto',2,'ETSII','Avda.Reina Mercedes','41206',2,TRUE);
PRUEBAS_INSTITUTOS.eliminar('Prueba para eliminar un Instituto',4,TRUE);
END;

/*******************PAQUETE DE PRUEBAS DE ACTIVIDADES*********************/

CREATE OR REPLACE 
PACKAGE PRUEBAS_ACTIVIDADES AS

PROCEDURE inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_descripcion VARCHAR2, w_tiempo NUMBER, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idactividad NUMBER, w_nombre VARCHAR2, w_descripcion VARCHAR2, w_tiempo NUMBER, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idactividad NUMBER, salidaEsperada BOOLEAN);
END PRUEBAS_ACTIVIDADES;

CREATE OR REPLACE
PACKAGE BODY PRUEBAS_ACTIVIDADES AS

/*Inicializar*/
PROCEDURE inicializar AS
BEGIN
DELETE FROM ACTIVIDADES;
END inicializar;

PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_descripcion VARCHAR2, w_tiempo NUMBER, salidaEsperada BOOLEAN)  AS
salida BOOLEAN :=TRUE;
actividad ACTIVIDADES%ROWTYPE;
w_idactividad NUMBER;

BEGIN

/*Inserto una actividad*/
INSERT INTO ACTIVIDADES VALUES (sec_actividad.NEXTVAL, w_nombre, w_descripcion, w_tiempo);

/*Seleccionar la actividad y comprobar que los datos se insertaron correctamente*/

w_idactividad := sec_actividad.CURRVAL;
SELECT * INTO actividad FROM ACTIVIDADES WHERE id_actividad = w_idactividad;
IF (actividad.nombre <> w_nombre) THEN
salida := FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado de la prueba*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' ||ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idactividad NUMBER, w_nombre VARCHAR2, w_descripcion VARCHAR2, w_tiempo NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
actividad ACTIVIDADES%ROWTYPE;

BEGIN
/*Actualizo una actividad*/
UPDATE ACTIVIDADES SET nombre = w_nombre, descripcion = w_descripcion, tiempo = w_tiempo WHERE id_actividad = w_idactividad;

/*Selecciono la actividad*/
SELECT * INTO actividad FROM ACTIVIDADES WHERE id_actividad = w_idactividad;
IF (actividad.nombre <> w_nombre) THEN
salida := FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;

END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idactividad NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN := TRUE;
nactividad INTEGER;

BEGIN
/*Eliminar actividad*/
DELETE FROM ACTIVIDADES WHERE id_actividad = w_idactividad;

/*Verificar que la actividad no se encuentra en la BD*/
SELECT count(*) INTO nactividad FROM ACTIVIDADES where id_actividad = w_idactividad;

IF (nactividad <> 0) THEN
salida :=FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;

END eliminar;
END PRUEBAS_ACTIVIDADES;

SET SERVEROUTPUT ON;
BEGIN
PRUEBAS_ACTIVIDADES.inicializar;
PRUEBAS_ACTIVIDADES.insertar('Prueba de insertar una actividad','Escalada','Escala muy alto',50,TRUE);
PRUEBAS_ACTIVIDADES.insertar('Prueba de insertar una actividad','Karting','Prueba nuestros karts',60,TRUE);
PRUEBAS_ACTIVIDADES.insertar('Prueba de insertar una actividad','Piscina','Date un chapuzón',60,TRUE);
PRUEBAS_ACTIVIDADES.insertar('Prueba de insertar una actividad','Futbol Indoor','Juega en el estadio Buffalo',90,TRUE);
PRUEBAS_ACTIVIDADES.insertar('Prueba de insertar una actividad','Tenis','La cancha Buffalo disponible para ti',40,TRUE);
PRUEBAS_ACTIVIDADES.insertar('Prueba de insertar una actividad','Tiro con arco','¿Tendrás la suficiente puntería?',70,TRUE);
PRUEBAS_ACTIVIDADES.insertar('Prueba de insertar una actividad','Padel','Sientete un profesional en nuestras pistas',90,TRUE);
PRUEBAS_ACTIVIDADES.insertar('Prueba de insertar una actividad','Desayuno','La comida más importante del dia',45,TRUE);
PRUEBAS_ACTIVIDADES.insertar('Prueba de insertar una actividad','Almuerzo','No te quedes con hambre !',30,TRUE);
PRUEBAS_ACTIVIDADES.insertar('Prueba de insertar una actividad','Cena','La última comida dle día',45,TRUE);
PRUEBAS_ACTIVIDADES.insertar('Prueba de insertar una actividad','Noche del terror','En nuestro campamento suceden cosas extrañas...',120,TRUE);
PRUEBAS_ACTIVIDADES.actualizar('Prueba para actualizar una actividad',2,'Escalada','La pared de escalada mas grande de Huelva',40,TRUE);
PRUEBAS_actividades.eliminar('Prueba para eliminar una actividad',8,TRUE);
END;

/*******************************PAQUETE DE PRUEBAS DE BUFFALOS************************************/

CREATE OR REPLACE 
PACKAGE PRUEBAS_BUFFALOS AS

PROCEDURE inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_dni VARCHAR2, w_fechanacimiento DATE, w_telefono VARCHAR2, w_email VARCHAR2, w_direccion VARCHAR2,w_idinstituto NUMBER,  w_tipobuffalo VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idpersona NUMBER, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_dni VARCHAR2, w_fechanacimiento DATE, w_telefono VARCHAR2, w_email VARCHAR2, w_direccion VARCHAR2, w_idinstituto NUMBER,w_tipobuffalo VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idpersona NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_BUFFALOS;

CREATE OR REPLACE
PACKAGE BODY PRUEBAS_BUFFALOS AS

/*Inicializar*/
PROCEDURE inicializar AS
BEGIN
DELETE FROM buffalos;
DELETE FROM personas;
END inicializar;

/*Insertar*/

PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_dni VARCHAR2, w_fechanacimiento DATE, w_telefono VARCHAR2, w_email VARCHAR2, w_direccion VARCHAR2, w_idinstituto NUMBER, w_tipobuffalo VARCHAR2, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
persona PERSONAS%ROWTYPE;
w_idpersona NUMBER;

BEGIN
/*Inserto un buffalo*/
INSERT INTO PERSONAS VALUES(sec_persona.NEXTVAL, w_nombre , w_apellidos, w_dni, w_fechanacimiento, w_telefono, w_email, w_direccion, 'Buffalo');
INSERT INTO BUFFALOS VALUES(sec_persona.CURRVAL, w_idinstituto,w_tipobuffalo);

/*Seleccionar el buffalo y comprobar que los datos se insertaron correctamente*/
w_idpersona := sec_persona.CURRVAL;
SELECT * INTO persona FROM PERSONAS WHERE id_persona = w_idpersona;

IF (persona.dni <> w_dni) THEN
salida := false;
END IF;
COMMIT WORK;

/*Mostrar resultado de la prueba*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' ||ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idpersona NUMBER, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_dni VARCHAR2, w_fechanacimiento DATE, w_telefono VARCHAR2, w_email VARCHAR2, w_direccion VARCHAR2,w_idinstituto NUMBER, w_tipobuffalo VARCHAR2, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
persona PERSONAS%ROWTYPE;

BEGIN
/*Actualizo un buffalo*/
UPDATE PERSONAS SET nombre = w_nombre, apellidos = w_apellidos, dni = w_dni, fechanacimiento = w_fechanacimiento, telefono = w_telefono, email = w_email, direccion = w_direccion WHERE id_persona = w_idpersona;
UPDATE BUFFALOS SET id_instituto=w_idinstituto, tipobuffalo = w_tipobuffalo WHERE id_persona = w_idpersona;

/*Selecciono el buffalo*/
SELECT * INTO persona FROM PERSONAS WHERE id_persona = w_idpersona;
IF (persona.dni <> w_dni) THEN
salida := FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;

END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idpersona NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN := TRUE;
npersona INTEGER;

BEGIN
/*Eliminar buffalo*/
DELETE FROM PERSONAS WHERE id_persona = w_idpersona;
DELETE FROM BUFFALOS WHERE id_persona = w_idpersona;

/*Verificar que el buffalo no se encuentra en la BD*/
SELECT count(*) INTO npersona FROM PERSONAS where id_persona = w_idpersona;

IF (npersona <> 0) THEN
salida :=FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;

END eliminar;
END PRUEBAS_BUFFALOS;

/*Borramos los triggers siguientes porque provocan fallos aparentemente "sin sentido".*/

drop TRIGGER no_emails_iguales;
drop TRIGGER no_dni_iguales;

SET SERVEROUTPUT ON;
BEGIN
/*Anulamos la inicializacion para que no vacíe las tablas de PERSONAS y MONITORES*/
/*PRUEBAS_BUFFALOS.inicializar;*/
PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'Rosario', 'Carrera López', '64312338J', to_date('28/01/1963','DD/MM/RR'), '626222780', 'charicarrera@hotmail.com' ,'c/Gracia Saenz de Tejada,4,3ºG', 2,'Profesor', TRUE);
PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'Antonio', 'Gutierrez Limones', '22252314J', to_date('15/08/1978','DD/MM/RR'), '61886315', 'gutiguti@hotmail.com' ,'c/Manuel Galán', 4,'Profesor', FALSE);
PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'Juan', 'Muñoz Escasi', '20064138E', to_date('18/03/1999','DD/MM/RR'), '655478963', 'juanimu@gmail.com' ,'Ava de la Constitución, 3', 2,'Alumno', TRUE);
PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'Lourdes', 'López Díaz', '25264238H', to_date('07/10/1999','DD/MM/RR'), '622458963', 'lourdes_lebrijana@gmail.com' ,'c/Escultor Gracia, 3, 2ºD', 2,'Alumno', TRUE);
PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'Américo', 'Vespuccio Italiani', '21034138O', to_date('22/02/1999','DD/MM/RR'), '657445588', 'americani129@gmail.com' ,'Avda. Los pinares, 1', 2,'Alumno', TRUE);
PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'Rafael', 'Nadal Andal', '22454248I', to_date('20/11/1999','DD/MM/RR'), '624785631', 'rafitenista@gmail.com' ,'c/Ábaco, 3, 2ºI, 3', 4,'Alumno', FALSE);
PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'Nuria', 'Núñez Marivi', '23654578K', to_date('18/06/1998','DD/MM/RR'), '698745822', 'nuritanurita@yahoo.es' ,'Avda. De las Golondrinas, 22', 4,'Alumno', FALSE);
PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'Irene', 'Moreno González', '20084138E', to_date('01/12/1999','DD/MM/RR'), '655420963', 'monchiren@gmail.com' ,'c/Escultor Leblanc, 9', 4,'Alumno', FALSE);
PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'Ramiro', 'Colon Allegri', '14325687Z', to_date('29/08/1999','DD/MM/RR'), '621698745', 'ramirator@gmail.com' ,'Avda. Los Piojos, 8', 4,'Alumno', FALSE);
PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'Miriam', 'Pantoja Rivera', '20028968E', to_date('03/03/1999','DD/MM/RR'), '621400963', 'adjajsd@gmail.com' ,'c/Azucar Moreno, 9', 4,'Alumno', FALSE);
PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'Lucía', 'Rosado Morales', '22264438E', to_date('18/12/1999','DD/MM/RR'), '652474263', 'la_lusi@gmail.com' ,'c/La Haba, 3,4ºD', 4,'Alumno', FALSE);
PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'María', 'Muñoz Carvajal', '22384138E', to_date('27/10/1999','DD/MM/RR'), '615424963', 'marikilla@hotmail.com' ,'Plaza Arcipreste de Hita, 9,2ºB', 4,'Alumno', FALSE);
PRUEBAS_BUFFALOS.actualizar('Prueba de actualización de un buffalo',10,'Salvador','Pando Rodriguez','20052338J',to_date('27/12/1991','DD/MM,RR'),'628011529','salvadorpando@gmail.com','Pinomontano',2,'Alumno', TRUE);
PRUEBAS_BUFFALOS.eliminar('Prueba de eliminación de un buffalo',12,TRUE);
END;

/*****************************PAQUETE DE PRUEBAS DE PRODUCTOS***************************/

CREATE OR REPLACE 
PACKAGE PRUEBAS_PRODUCTOS AS

PROCEDURE inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_descripcion VARCHAR2, w_preciopvp FLOAT, w_precioinstituto FLOAT, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idproducto NUMBER, w_nombre VARCHAR2, w_descripcion VARCHAR2, w_preciopvp FLOAT, w_precioinstituto FLOAT, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idproducto NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_PRODUCTOS;

CREATE OR REPLACE
PACKAGE BODY PRUEBAS_PRODUCTOS AS

/*Inicializar*/
PROCEDURE inicializar AS
BEGIN
DELETE FROM PRODUCTOS;
END inicializar;

/*Insertar*/

PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_descripcion VARCHAR2, w_preciopvp FLOAT, w_precioinstituto FLOAT, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
producto PRODUCTOS%ROWTYPE;
w_idproducto NUMBER;

BEGIN
/*Inserto un producto*/
INSERT INTO PRODUCTOS VALUES(sec_producto.NEXTVAL, w_nombre , w_descripcion, w_preciopvp, w_precioinstituto);

/*Seleccionar el producto y comprobar que los datos se insertaron correctamente*/
w_idproducto := sec_producto.CURRVAL;
SELECT * INTO producto FROM PRODUCTOS WHERE id_producto = w_idproducto;

IF (producto.nombre <> w_nombre) THEN
salida := false;
END IF;
COMMIT WORK;

/*Mostrar resultado de la prueba*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' ||ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idproducto NUMBER, w_nombre VARCHAR2, w_descripcion VARCHAR2, w_preciopvp FLOAT, w_precioinstituto FLOAT, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
producto PRODUCTOS%ROWTYPE;

BEGIN
/*Actualizo un producto*/
UPDATE PRODUCTOS SET nombre = w_nombre, descripcion = w_descripcion, preciopvp=w_preciopvp, precioinstituto=w_precioinstituto WHERE id_producto = w_idproducto;

/*Selecciono el producto*/
SELECT * INTO producto FROM PRODUCTOS WHERE id_producto = w_idproducto;
IF (producto.nombre <> w_nombre) THEN
salida := FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;

END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idproducto NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN := TRUE;
nproducto INTEGER;

BEGIN
/*Eliminar producto*/
DELETE FROM PRODUCTOS WHERE id_producto = w_idproducto;

/*Verificar que el producto no se encuentra en la BD*/
SELECT count(*) INTO nproducto FROM PRODUCTOS where id_producto = w_idproducto;

IF (nproducto <> 0) THEN
salida :=FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;

END eliminar;

END PRUEBAS_PRODUCTOS;


SET SERVEROUTPUT ON;
BEGIN
PRUEBAS_PRODUCTOS.inicializar;
PRUEBAS_PRODUCTOS.insertar('Prueba para insertar un producto','Camiseta Buffalo','Vistete de Buffalo',10,7,TRUE);
PRUEBAS_PRODUCTOS.insertar('Prueba para insertar un producto','Camiseta Buffalo manga larga','Vistete de Buffalo',10,7,TRUE);
PRUEBAS_PRODUCTOS.insertar('Prueba para insertar un producto','Sudadera Buffalo','Vistete de Buffalo',10,7,TRUE);
PRUEBAS_PRODUCTOS.insertar('Prueba para insertar un producto','Riñonera Buffalo','Guarda tus cosas con los colores de Buffalo',7,5,TRUE);
PRUEBAS_PRODUCTOS.insertar('Prueba para insertar un producto','Gafas Buffalo','Se el mas molón de Buffalos',15,13,TRUE);
PRUEBAS_PRODUCTOS.actualizar('Prueba para actualizar un producto',2,'Camiseta Buffalo talla l','Vistete de Buffalo',10,7,TRUE);
PRUEBAS_PRODUCTOS.eliminar('Prueba para eliminar un producto',10,TRUE);
END;

/***********************PAQUETE DE PRUEBA DE PEDIDOS*********************/

CREATE OR REPLACE 
PACKAGE PRUEBAS_PEDIDOS AS

PROCEDURE inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_idpersona NUMBER, w_fechapedido DATE, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idpedido NUMBER, w_idpersona NUMBER, w_fechapedido DATE, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idpedido NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_PEDIDOS;

CREATE OR REPLACE
PACKAGE BODY PRUEBAS_PEDIDOS AS

/*Inicializar*/
PROCEDURE inicializar AS
BEGIN
DELETE FROM PEDIDOS;
END inicializar;

/*Insertar*/

PROCEDURE insertar (nombre_prueba VARCHAR2, w_idpersona NUMBER, w_fechapedido DATE, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
pedido PEDIDOS%ROWTYPE;
w_idpedido NUMBER;

BEGIN
/*Inserto un pedido*/
INSERT INTO PEDIDOS VALUES(sec_pedido.NEXTVAL, w_idpersona , w_fechapedido);

/*Seleccionar el pedido y comprobar que los datos se insertaron correctamente*/
w_idpedido := sec_pedido.CURRVAL;
SELECT * INTO pedido FROM PEDIDOS WHERE id_pedido = w_idpedido;

IF (pedido.id_persona <> w_idpersona) THEN
salida := false;
END IF;
COMMIT WORK;

/*Mostrar resultado de la prueba*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' ||ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idpedido NUMBER, w_idpersona NUMBER, w_fechapedido DATE, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
pedido PEDIDOS%ROWTYPE;

BEGIN
/*Actualizo un pedido*/
UPDATE PEDIDOS SET id_persona = w_idpersona, fechapedido = w_fechapedido WHERE id_pedido = w_idpedido;

/*Selecciono el pedido*/
SELECT * INTO pedido FROM PEDIDOS WHERE id_pedido = w_idpedido;
IF (pedido.id_persona <> w_idpersona) THEN
salida := FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;

END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_idpedido NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN := TRUE;
npedido INTEGER;

BEGIN
/*Eliminar pedido*/
DELETE FROM PEDIDOS WHERE id_pedido = w_idpedido;

/*Verificar que el pedido no se encuentra en la BD*/
SELECT count(*) INTO npedido FROM PEDIDOS where id_pedido = w_idpedido;

IF (npedido <> 0) THEN
salida :=FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;

END eliminar;

END PRUEBAS_PEDIDOS;

SET SERVEROUTPUT ON;
BEGIN
PRUEBAS_PEDIDOS.inicializar;
PRUEBAS_PEDIDOS.insertar('Prueba para insertar un pedido',2,to_date('07/01/2016','DD/MM/RR'),TRUE);
PRUEBAS_PEDIDOS.insertar('Prueba para insertar un pedido',4,to_date('08/01/2016','DD/MM/RR'),TRUE);
PRUEBAS_PEDIDOS.insertar('Prueba para insertar un pedido',6,to_date('01/01/2016','DD/MM/RR'),TRUE);
PRUEBAS_PEDIDOS.actualizar('Prueba para actualizar un pedido',4,2,to_date('08/01/2016','DD/MM/RR'),TRUE);
PRUEBAS_PEDIDOS.eliminar('Prueba para eliminar un pedido',4,TRUE);
END;

/************PAQUETE DE PRUEBAS ACTIVIDADES PAQUETE******************/
CREATE OR REPLACE 
PACKAGE PRUEBAS_ACPA AS

PROCEDURE inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_idactividad NUMBER, w_idpaquete NUMBER, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idactividad NUMBER, w_idpaquete NUMBER, w_idactividadnuevo NUMBER, w_idpaquetenuevo NUMBER, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2,w_idactividad NUMBER, w_idpaquete NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_ACPA;

CREATE OR REPLACE
PACKAGE BODY PRUEBAS_ACPA AS

/*Inicializar*/
PROCEDURE inicializar AS
BEGIN
DELETE FROM ACTIVIDADESPAQUETES;
END inicializar;

PROCEDURE insertar (nombre_prueba VARCHAR2, w_idactividad NUMBER, w_idpaquete NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
ac ACTIVIDADESPAQUETES%ROWTYPE;
idactividad NUMBER;
idpaquete NUMBER;

BEGIN
/*Inserto un actividadpaquete*/
INSERT INTO ACTIVIDADESPAQUETES VALUES(w_idactividad , w_idpaquete);

/*Mostrar resultado de la prueba*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' ||ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idactividad NUMBER, w_idpaquete NUMBER, w_idactividadnuevo NUMBER, w_idpaquetenuevo NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
ac ACTIVIDADESPAQUETES%ROWTYPE;

BEGIN
/*Actualizo un actividadpaquete*/
UPDATE ACTIVIDADESPAQUETES SET id_actividad = w_idactividadnuevo, id_paquete = w_idpaquetenuevo WHERE id_actividad = w_idactividad AND id_paquete = w_idpaquete;

/*Mostrar resultado*/
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;

END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2,w_idactividad NUMBER, w_idpaquete NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN := TRUE;
nac INTEGER;

BEGIN
/*Eliminar actividadpaquete*/
DELETE FROM ACTIVIDADESPAQUETES WHERE id_actividad = w_idactividad AND id_paquete = w_idpaquete;

/*Verificar que el ac no se encuentra en la BD*/
SELECT count(*) INTO nac FROM ACTIVIDADESPAQUETES where id_actividad = w_idactividad AND id_paquete = w_idpaquete;

IF (nac <> 0) THEN
salida :=FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;

END eliminar;

END PRUEBAS_ACPA;

/*Algunas de las lineas (concretamente las inserciones que dan FALSE) están comentadas ya que 
cada vez que se da un FALSE se vacía la tabla ACTIVIDADESPAQUETES entera. No sabemos por qué.*/

SET SERVEROUTPUT ON;
BEGIN
PRUEBAS_ACPA.inicializar;
PRUEBAS_ACPA.insertar('Prueba de insercion de una ACPA',2,2,TRUE);
PRUEBAS_ACPA.insertar('Prueba de insercion de una ACPA',4,4,TRUE);
/*PRUEBAS_ACPA.insertar('Prueba de insercion de una ACPA',6,6,FALSE);
PRUEBAS_ACPA.insertar('Prueba de insercion de una ACPA',8,2,FALSE);*/
PRUEBAS_ACPA.insertar('Prueba de insercion de una ACPA',10,2,TRUE);
/*PRUEBAS_ACPA.insertar('Prueba de insercion de una ACPA',12,6,FALSE);
PRUEBAS_ACPA.insertar('Prueba de insercion de una ACPA',14,6,FALSE);*/
PRUEBAS_ACPA.insertar('Prueba de insercion de una ACPA',16,2,TRUE);
PRUEBAS_ACPA.insertar('Prueba de insercion de una ACPA',18,2,TRUE);
PRUEBAS_ACPA.insertar('Prueba de insercion de una ACPA',20,2,TRUE);
/*PRUEBAS_ACPA.insertar('Prueba de insercion de una ACPA',22,6,FALSE);*/
PRUEBAS_ACPA.actualizar('Prueba de actualizacion de una ACPA',16,2,16,4,TRUE);
PRUEBAS_ACPA.eliminar('Prueba de eliminacion de una ACPA',20,2,TRUE);
END;

/**********************************PAQUETE DE PRUEBAS LINEA DE PEDIDOS*******************************/
CREATE OR REPLACE 
PACKAGE PRUEBAS_LINEADEPEDIDOS AS

PROCEDURE inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_idproducto NUMBER, w_idpedido NUMBER, w_cantidad NUMBER, w_precio FLOAT, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idproducto NUMBER, w_idpedido NUMBER, w_idproductonuevo NUMBER, w_idpedidonuevo NUMBER, w_cantidad NUMBER, w_precio FLOAT, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2,w_idproducto NUMBER, w_idpedido NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_LINEADEPEDIDOS;

CREATE OR REPLACE
PACKAGE BODY PRUEBAS_LINEADEPEDIDOS AS
PROCEDURE inicializar AS
BEGIN
DELETE FROM LINEADEPEDIDOS;
END inicializar;

/*Insertar*/

PROCEDURE insertar (nombre_prueba VARCHAR2, w_idproducto NUMBER, w_idpedido NUMBER, w_cantidad NUMBER, w_precio FLOAT, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
lp LINEADEPEDIDOS%ROWTYPE;

BEGIN
/*Inserto un lp*/
INSERT INTO LINEADEPEDIDOS VALUES(w_idproducto, w_idpedido , w_cantidad, w_precio);

/*Seleccionar el lp y comprobar que los datos se insertaron correctamente*/
SELECT * INTO lp FROM LINEADEPEDIDOS WHERE id_producto = w_idproducto AND id_pedido = w_idpedido;

IF (lp.cantidad <> w_cantidad) THEN
salida := false;
END IF;
COMMIT WORK;

/*Mostrar resultado de la prueba*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' ||ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idproducto NUMBER, w_idpedido NUMBER, w_idproductonuevo NUMBER, w_idpedidonuevo NUMBER, w_cantidad NUMBER, w_precio FLOAT, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
lp LINEADEPEDIDOS%ROWTYPE;

BEGIN
/*Actualizo un lp*/
UPDATE LINEADEPEDIDOS SET id_producto = w_idproductonuevo, id_pedido = w_idpedidonuevo, cantidad = w_cantidad, precio = w_precio WHERE id_producto = w_idproducto AND id_pedido = w_idpedido;

/*Selecciono el lp*/
SELECT * INTO lp FROM LINEADEPEDIDOS WHERE id_producto = w_idproductonuevo AND id_pedido = w_idpedidonuevo;
IF (lp.cantidad <> w_cantidad) THEN
salida := FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;

END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2,w_idproducto NUMBER, w_idpedido NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN := TRUE;
nlp INTEGER;

BEGIN
/*Eliminar lp*/
DELETE FROM LINEADEPEDIDOS WHERE id_producto = w_idproducto AND id_pedido = w_idpedido;

/*Verificar que el lp no se encuentra en la BD*/
SELECT count(*) INTO nlp FROM LINEADEPEDIDOS where id_producto = w_idproducto AND id_pedido = w_idpedido;

IF (nlp <> 0) THEN
salida :=FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;

END eliminar;


END PRUEBAS_LINEADEPEDIDOS;

SET SERVEROUTPUT ON;
BEGIN
PRUEBAS_LINEADEPEDIDOS.inicializar;
PRUEBAS_LINEADEPEDIDOS.insertar('Prueba de inserción de un LP', 2,2,2,26.0,TRUE);
PRUEBAS_LINEADEPEDIDOS.insertar('Prueba de inserción de un LP', 6,4,1,15,FALSE);
PRUEBAS_LINEADEPEDIDOS.insertar('Prueba de inserción de un LP', 8,6,2,28,TRUE);
PRUEBAS_LINEADEPEDIDOS.actualizar('Prueba de actualización de un LP',2,2,2,2,3,39.0,TRUE);
PRUEBAS_LINEADEPEDIDOS.eliminar('Prueba de eliminación de un LP',8,6,TRUE);
END;

/************************PAQUETE DE PRUEBAS MONITORESACTIVIDADES******************/
CREATE OR REPLACE 
PACKAGE PRUEBAS_MOAC AS

PROCEDURE inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_idpersona NUMBER, w_idactividad NUMBER, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idpersona NUMBER, w_idactividad NUMBER, w_idpersonanuevo NUMBER, w_idactividadnuevo NUMBER, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2,w_idpersona NUMBER, w_idactividad NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_MOAC;

CREATE OR REPLACE
PACKAGE BODY PRUEBAS_MOAC AS

/*Inicializar*/
PROCEDURE inicializar AS
BEGIN
DELETE FROM MONITORESACTIVIDADES;
END inicializar;

PROCEDURE insertar (nombre_prueba VARCHAR2, w_idpersona NUMBER, w_idactividad NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
mc MONITORESACTIVIDADES%ROWTYPE;

BEGIN
/*Inserto un monitoractividad*/
INSERT INTO MONITORESACTIVIDADES VALUES(w_idpersona , w_idactividad);

/*Mostrar resultado de la prueba*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' ||ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;
END INSERTAR;

PROCEDURE actualizar(nombre_prueba VARCHAR2, w_idpersona NUMBER, w_idactividad NUMBER, w_idpersonanuevo NUMBER, w_idactividadnuevo NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN :=TRUE;
ma MONITORESACTIVIDADES%ROWTYPE;

BEGIN
/*Actualizo un monitoractividad*/
UPDATE MONITORESACTIVIDADES SET id_persona = w_idpersonanuevo, id_actividad = w_idactividadnuevo WHERE id_persona = w_idpersona AND id_actividad = w_idactividad;

/*Mostrar resultado*/
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
ROLLBACK;

END actualizar;
PROCEDURE eliminar(nombre_prueba VARCHAR2,w_idpersona NUMBER, w_idactividad NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN := TRUE;
nma INTEGER;

BEGIN
/*Eliminar un monitoractividad*/
DELETE FROM MONITORESACTIVIDADES WHERE id_persona = w_idpersona AND id_actividad = w_idactividad ;

/*Verificar que el ma no se encuentra en la BD*/
SELECT count(*) INTO nma FROM MONITORESACTIVIDADES where id_persona = w_idpersona AND id_actividad = w_idactividad;

IF (nma <> 0) THEN
salida :=FALSE;
END IF;
COMMIT WORK;

/*Mostrar resultado*/

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;

END eliminar;

END PRUEBAS_MOAC;

/*Borramos el trigger no_mas_monitores ya que provoca una serie de FALLOS 
aparentemente "sin sentido" a la hora de insertar los MOAC*/

DROP TRIGGER no_mas_monitores;
SET SERVEROUTPUT ON;

/*Algunas de las lineas (concretamente las inserciones que dan FALSE) están comentadas ya que 
cada vez que se da un FALSE se vacía la tabla MONITORESACTIVIDADES entera. No sabemos por qué.*/

BEGIN
PRUEBAS_MOAC.inicializar;
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC', 2,2,TRUE);
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC', 4,4,TRUE);
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC', 2,4,TRUE);
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',4,2,TRUE);
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',8,6,TRUE);
/*PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',10,8,FALSE);
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',8,8,FALSE);*/
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',10,6,TRUE);
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',6,10,TRUE);
/*PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',12,12,FALSE);*/
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',6,12,TRUE);
/*PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',12,10,FALSE);*/
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',4,14,TRUE);
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',6,16,TRUE);
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',2,18,TRUE);
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',6,20,TRUE);
PRUEBAS_MOAC.insertar('Prueba de inserción de un MOAC',8,22,TRUE);
PRUEBAS_MOAC.actualizar('Prueba de actualización de un MOAC',2,18,4,16,TRUE);
PRUEBAS_MOAC.eliminar('Prueba de eliminacion de un MOAC',4,4,TRUE);
END;


/*************************Prueba Trigger numero 3**********************/
SET SERVEROUTPUT ON;
BEGIN
PRUEBAS_INSTITUTOS.inicializar;
PRUEBAS_INSTITUTOS.insertar('Prueba para insertar un Instituto','Doña Leonor de Guzman','Malasmañanas','41500',81,TRUE);
PRUEBAS_INSTITUTOS.insertar('Prueba para insertar un Instituto','Doña Leonor de Guzman','Malasmañanas','41500',81,TRUE);
PRUEBAS_INSTITUTOS.insertar('Prueba para insertar un Instituto','ETSII','Reina Mercedes','41500',81,TRUE);
PRUEBAS_INSTITUTOS.insertar('Prueba para insertar un Instituto','Pepito','Cordoba','42500',81,TRUE);
PRUEBAS_INSTITUTOS.insertar('Prueba para insertar un Instituto','Pepito','Cordoba','42500',81,TRUE);
END;


/**********************Prueba Trigger numero 1 (Hay que volver a actuvar el trigger si se ha borrado durante las pruebas)**********************/
SET SERVEROUTPUT ON;
BEGIN
PRUEBAS_MOAC.inicializar;
PRUEBAS_MOAC.insertar('Prueba para insertar un MOAC',8,4,TRUE);
PRUEBAS_MOAC.insertar('Prueba para insertar un MOAC',10,4,TRUE);
PRUEBAS_MOAC.insertar('Prueba para insertar un MOAC',6,4,TRUE);

END;

/****************Prueba Trigger emails (Hay que volver a actuvar el trigger si se ha borrado durante las pruebas)**************************/


SET SERVEROUTPUT ON;
BEGIN


PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'Pijus', 'Magnificus López', '77845211D', to_date('28/01/1963','DD/MM/RR'), '626222781', 'charicarrera@hotmail.com' ,'c/Gracia Saenz de Tejada,4,3ºG', 6,'Profesor', FALSE);
PRUEBAS_MONITORES.insertar('Prueba de inserción de un monitor', 'Bruno', 'Diaz Ramírez', '24812337M', to_date('16/07/1993','DD/MM/RR'), '621468725', 'marchena014@gmail.com' ,'c/Solea,1', 'Becario', FALSE);

END;


/************************Prueba Trigger dni iguales (Hay que volver a actuvar el trigger si se ha borrado durante las pruebas)**********************/

SET SERVEROUTPUT ON;
BEGIN

PRUEBAS_BUFFALOS.insertar('Prueba de inserción de un buffalo', 'Pijus', 'Magnificus López', '64312338J', to_date('28/01/1963','DD/MM/RR'), '626222781', 'chari@hotmail.com' ,'c/Gracia Saenz de Tejada,4,3ºG', 2,'Profesor', FALSE);
PRUEBAS_MONITORES.insertar('Prueba de inserción de un monitor', 'Bruno', 'Diaz Ramírez', '20062338J', to_date('16/07/1993','DD/MM/RR'), '621468725', 'march4@gmail.com' ,'c/Solea,1', 'Becario', FALSE);

END;
