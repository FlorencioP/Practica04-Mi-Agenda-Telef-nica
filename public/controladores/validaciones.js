//Charly
var bandera;
var c=0;
var n=0;
var a=0;
var d=0;
var t=0;
var f=0;
var co=0;
var p=0;
var tip=0;
var op=0;
function validarForm(){
    if(c != 0 && n!=0 && a!=0 && d!=0 && t!=0 && f!=0 && co!=0 && p!=0 && tip!=0 && op!=0){
        return bandera=true;
    }
    else{
        return bandera=false;
    }
}

function validarDireccion(){
    var dir=document.getElementById("Direccion").value;
    if(dir==""){
        document.getElementById("msjDireccion").innerHTML="Tiene que ingresar una direccion";
        document.getElementById("msjDireccion").style.color="red";
        document.getElementById("Direccion").style.borderColor="red";
        d=0;
    }
    else{
        document.getElementById("msjDireccion").innerHTML="";
        document.getElementById("Direccion").style.borderColor="black";
        d=1;
    }   
}

function validarTipo(){
    var dir=document.getElementById("tipo").value;
    
    if(dir==""){
        document.getElementById("msjTipo").innerHTML="Tiene que ingresar un tipo de numero de telefono";
        document.getElementById("msjTipo").style.color="red";
        document.getElementById("tipo").style.borderColor="red";
        tip=0;
    }
    else{
        document.getElementById("msjTipo").innerHTML="";
        document.getElementById("tipo").style.borderColor="black";
        tip=1;
    }   
}

function validarOperadora(){
    var dir=document.getElementById("operadora").value;
    console.log("sadasd");
    if(dir==""){
        document.getElementById("msjOperadora").innerHTML="Tiene que ingresar una operadora";
        document.getElementById("msjOperadora").style.color="red";
        document.getElementById("operadora").style.borderColor="red";
        op=0;
    }
    else{
        document.getElementById("msjOperadora").innerHTML="";
        document.getElementById("operadora").style.borderColor="black";
        op=1;
    }   
}

function validarTamano(){
    var ced=document.getElementById("Cedula").value;
    var cedlong=ced.length;
    validarNumero(document.getElementById("Cedula"));
    if(cedlong > 10){
        document.getElementById("Cedula").value=ced.slice(0,10);
    }
    if (ced==""){
        document.getElementById("msjCedula").innerHTML='La longitud de la cedula no es correcta';
        document.getElementById("msjCedula").style.color="red";
        document.getElementById("Cedula").style.borderColor="red";
        c=0;
    }
    if(cedlong===10){
        document.getElementById("msjCedula").innerHTML='';
        document.getElementById("Cedula").style.borderColor="black";
        validarCedula();
    }
}

function validarCedula(){
    var ced=document.getElementById("Cedula").value;
    var cedlong=ced.length;
    var ultimo=ced.charAt(9);
    var mul=0;
    var cont=0;
    if (cedlong<10){
        document.getElementById("msjCedula").innerHTML='La longitud de la cedula no es correcta';
        document.getElementById("msjCedula").style.color="red";
        document.getElementById("Cedula").style.borderColor="red";
        c=0;
    }
    else{
        numced=0;
        for(i=0; i<cedlong-1; i++){
            numced=ced.charAt(i);
            if(i%2==0){
                mul = numced*2;
                if(mul >= 10){
                    mul=mul-9;
                }
            }
            else{
                mul=numced*1;
            }
            cont=cont+mul;
        }

        var cont2=cont/10;
        var decSup=Math.ceil(cont2)
        
        decSup=decSup*10;
        
        var resultado = decSup-cont;

        if(resultado != ultimo){
            document.getElementById("Cedula").style.borderColor="red";
            document.getElementById("msjCedula").innerHTML="La cedula es incorrecta";
            document.getElementById("msjCedula").style.color="red";
            c=0;
        }
        else{
            document.getElementById("msjCedula").innerHTML="";
            document.getElementById("Cedula").style.borderColor="black";
            c=1;
        }
    }
}

function valLeNom(){
    validarLetras(document.getElementById("Nombre"));
}

