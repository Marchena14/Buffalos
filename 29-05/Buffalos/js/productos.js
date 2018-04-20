/**
 * @author Marchena
 */

function validaProductos(){
		
	var errorTotal = 0;
	
	/**Nombre no vacío**/
	var campo = document.getElementById("nombre");
	var spanCampo = document.getElementById("spanNombre");
	var error = validaCampoBlanco(campo,spanCampo);
	if(error == false){
		errorTotal++;
	}
	
	/**Descripción no vacío**/
	var campo = document.getElementById("descripcion");
	var spanCampo = document.getElementById("spanDescripcion");
	var error = validaCampoBlanco(campo,spanCampo);
	if(error == false){
		errorTotal++;
	}
	
	/**PrecioPvp no vacía**/
	var campo = document.getElementById("precioPvp");
	var spanCampo = document.getElementById("spanPrecioPvp");
	var error = numerosPermitidos(campo,spanCampo);
	if(error == false){
		var error = validaCampoBlanco(campo,spanCampo);
		if(error == false){
			errorTotal++;
		}else{
			var error = numerosNegativos(campo,spanCampo);
			if(error == false){
				errorTotal++;
			}
		}
	}else{
		errorTotal++;
	}
	
		/**PrecioIns no vacía**/
	var campo = document.getElementById("precioIns");
	var spanCampo = document.getElementById("spanPrecioIns");
	var error = validaCampoBlanco(campo,spanCampo);
	if(error == false){
		errorTotal++;
		
	}else{
		var error = numerosNegativos(campo,spanCampo);
		if(error == false){
			errorTotal++;
		}
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
		idSpan.innerHTML = "El campo " + id.name + " no puede estar vacío";
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

function numerosNegativos(id,idSpan){
	
	var campo = id.value;
	if(campo<0){
		idSpan.className="spanError";
		idSpan.innerHTML = "El campo " + id.name + " no puede ser negativo";
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

function numerosPermitidos(id, idSpan){
	var campo = id.value;
	if(campo != "^(\d|-)?(\d|,)*\.?\d*$"){
		return false;
	}else{
		idSpan.className="spanError";
		idSpan.innerHTML = "El campo " + id.name + " no es válido";
		id.style.borderColor="#FD8E8E";
		id.style.boxShadow="inset 0 4px 6px rgba(255,0,0,0.4)";
		return true;
	}
}
