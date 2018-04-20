/**
 * @author Marchena
 */

function validacionInscripcion(){
	
	var errorTotal = 0;
	/**Nombre no vacío**/
	var campo = document.getElementById("nombre");
	var spanCampo = document.getElementById("spanNombre");
	var error = validaCampoBlanco(campo,spanCampo);
	if(error == false){
		errorTotal++;
	}
	
	/**Apellido no vacío**/
	var campo = document.getElementById("apellidos");
	var spanCampo = document.getElementById("spanApellidos");
	var error = validaCampoBlanco(campo,spanCampo);
	if(error == false){
		errorTotal++;
	}
	
	/**Telefono no vacío**/
	var campo = document.getElementById("telefono");
	var spanCampo = document.getElementById("spanTelefono");
	var error = validaCampoBlanco(campo,spanCampo);
	if(error == false){
		errorTotal++;
	}
	
	
	
	/**Direccion no vacía**/
	var campo = document.getElementById("direccion");
	var spanCampo = document.getElementById("spanDireccion");
	var error = validaCampoBlanco(campo,spanCampo);
	if(error == false){
		errorTotal++;
	}
	
	/**Email no vacío**/
	var campo = document.getElementById("email");
	var spanCampo = document.getElementById("spanEmail");
	var error = validaCampoBlanco(campo,spanCampo);
	if(error == false){
		errorTotal++;
	}
	
	/**DNI no vacío**/
	var campo = document.getElementById("dniN");
	var spanCampo = document.getElementById("spanDNI");
	var error = validaCampoBlanco(campo,spanCampo);
	if(error == false){
		errorTotal++;
	}
	
	/**DNI no vacío**/
	var campo = document.getElementById("dniL");
	var spanCampo = document.getElementById("spanDNI");
	var error = validaCampoBlanco(campo,spanCampo);
	if(error == false){
		errorTotal++;
	}
	
	if(errorTotal >0){
		return false;
	}else{
		return true;
	}
}

function validaCampoBlanco(id,idSpan){
	
	var campo = id.value;
	if(campo.length==0){
		idSpan.className="spanError";
		idSpan.innerHTML = "El " + id.name + " no puede estar vacío";
		id.style.borderColor="#FD8E8E";
		id.style.boxShadow="inset 0 4px 6px rgba(255,0,0,0.4)";
		return false;
	}else{
		idSpan.className = "spanCorrecto";
		idSpan.innerHTML = "Correcto";
		id.style.borderColor="#57A639"
		id.style.boxShadow="inset 0 4px 6px rgba(087,166,057,0.4)";
		return true;
	}
	
function validaDNI(idN,idL,idSpan){
	
}
}
