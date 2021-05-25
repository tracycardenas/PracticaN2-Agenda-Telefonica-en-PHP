function validarCamposObligatorios()
{
 var bandera = true

 for(var i = 0; i < document.forms[0].elements.length; i++){
    var elemento = document.forms[0].elements[i]
    if(elemento.value == '' && elemento.type == 'text' || elemento.value == '' && elemento.type == 'password' ){
        if(elemento.id == 'cedula'){
        document.getElementById('mensajeCedula').innerHTML = '<br>La cedula esta vacia'
        document.getElementById('mensajeNombres').innerHTML = '<br>Los nombres estan vacios'
        document.getElementById('mensajeApellidos').innerHTML = '<br>Los apellidos estan vacios'
        document.getElementById('mensajeTelefono').innerHTML = '<br>El telefono esta vacio'
        document.getElementById('mensajeFechaNacimiento').innerHTML = '<br>La fecha de nacimiento esta vacia'
        document.getElementById('mensajeCorreo').innerHTML = '<br>El correo electronico esta vacio'
        document.getElementById('mensajeContrasena').innerHTML = '<br>La contrasenia esta vacia '
        }
 
        elemento.style.border = '1px red solid'
        elemento.className = 'error'
        bandera = false
 }
 }

 if(!bandera){
 alert('Error: revisar los comentarios')
 }
 return bandera
}

    



function validarLetras(elemento)
{

    if(elemento.value.length > 0){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
         console.log(miAscii)

 if(miAscii >= 97 && miAscii <= 122  || miAscii >= 65 && miAscii<= 90 || miAscii == 32){
    elemento.style.border = '1px green solid'

        return true
     
    }
    else {
        elemento.value = elemento.value.substring(0, elemento.value.length-1)
        elemento.style.border = '1px red solid'
        return false
    }
}
else{
return true
}
}

function validarNumeros(elemento)
{

     if(elemento.value.length > 0){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
        console.log(miAscii)

            if(miAscii >= 48 && miAscii <= 57  && elemento.value.length<=10){
                elemento.style.border = '1px green solid'

                 return true
                }
    else {
        elemento.value = elemento.value.substring(0, elemento.value.length-1)
        elemento.style.border = '1px red solid'
        return false
    }
}
else{
return true
}
}



function validarCedula(elemento){
    document.getElementById("mensajeCedula").style.color = "red"
    elemento.style.border = "1px red solid"
    if(elemento.value.length == 10){
        var cl = elemento.value
        var total = 0;
        var longitud = cl.length;
        var longcheck = longitud - 1;

        if (cl !== "" && longitud === 10){ 
            for(i = 0; i < longcheck; i++){
                if (i%2 === 0) {
                    var aux = cl.charAt(i) * 2;
                    if (aux > 9) aux -= 9;
                        total += aux;
                } else {
                    total += parseInt(cl.charAt(i)); 
                }
            }
            total = total % 10 ? 10 - total % 10 : 0;
            if (cl.charAt(longitud-1) == total) {
                document.getElementById("mensajeCedula").innerHTML = ("Cedula Correcta");
                document.getElementById("mensajeCedula").style.color = "green"
                elemento.style.border = '1px green solid'
                return true;
            }else{
                document.getElementById("mensajeCedula").innerHTML = ("Cedula Incorrecta");
                document.getElementById("mensajeCedula").style.color = "red"
                return false;
            }
        }
    }else if(elemento.value.length == 0){
        document.getElementById('mensajeCedula').innerHTML = 'La cedula esta vacia'
        return false;
    }else{
        document.getElementById('mensajeCedula').innerHTML = 'Ingresar la cedula completa'
        return false;
    }
}

    function ValidarCorreo(event, spanId, elemento) {
        let span = document.getElementById(spanId);
        let correo = elemento.value;

        
    
    

    }

    function validarApellidos(elemento, SpanId){
        let span = document.getElementById(SpanId)
        let wordCount = elemento.value.trim().replace(/\s+/gi, ' ').split(' ').length;
        if (wordCount != 2) {
            span.innerHTML = "Ingresar dos apellidos" 
            span.style.color = "red"
            elemento.style.border = '1px red solid'
            return false;
        }else{
            span.innerHTML = "" ;
            elemento.style.border = '1px green solid'

            return true;
        } 
    }


    function validarNombres(elemento, SpanId){
        let span = document.getElementById(SpanId)
        let wordCount = elemento.value.trim().replace(/\s+/gi, ' ').split(' ').length;
        if (wordCount != 2) {
            span.innerHTML = "Ingresar dos nombres" ;
            elemento.style.border = '1px red solid'
            elemento.className = 'error'
            span.style.color = "red"
            return false;
        } else if(elemento.value.length == 0){
            document.getElementById('mensajeNombres').innerHTML = 'El campo nombres esta vacio'
            return false;
    }

        else{
            span.innerHTML = "" ;
            elemento.style.border = '1px green solid'
            return true;
        } 
        


    }

    function validarCampoContrasena(nombreSpanId, elemento){
        let span = document.getElementById(nombreSpanId)
        
        if(validarContrasena(elemento.value)){
            span.style="green"
            span.innerHTML="contraseña valida"
        }else{
            span.style="red"
            span.innerHTML="contraseña no valida"
        }
    }

    function validarContrasena(contrasenna){
		if(contrasenna.length >= 8){		
            var mayuscula = false;
            var minuscula = false;
            var numero = false;
            var caracter_raro = false;
				
            for(var i = 0;i<contrasenna.length;i++){
                if(contrasenna.charCodeAt(i) >= 65 && contrasenna.charCodeAt(i) <= 90){
						mayuscula = true;
				}else if(contrasenna.charCodeAt(i) >= 97 && contrasenna.charCodeAt(i) <= 122){
						minuscula = true;
                }else if(contrasenna.charCodeAt(i) >= 48 && contrasenna.charCodeAt(i) <= 57){
						numero = true;
                }else{
                    caracter_raro = true;
				}
			}
			if(mayuscula == true && minuscula == true && caracter_raro == true && numero == true){
				return true;
			}
		}	
        return false;
	}

    function ValidarCorreo(nombreSpanId, elemento) {
        let span = document.getElementById(nombreSpanId);
        let correo = elemento.value;
        let email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        span.innerHTML = ""
        
        if(elemento.value.length==0){
            span.innerHTML = "Este campo es obligatorio"
            span.style.color = "orange"
            return false
        }else if (!email.test(correo)) {
            span.innerHTML = "Correo erroneo"
            span.style.color = "red"
            return false
        } else {
            span.innerHTML = "Correo valido"
            span.style.color = "green"
            return true
        }
    }

 

 