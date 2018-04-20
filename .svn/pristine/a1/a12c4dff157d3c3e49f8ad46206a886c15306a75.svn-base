
CREATE OR REPLACE FUNCTION ASSERT_EQUALS (salida BOOLEAN, salida_esperada BOOLEAN) RETURN VARCHAR2 AS
BEGIN 
IF (salida = salida_esperada) THEN
RETURN 'EXITO';
ELSE
RETURN' FALLO';
END IF;
END ASSERT_EQUALS;
/

CREATE OR REPLACE PROCEDURE alta_paquete
(w_nombre IN paquetes.nombre%TYPE, 
w_descripcion IN paquetes.descripcion%TYPE,
w_precio IN paquetes.precio%TYPE) IS
BEGIN
INSERT INTO paquetes
VALUES (sec_paquete.NEXTVAL, w_nombre, w_descripcion, w_precio);
COMMIT WORK;
END alta_paquete;
/

CREATE OR REPLACE PROCEDURE crear_actividad
(w_nombre IN actividades.nombre%TYPE,
w_descripcion IN actividades.descripcion%TYPE,
w_tiempo IN actividades.tiempo%TYPE) IS
BEGIN
INSERT INTO ACTIVIDADES
VALUES(sec_actividad.NEXTVAL, w_nombre,w_descripcion,w_tiempo);
COMMIT WORK;
END crear_actividad;
/

CREATE OR REPLACE PROCEDURE alta_monitor
(w_nombre IN personas.nombre%TYPE,
w_apellidos IN personas.apellidos%TYPE,
w_dni IN personas.dni%TYPE,
w_fechanacimiento IN personas.fechanacimiento%TYPE,
w_telefono IN personas.telefono%TYPE,
w_email IN personas.email%TYPE,
w_direccion IN personas.direccion%TYPE,
w_tipomonitor IN monitores.tipomonitor%TYPE) IS
BEGIN
INSERT INTO personas
VALUES(sec_persona.NEXTVAL, w_nombre, w_apellidos, w_dni, w_fechanacimiento, w_telefono, w_email, w_direccion, 'Monitor');
INSERT INTO monitores
VALUES(sec_persona.CURRVAL, w_tipomonitor);
COMMIT WORK;
END alta_monitor;
/

CREATE OR REPLACE PROCEDURE alta_buffalo
(w_nombre IN personas.nombre%TYPE,
w_apellidos IN personas.apellidos%TYPE,
w_dni IN personas.dni%TYPE,
w_fechanacimiento IN personas.fechanacimiento%TYPE,
w_telefono IN personas.telefono%TYPE,
w_email IN personas.email%TYPE,
w_direccion IN personas.direccion%TYPE,
w_tipobuffalo IN buffalos.tipobuffalo%TYPE,
w_idinstituto IN buffalos.id_instituto%TYPE) IS
BEGIN
INSERT INTO personas
VALUES(sec_persona.NEXTVAL, w_nombre, w_apellidos, w_dni, w_fechanacimiento, w_telefono, w_email, w_direccion, 'Buffalo');
INSERT INTO buffalos
VALUES(sec_persona.CURRVAL, w_idinstituto, w_tipobuffalo);
COMMIT WORK;
END alta_buffalo;
/

CREATE OR REPLACE PROCEDURE alta_instituto
(w_nombre IN institutos.nombre%TYPE,
w_direccion IN institutos.direccion%TYPE,
w_codpostal IN institutos.codpostal%TYPE,
w_idpaquete IN institutos.id_paquete%TYPE) IS
BEGIN
INSERT INTO institutos
VALUES(sec_instituto.NEXTVAL,w_nombre,w_direccion,w_codpostal,w_idpaquete);
COMMIT WORK;
END alta_instituto;
/

CREATE OR REPLACE PROCEDURE alta_producto
(w_nombre IN productos.nombre%TYPE,
w_descripcion IN productos.descripcion%TYPE,
w_preciopvp IN productos.preciopvp%TYPE,
w_precioinstituto IN productos.precioinstituto%TYPE) IS 
BEGIN
INSERT INTO productos
VALUES(sec_producto.NEXTVAL, w_nombre, w_descripcion, w_preciopvp, w_precioinstituto);
COMMIT WORK;
END alta_producto;
/

