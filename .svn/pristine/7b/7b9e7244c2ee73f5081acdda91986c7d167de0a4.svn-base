/* Regla de negocio 1 */
CREATE OR REPLACE TRIGGER no_mas_monitores
BEFORE
INSERT ON MONITORESACTIVIDADES
FOR EACH ROW
DECLARE
nmonitor NUMBER;
BEGIN
SELECT count(ID_PERSONA) INTO nmonitor
FROM MONITORESACTIVIDADES,ACTIVIDADES WHERE MONITORESACTIVIDADES.id_actividad = ACTIVIDADES.id_actividad;
IF(nmonitor>1)
THEN raise_application_error
(-25001,'no puede haber mas de dos monitores por actividad');
END IF;
END;
/


/*No institutos iguales*/
CREATE OR REPLACE TRIGGER no_institutos_iguales
BEFORE
INSERT ON INSTITUTOS
FOR EACH ROW
DECLARE
ninstitutos NUMBER;
BEGIN
SELECT count(*) INTO ninstitutos
FROM INSTITUTOS WHERE :NEW.nombre = nombre AND :NEW.codpostal = codpostal;
if(ninstitutos>0) THEN raise_application_error
(-20501,'No puede haber dos institutos iguales');
END IF;
END;
/


/*No emails iguales*/

CREATE OR REPLACE TRIGGER no_emails_iguales
BEFORE
INSERT ON PERSONAS
FOR EACH ROW
DECLARE
npersonas NUMBER;
BEGIN
SELECT count(*) INTO npersonas
FROM PERSONAS WHERE :NEW.email = email;
if(npersonas>0) THEN raise_application_error
(-20501,'No puede haber dos personas con el mismo email');
END IF;
END;
/
/*No dni iguales*/

CREATE OR REPLACE TRIGGER no_dni_iguales
BEFORE
INSERT ON PERSONAS
FOR EACH ROW
DECLARE
npersonas NUMBER;
BEGIN
SELECT count(*) INTO npersonas
FROM PERSONAS WHERE :NEW.dni = dni;
if(npersonas>0) THEN raise_application_error
(-20501,'No puede haber dos personas con el mismo dni');
END IF;
END;
/