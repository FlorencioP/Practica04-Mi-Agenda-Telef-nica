function buscarPorCedula() { 

    var cedula = document.getElementById("cedula").value; 
    if (cedula == "") { 
        ocultarTelfs()
        document.getElementById("usuarios").innerHTML = " <b>No se a detectado cedula</b>"; 


    } else { 
        
        if (window.XMLHttpRequest) { 
            // code for IE7+, Firefox, Chrome, Opera, Safari 
            xmlhttp = new XMLHttpRequest(); 
        } else { // code for IE6, IE5 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
        } 

        xmlhttp.onreadystatechange = function() { 
            if (this.readyState == 4 && this.status == 200) { 
                //alert("llegue"); 
                document.getElementById("usuarios").innerHTML = this.responseText; 
            } 
        }; 
        ocultarTelfs()
        xmlhttp.open("GET","../../controladores/admin/peticionUser.php?cedula="+cedula,true); 
        xmlhttp.send(); 
    } 
    return false;
}



function buscarPorMail() { 

    var mail = document.getElementById("mail").value; 
    if (mail == "") { 
        ocultarTelfs()
        document.getElementById("usuarios").innerHTML = " <b>No se a detectado el Mail</b>"; 


    } else { 
        if (window.XMLHttpRequest) { 
            // code for IE7+, Firefox, Chrome, Opera, Safari 
            xmlhttp = new XMLHttpRequest(); 
        } else { // code for IE6, IE5 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
        } 

        xmlhttp.onreadystatechange = function() { 
            if (this.readyState == 4 && this.status == 200) { 
                //alert("llegue"); 
                document.getElementById("usuarios").innerHTML = this.responseText; 
            } 
        }; 
        ocultarTelfs()
        xmlhttp.open("GET","../../controladores/admin/peticionUserMail.php?mail="+mail,true); 
        xmlhttp.send(); 
    } 
    return false;
}


function ocultarTelfs() {
    document.getElementById("informacion").innerHTML = " ";  
}



function mostrarTodos() {


    if (window.XMLHttpRequest) {
         // code for IE7+, Firefox, Chrome, Opera, Safari 
         xmlhttp = new XMLHttpRequest(); 
    } else { 
                // code for IE6, IE5 
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
        } 
            
        xmlhttp.onreadystatechange = function() { 
            if (this.readyState == 4 && this.status == 200) { 
                //alert("llegue"); 
                document.getElementById("usuarios").innerHTML = this.responseText; 
            } 
        }; 
    ocultarTelfs()
    xmlhttp.open("GET","../../controladores/admin/peticionTodos.php",true); 
    xmlhttp.send(); 
    

}

function buscarPorid( id) {

    console.log(id)
    buscarPorIdUser( id )

    if (id == "") { 

        document.getElementById("informacion").innerHTML = " <b>No se a detectado id</b>"; 


    } else { 
        
        if (window.XMLHttpRequest) { 
            // code for IE7+, Firefox, Chrome, Opera, Safari 
            xmlhttp = new XMLHttpRequest(); 
        } else { // code for IE6, IE5 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
        } 

        xmlhttp.onreadystatechange = function() { 
            if (this.readyState == 4 && this.status == 200) { 
                //alert("llegue"); 
                document.getElementById("informacion").innerHTML = this.responseText; 
            } 
        }; 
        
        xmlhttp.open("GET","../../controladores/admin/peticioNums.php?id="+id,true); 
        xmlhttp.send(); 
    } 
    return false;
}

function buscarPorIdUser( id ) { 


    if (window.XMLHttpRequest) { 
        // code for IE7+, Firefox, Chrome, Opera, Safari 
        xmlhttp = new XMLHttpRequest(); 
    } else { // code for IE6, IE5 
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
    } 

    xmlhttp.onreadystatechange = function() { 
        if (this.readyState == 4 && this.status == 200) { 
            //alert("llegue"); 
            document.getElementById("usuarios").innerHTML = this.responseText; 
        } 
    }; 
    ocultarTelfs()
    xmlhttp.open("GET","../../controladores/admin/peticionUserid.php?id="+id,true); 
    xmlhttp.send(); 

}


function nuevoUsuario( id ){
    
    location.replace("../../vista/admin/registrar_usuario.php?id="+id);
    
}