CREATE OR REPLACE PROCEDURE alta_pedido
(w_idpersona IN pedidos.id_persona%TYPE,
w_fechapedido IN PEDIDOS.FECHAPEDIDO%TYPE) IS
BEGIN
INSERT INTO pedidos
VALUES (sec_pedido.NEXTVAL, w_idpersona, w_fechapedido);
COMMIT WORK;
END;
/

CREATE OR REPLACE PROCEDURE alta_actividadpaquete
(w_idactividad IN actividadespaquetes.id_actividad%TYPE,
w_idpaquete IN actividadespaquetes.id_paquete%TYPE) IS
BEGIN
INSERT INTO actividadespaquetes
VALUES (w_idactividad, w_idpaquete);
COMMIT WORK;
END;
/

CREATE OR REPLACE PROCEDURE alta_monitoresactividades
(w_idpersona IN monitoresactividades.id_persona%TYPE,
w_idactividad IN monitoresactividades.id_actividad%TYPE) IS
BEGIN
INSERT INTO monitoresactividades
VALUES (w_idpersona,w_idactividad);
COMMIT WORK;
END;
/

CREATE OR REPLACE PROCEDURE alta_lineapedido
(w_idproducto IN lineadepedidos.id_producto%TYPE,
w_idpedido IN lineadepedidos.id_pedido%TYPE,
w_cantidad IN lineadepedidos.cantidad%TYPE,
w_precio IN lineadepedidos.precio%TYPE) IS
BEGIN
INSERT INTO lineadepedidos
VALUES (w_idproducto,w_idpedido,w_cantidad,w_precio);
COMMIT WORK;
END;
/


/***************************************************FUNCTIONS**********************************************************/
/***Paquete mas barato****/
CREATE OR REPLACE FUNCTION paquete_mas_barato
RETURN FLOAT is w_precio FLOAT;

BEGIN
SELECT min(precio) INTO w_precio
FROM PAQUETES;

RETURN (w_precio);
END;
/


/*****Paquete mas caro******/
CREATE OR REPLACE FUNCTION paquete_mas_caro
RETURN FLOAT is w_precio FLOAT;

BEGIN
SELECT max(precio) INTO w_precio
FROM PAQUETES;

RETURN (w_precio);
END;
/


CREATE OR REPLACE FUNCTION muestraUnPaquete
RETURN VARCHAR2(50) is resul VARCHAR2(50);

BEGIN
SELECT NOMBRE INTO resul FROM PAQUETES;
return(resul);
END;
/


/*CREATE OR REPLACE FUNCTION muestraPaquetes
RETURN CURSOR is c CURSOR;

BEGIN
SELECT * INTO c FROM PAQUETES;
return c;
END;*/

/***************PRUEBAS DE LAS FUNCIONES Y DE CURSORES (UNA VEZ ESTÉN LLENAS LAS TABLAS)***************************/


/*****PAQUETE MAS BARATO*****/

SET serveroutput ON;
BEGIN
DBMS_OUTPUT.PUT_LINE('El paquete mas barato cuesta: '||''||paquete_mas_barato());
END;
/

/*******PAQUETE MAS CARO***********/
SET serveroutput ON;
BEGIN
DBMS_OUTPUT.PUT_LINE('El paquete mas caro cuesta: '||''||paquete_mas_caro());
END;
/

/*****MUESTRA UN PAQUETE********/

SET serveroutput ON;
BEGIN
DBMS_OUTPUT.PUT_LINE(muestraUnPaquete());
END;
/


/*CURSORES:*/
/*paquetes disponibles*/

SET serveroutput ON;
DECLARE 
cursor c IS
SELECT * FROM PAQUETES;
BEGIN
DBMS_OUTPUT.PUT_LINE('Los paquetes disponibles son:');
  FOR fila IN C LOOP
    EXIT WHEN C%ROWCOUNT>4;
    DBMS_OUTPUT.PUT_LINE(fila.nombre||'-' ||fila.descripcion||'-' ||fila.precio||'€');
  END LOOP;
END;


/*actividades disponibles*/

SET serveroutput ON;
DECLARE 
cursor c IS
SELECT * FROM ACTIVIDADES;
BEGIN
DBMS_OUTPUT.PUT_LINE('Las actividades disponibles son:');
  FOR fila IN C LOOP
    EXIT WHEN C%ROWCOUNT>8;
    DBMS_OUTPUT.PUT_LINE(fila.nombre||'-' ||fila.descripcion||'-' ||fila.tiempo||'minutos');
  END LOOP;
END;
