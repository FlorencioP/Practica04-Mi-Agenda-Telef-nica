

function mostrarNumero( id){

    if (window.XMLHttpRequest) { 
        // code for IE7+, Firefox, Chrome, Opera, Safari 
        xmlhttp = new XMLHttpRequest(); 
    } else { // code for IE6, IE5 
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
    } 

    xmlhttp.onreadystatechange = function() { 
        if (this.readyState == 4 && this.status == 200) { 
            //alert("llegue"); 
            document.getElementById("tabla").innerHTML = this.responseText; 
        } 
    }; 
    
    xmlhttp.open("GET","../../controladores/admin/numeros.php?id="+id,true); 
    xmlhttp.send(); 

}

function buscarNumero( id ){

    var num = document.getElementById("numero").value; 
    console.log(num)
    console.log(id)
    if (num == "") { 

        document.getElementById("tabla").innerHTML = " <b>No se a detectado el Numero </b>"; 


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
                document.getElementById("tabla").innerHTML = this.responseText; 
            } 
        }; 
        
        xmlhttp.open("GET","../../controladores/admin/numerosBud.php?id="+id+" &num="+num,true); 
        xmlhttp.send(); 
    } 
    return false;

}