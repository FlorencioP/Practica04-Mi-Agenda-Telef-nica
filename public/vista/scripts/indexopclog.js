




function usuarios( rol ){
    
    console.log(rol)

    if (rol == "A"){

        document.getElementById("nombre").setAttribute("href" ,"../../../admin/vista/admin/index.php" )
        
    }else{

        document.getElementById("nombre").setAttribute("href" ,"../../../admin/vista/usuario/index.php" )
    }
}





document.getElementById("opcion2").setAttribute("href" ,"../../../config/cerrar_sesion.php" )
document.getElementById("opcion2").innerHTML='Cerrar Sesion'

document.getElementById("guiatef").setAttribute("href" ,"login.html" )
document.getElementById("guiatef").innerHTML='Entrar a la agenda'
