/**
 * @author Marchena
 */

function validaInstitutos(){
	
	var errorTotal = 0;
	
	/**Nombre no vacío**/
	var campo = document.getElementById("nombre");
	var spanCampo = document.getElementById("spanNombre");
	var error = validaCampoBlanco(campo,spanCampo);
	if(error == false){
		errorTotal++;
	}
	
	/**Descripción no vacío**/
	var campo = document.getElementById("direccion");
	var spanCampo = document.getElementById("spanDireccion");
	var error = validaCampoBlanco(campo,spanCampo);
	if(error == false){
		errorTotal++;
	}
	
	/**Duración no vacía**/
	var campo = document.getElementById("codPostal");
	var spanCampo = document.getElementById("spanCodPostal");
	var error = validaCampoBlanco(campo,spanCampo);
	if(error == false){
		errorTotal++;
	}
	
	/**Paquete no válido**/
	var campo = document.getElementById("select_paquete");
	var spanCampo = document.getElementById("spanPaquete");
	var error = validaPaquete(campo,spanCampo);
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
		id.style.backgroundImage = "url('./images/xRoja.png')";
		return false;
	}else{
		idSpan.className = "spanCorrecto";
		idSpan.innerHTML = "Correcto";
		id.style.borderColor = "#57A639";
		id.style.boxShadow="inset 0 4px 6px rgba(087,166,057,0.4)";
		id.style.backgroundImage = "url('./images/ticVerde.png')";
		return true;
	}
}

function validaPaquete(id,idSpan){
	
	var campo = id.value;
	if(campo == "invalido"){
		idSpan.className="spanError";
		idSpan.innerHTML = "El paquete no puede tener este valor";
		id.style.borderColor="#FD8E8E";
		id.style.boxShadow="inset 0 4px 6px rgba(255,0,0,0.4)";
		return false;
	}else{
		idSpan.className = "spanCorrecto";
		idSpan.innerHTML = "Correcto";
		id.style.borderColor="#57A639";
		id.style.boxShadow="inset 0 4px 6px rgba(087,166,057,0.4)";
		return true;
	}
}