function validarNombres(){
    var nombres=document.getElementById("Nombre").value;
    //validarNumero(document.getElementById("Nombre"));
    var spNom=nombres.split(" ");
    var nom1=spNom[0];
    var nom2=spNom[1];
    if(nom1 != "" && nom2 != "" && spNom.length==2){
        document.getElementById("msjNombres").innerHTML="";
        document.getElementById("Nombre").style.borderColor="black";
        n=1;
    }
    else{
        document.getElementById("msjNombres").innerHTML="Se deben ingresar dos nombres";
        document.getElementById("msjNombres").style.color="red";
        document.getElementById("Nombre").style.borderColor="red";
        n=0;
    }
}

function valApeLe(){
    validarLetras(document.getElementById("Apellido"));
}

function validarApellidos(){
    var nombres=document.getElementById("Apellido").value;
    //validarLetras(document.getElementById("Apellido"));
    var spNom=nombres.split(" ");
    var ape1=spNom[0];
    var ape2=spNom[1];
    if(ape1 != "" && ape2 != "" && spNom.length==2){
        document.getElementById("msjApellido").innerHTML="";
        document.getElementById("Apellido").style.borderColor="black";
        a=1;
    }
    else{
        document.getElementById("msjApellido").innerHTML="Se deben ingresar dos apellidos";
        document.getElementById("msjApellido").style.color="red";
        document.getElementById("Apellido").style.borderColor="red";
        a=0;
    }
}

function validarTlf(){
    var telf=document.getElementById("Telefono").value;
    var telfLong=telf.length;
    validarNumero(document.getElementById("Telefono"));
    if(telfLong > 10){
        document.getElementById("Telefono").value=telf.slice(0,10);
    }
    validarLongTel()
}

function validarLongTel(){
    var telf=document.getElementById("Telefono").value;
    var telfLong=telf.length;
    if(telfLong < 7){
        document.getElementById("Telefono").style.borderColor="red";
        document.getElementById("msjTelefono").innerHTML="el numero debe contener 7 digitos minimo"
        document.getElementById("msjTelefono").style.color="red";
        t=0;
    }
    else{
        document.getElementById("Telefono").style.borderColor="black";
        document.getElementById("msjTelefono").innerHTML=""
        t=1;
    }
}

function validarFecha(){
    var fecha=document.getElementById("Fecha").value;
    var sepFecha=fecha.split("/");
    var dia=sepFecha[0];
    var mes=sepFecha[1];
    var year=sepFecha[2];
    console.log("fecha"+fecha.charAt(4));
    if(fecha.length > 1){
        if(fecha.slice(0,2) > 31 || fecha.slice(0,2) < 0 || fecha.slice(0,2)==="00" || fecha.charAt(1)==="/" ){
            document.getElementById("Fecha").value="";
            document.getElementById("Fecha").borderColor="red";
            document.getElementById("msjFecha").innerHTML="recuerde que el dia tiene que ser con dos digitos y tiene que ser entre 01 - 31";
            document.getElementById("msjFecha").style.color="red";
            f=0;
        }
        else if(mes > 12 || mes < 0 || mes === "00" || fecha.charAt(4)==="/"){
            document.getElementById("Fecha").value=dia+"/";
            document.getElementById("Fecha").style.borderColor="red";
            document.getElementById("msjFecha").innerHTML="recuerde que el mes tiene que ser con dos digitos y tiene que ser entre 01 - 12";
            document.getElementById("msjFecha").style.color="red";
            f=0;
        }
        /*else{
            document.getElementById("Fecha").borderColor="black";
            document.getElementById("msjFecha").innerHTML="";
        }*/
        if(fecha.length > 6){
            if(year > 2020 || (fecha.slice(6,10) < 1920 && fecha.slice(6,10).length==4)){
                document.getElementById("Fecha").value=dia+"/"+mes+"/";
                document.getElementById("Fecha").style.borderColor="red";
                document.getElementById("msjFecha").innerHTML="recuerde que el año tiene que ser con cuatro digitos y tiene que ser entre 1920 - 2020";
                document.getElementById("msjFecha").style.color="red";
                f=0;
            }
            else if(fecha.slice(6,fecha.length).length<4){
                document.getElementById("Fecha").style.borderColor="red";
                document.getElementById("msjFecha").innerHTML="recuerde que el año tiene que ser con cuatro digitos y tiene que ser entre 1920 - 2020";
                document.getElementById("msjFecha").style.color="red";
                f=0;
            }
            else{
                document.getElementById("Fecha").style.borderColor="black";
                document.getElementById("msjFecha").innerHTML="";
                f=1;
            }
        }
    }
    else{
        document.getElementById("Fecha").style.borderColor="red";
        document.getElementById("msjFecha").innerHTML="este campo es obligatorio";
        document.getElementById("msjFecha").style.color="red";
        f=0;
    }
}

