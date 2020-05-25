function modificar(){
    document.getElementById("aceptar").setAttribute("style" ,"display: inline-block;");
    document.getElementById("cancelar").setAttribute("style" ,"display: inline-block;");
    document.getElementById("Cedula").disabled=false;
    document.getElementById("Nombre").disabled=false;
    document.getElementById("Apellido").disabled=false;
    document.getElementById("Direccion").disabled=false;
    document.getElementById("Fecha").disabled=false;
    document.getElementById("Correo").disabled=false;
}

function bloqueo(){
    document.getElementById("aceptar").setAttribute("style" ,"display: none;");
    document.getElementById("cancelar").setAttribute("style" ,"display: none;");
    document.getElementById("Cedula").disabled=true;
    document.getElementById("Nombre").disabled=true;
    document.getElementById("Apellido").disabled=true;
    document.getElementById("Direccion").disabled=true;
    document.getElementById("Fecha").disabled=true;
    document.getElementById("Correo").disabled=true;
}