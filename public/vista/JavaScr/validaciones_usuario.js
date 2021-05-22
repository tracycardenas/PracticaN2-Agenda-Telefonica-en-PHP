
function validarCamposObligatorios(){

    var bandera =true

    for (var i=0; i<document.forms[0].elements.length; i++){
    var elemento= document.forms[0].elements[i]

    if(elemento.value == '' && elemento.type == 'text'){

            if(elemento.id =='cedula'){
                document.getElementById('mensajeCedula').innerHTML='<br> la cedula esta vacia'
            }
            if(elemento.id =='nombres'){
                document.getElementById('mensajeNombres').innerHTML='<br> Los Nombres estan vacios'
            }
            if(elemento.id =='apellidos'){
                document.getElementById('mensajeApellidos').innerHTML='<br>  Los Apellidos estan vacios'
            }
            if(elemento.id =='direccion'){
                document.getElementById('mensajeDireccion').innerHTML='<br> la Direccion esta vacia'
            }
            if(elemento.id =='telefono'){
                document.getElementById('mensajeTelefono').innerHTML='<br> El telefono esta vacio'
            }
            if(elemento.id =='fechaNacimiento'){
                document.getElementById('mensajeFecha').innerHTML='<br> la fecha esta vacia'
            }
            if(elemento.id =='correo'){
                document.getElementById('mensajeCorreo').innerHTML='<br> El correo esta vacio'
            }
            if(elemento.id =='contraseña'){
                document.getElementById('mensajecontraseña').innerHTML='<br> La contraseña esta vacia'
            }

            elemento.style.border='1px red solid'
            elemento.className='error'
            bandera=false
        }
    }

    if(!bandera){
        alert('Error: revisa los comentarios')
    }
    return bandera
}

/*  Validar cedula*/
function validarCedula(nombreSpanId,elemento)
{ 

    if(elemento.value.length > 0){

    var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
    console.log(miAscii)
    
    if((miAscii >= 48 && miAscii <= 57) &&  (elemento.value.length <=10) ){

    return true
    
    }else {
    elemento.value = elemento.value.substring(0, elemento.value.length-1)
    }
    }else{

    return true 
    }

    if (elemento.value.length <=10){

        a=parseInt(elemento.value.substring(0,1))
		b=parseInt(elemento.value.substring(1,2))
		c=parseInt(elemento.value.substring(2,3))
		d=parseInt(elemento.value.substring(3,4))
		e=parseInt(elemento.value.substring(4,5))
		f=parseInt(elemento.value.substring(5,6))
		g=parseInt(elemento.value.substring(6,7))
		h=parseInt(elemento.value.substring(7,8))
		i=parseInt(elemento.value.substring(8,9))
		j=parseInt(elemento.value.substring(9))
			
			a=a*2
			if(a>=10) {
				a=a-10
				a=a+1}

			c=c*2;
			if(c>=10) {
				c=c-10
				c=c+1}
			
			e=e*2
			if(e>=10) {
				e=e-10
				e=e+1}
	
			g=g*2;
			if(g>=10) {
				g=g-10
				g=g+1}
			
			i=i*2
			if(i>=10) {
				i=i-10
				i=i+1}
			
			t=a+b+c+d+e+f+g+h+i;

		
			if(j!=0){
				t=t%10;
				if(10-t==j){
                    document.getElementById('mensajeCedula').innerHTML= '<br> '
                    elemento.style.border = '1px black solid'
                    elemento.className='error'
                    span.style='black';
                   
                }
                else{
                    document.getElementById('mensajeCedula').innerHTML='<br> Cedula Incorrecta'
                    elemento.style.border='1px red solid'
                    elemento.className='error'

                    
                }
				
			}
				else {
					if (j==0){
						if(t%10==j){
                            document.getElementById('mensajeCedula').innerHTML='<br> '
                            elemento.style.border = '1px black solid'
                            elemento.className='error'
                            span.style='black';
                            
                            
                        }
                        else{
                            document.getElementById('mensajeCedula').innerHTML='<br> Cedula Incorrecta'
                            elemento.style.border='1px red solid'
                            elemento.className='error'
                            
                        }
                    }
					}	
	}else{

        document.getElementById('mensajeCedula').innerHTML='<br> Cedula Incorrecta'
      
        elemento.style.border='1px red solid'
        elemento.className='error'

    }      
}


/*  Validar Nombres y Apellidos*/
  


function validarNombres(elemento)
{ 
    if (elemento.value.length > 0) {
        var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
        console.log(miAscii)
        if ( (miAscii >= 97 && miAscii <= 122) || (miAscii >= 65 && miAscii <= 90) || miAscii === 32) {
            var x = elemento.value
            if (x.includes(" ")) {
                if ((x.length - 1) > (x.indexOf(" "))) {
                    elemento.style.border = '1px black solid'
                    elemento.className = 'correcto'
                document.getElementById("mensajeNombres").innerHTML ="";
                    return true
                } else {
                    elemento.style.border = '1px red solid'
                    elemento.className = 'error'
                }
            } else {
                document.getElementById("mensajeNombres").innerHTML ="<br>Apellido invalido";
                elemento.style.border = '1px red solid'
                elemento.className = 'error'
                return false
            }

        } else {
            document.getElementById("mensajeNombres").innerHTML ="<br>Apellido invalido";
            elemento.value = elemento.value.substring(0, elemento.value.length - 1)
            return false
        }
    } else {
        return true
    }

}

function validarApellidos(elemento) {
    if (elemento.value.length > 0) {
        var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
        console.log(miAscii)
        if ( (miAscii >= 97 && miAscii <= 122) || (miAscii >= 65 && miAscii <= 90) || miAscii === 32) {
            var x = elemento.value
            if (x.includes(" ")) {
                if ((x.length - 1) > (x.indexOf(" "))) {
                    elemento.style.border = '1px black solid'
                    elemento.className = 'correcto'
                document.getElementById("mensajeApellidos").innerHTML ="";
                    return true
                } else {
                    elemento.style.border = '1px red solid'
                    elemento.className = 'error'
                }
            } else {
                document.getElementById("mensajeApellidos").innerHTML ="<br>Apellido invalido";
                elemento.style.border = '1px red solid'
                elemento.className = 'error'
                return false
            }

        } else {
            document.getElementById("mensajeApellidos").innerHTML ="<br>Apellido invalido";
            elemento.value = elemento.value.substring(0, elemento.value.length - 1)
            return false
        }
    } else {
        return true
    }

}
function validarTelefono(elemento)
{ 

    if(elemento.value.length > 0){

    var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
    console.log(miAscii)
    
    if((miAscii >= 48 && miAscii <= 57) &&  (elemento.value.length <=10) ){

    return true
    
    }else {
    elemento.value = elemento.value.substring(0, elemento.value.length-1)
    }
    }else{

    return true 
    }
    if((elemento.value.length <10)){
        document.getElementById('mensajeTelefono').innerHTML='<br> El telefono debe  tener minimo 10 digitos'

    }else{
        document.getElementById('mensajeTelefono').innerHTML='<br> '
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