function validarCorreo(){
    var correo=document.getElementById("Correo").value;
    var corrLong=correo.length;
    if(correo == ""){
        document.getElementById("Correo").style.borderColor="red";
        document.getElementById("msjCorreo").innerHTML="este campo es obligatorio";
        document.getElementById("msjCorreo").style.color="red";
        co=0;
    }
    else if(corrLong>3){
        var sepcorr=correo.split("@");
        var antes=sepcorr[0];
        var despues=sepcorr[1];
        if(antes != "" && antes.length>=3 && despues != ""){
                document.getElementById("Correo").style.borderColor="black";
                document.getElementById("msjCorreo").innerHTML="";
               if(despues != "ups.edu.ec" && despues != "est.ups.edu.ec"){
                    document.getElementById("Correo").style.borderColor="red";
                    document.getElementById("msjCorreo").innerHTML="error en la extencion,las extenciones admitidas son ups.edu.ec y est.ups.edu.ec";
                    document.getElementById("msjCorreo").style.color="red";
                    co=0;
                }
                else{
                    document.getElementById("Correo").style.borderColor="black";
                    document.getElementById("msjCorreo").innerHTML="";
                    co=1;
                } 
        }
        else{
            document.getElementById("Correo").style.borderColor="red";
            document.getElementById("msjCorreo").innerHTML="error el correo tiene que tener minimo tres valores alfanumericos";
            document.getElementById("msjCorreo").style.color="red";
            co=0;
        }
    }
}

function validarPassword(){
    var password=document.getElementById("password");
    var passLong=password.value.length;
    var mayus=0;
    var minus=0;
    var carEsp=0;
    var miAscii = 0;
    console.log(passLong);
    if(passLong>=8){
        document.getElementById("password").style.borderColor="black";
        document.getElementById("msjPassword").innerHTML="";
        for(i=0;i<passLong;i++){
            miAscii= password.value.charCodeAt(i);
            if(miAscii >= 65 && miAscii<= 90){
                mayus=1;
            }
            if(miAscii>=97 && miAscii<=122){
                minus=1;
            }
            if(miAscii==36 || miAscii==95 || miAscii==64){
                carEsp=1;
            }
        }
        if(mayus==1 && minus==1 && carEsp==1){
            document.getElementById("password").style.borderColor="black";
            document.getElementById("msjPassword").innerHTML="";
            p=1;
        }
        else{
            document.getElementById("password").style.borderColor="red";
            document.getElementById("msjPassword").innerHTML="la contraseña debe tener almenos: una letra mayúscula, una letra minúscula y un carácter especial (@, _, $)";
            document.getElementById("msjPassword").style.color="red";
            p=0;
        }
    }
    else{
        document.getElementById("password").style.borderColor="red";
        document.getElementById("msjPassword").innerHTML="La longitud tiene que ser minimo de 8 caracteres";
        document.getElementById("msjPassword").style.color="red";
        p=0;
    }
}

function validarNumero(elemento){
    if(elemento.value.length > 0){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
    if(miAscii >= 48 && miAscii <= 57){
        return true
    }else {
        elemento.value = elemento.value.substring(0, elemento.value.length-1)
        return false
    }
    }else{
        return true
    }
}

function validarLetras(elemento){
    if(elemento.value.length > 0){
        var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
    if((miAscii >= 97 && miAscii <= 122) || (miAscii >= 65 && miAscii <= 90) || miAscii==32 ){
        return true
    }else {
        elemento.value = elemento.value.substring(0, elemento.value.length-1)
        return false
    }
    }else{
        return true
    }
}