function buscarPorCedula() { 


    var cedula = document.getElementById("cedulatest").value; 
    if (cedula == "") { 

        document.getElementById("informacion").innerHTML = " <b>No se a detectado cedula</b>"; 


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
        
        xmlhttp.open("GET","../../controladores/admin/peticioNums.php?cedula="+cedula,true); 
        xmlhttp.send(); 
    } 
    return false;
}