




function usuarios( rol,id ){
    
    console.log(rol)

    if (rol == "A"){

        document.getElementById("nombre").setAttribute("href" ,"../../../admin/vista/admin/index.php?id="+id )
        
    }else{

        document.getElementById("nombre").setAttribute("href" ,"../../../admin/vista/usuario/index.php?id="+id )
    }
}




function guia( rol,id ){
    
    console.log(rol)

    if (rol == "A"){

        document.getElementById("guiatef").setAttribute("href" ,"../../../admin/vista/admin/telefonos.php?id="+id )
        
    }else{

        document.getElementById("guiatef").setAttribute("href" ,"../../../admin/vista/usuario/telefonos.php?id="+id )
    }
}





document.getElementById("opcion2").setAttribute("href" ,"../../../config/cerrar_sesion.php" )
document.getElementById("opcion2").innerHTML='Cerrar Sesion'

document.getElementById("guiatef").innerHTML='Entrar a la guia Telefonica'
