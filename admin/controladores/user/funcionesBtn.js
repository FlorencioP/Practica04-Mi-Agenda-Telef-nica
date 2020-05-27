//Charly
var editando=false;
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

function btnCancelar(){
    document.getElementById("centro").setAttribute("style" ,"display: inline-block;");
    document.getElementById("centro2").setAttribute("style" ,"display: none;");
    document.getElementById("centro3").setAttribute("style" ,"display: none;");
}

function cambiarContra(){
    document.getElementById("centro").setAttribute("style" ,"display: none;");
    document.getElementById("centro3").setAttribute("style" ,"display: none;");
    document.getElementById("centro2").setAttribute("style" ,"display: inline-block;");
}

function agregarTlf(){
    document.getElementById("centro").setAttribute("style" ,"display: none;");
    document.getElementById("centro2").setAttribute("style" ,"display: none;");
    document.getElementById("centro3").setAttribute("style" ,"display: inline-block;");
}

function eliminar(id){
    var con=confirm("esta seguro que quiere eliminar su cuenta");
    if(con === true){
        window.location= '../../controladores/user/eliminar.php?id='+id;
    }
}

function recargarUsu(id){
    editando=false;
    window.location= '../../vista/usuario/index.php?id='+id;
}

function modificarTlf(idT,id){
    editando=false;
    var numero=document.querySelector('#numeroT').value;
    var tipo=document.querySelector('#tipoT').value;
    var operadora=document.querySelector('#operadoraT').value;
    window.location= '../../controladores/user/modificarTelefono.php?idT='+idT+'&id='+id+'&numeroT='+numero+'&tipoT='+tipo+'&operadoraT='+operadora;
}

function cambiarRenglon(nodo,idT,id){
    if (editando == false) {
        var nodoTd = nodo.parentNode;
        var nodoTr = nodoTd.parentNode;
        var nodosEnTr = nodoTr.getElementsByTagName('td');
        var numero = nodosEnTr[0].textContent; 
        var tipo = nodosEnTr[1].textContent;
        var operadora = nodosEnTr[2].textContent;
        
        var nuevoCodigoHtml = '<td class="tg-y6988"><input type="text" name="numeroT" id="numeroT" value="'+numero+'"onkeyup="validarTlf2()" size="10"></td>'+
        '<td class="tg-y6988"><input type="text" name="tipoT" id="tipoT" value="'+tipo+'" size="5"</td>'+
        '<td class="tg-y6988"><input type="text" name="operadoraT" id="operadoraT" value="'+operadora+'" size="5"</td>' +
        '<td class="tg-y6988"><span style="cursor: pointer" onclick="modificarTlf('+idT+','+id+')">Aceptar</span></td>'+
        '<td class="tg-y6988"><span style="cursor: pointer" onclick="recargarUsu('+id+')">Cancelar</span></td>';
        
        nodoTr.innerHTML = nuevoCodigoHtml;
        
        editando = "true";
    }
}

function capturarEnvio(){

    var nodoContenedorForm = document.getElementById('contenedorForm'); //Nodo DIV
    
    nodoContenedorForm.innerHTML = 'Pulse Aceptar para guardar los cambios o cancelar para anularlos'+
    
    '<form name = "formulario" action="http://aprenderaprogramar.com" method="get" onsubmit="capturarEnvio()" onreset="anular()">'+
    
    '<input type="hidden" name="alimento" value="'+document.querySelector('#alimento').value+'">'+
    
    '<input type="hidden" name="calorias" value="'+document.querySelector('#calorias').value+'">'+
    
    '<input type="hidden" name="grasas" value="'+document.querySelector('#grasas').value+'">'+
    
    '<input type="hidden" name="proteina" value="'+document.querySelector('#proteina').value+'">'+
    
    '<input type="hidden" name="carbohidratos" value="'+document.querySelector('#carbohidratos').value+'">'+
    
    '<input class="boton" type = "submit" value="Aceptar"> <input class="boton" type="reset" value="Cancelar">';
    
    document.formulario.submit();
    
    }
