<!DOCTYPE html> 
<?php 
        session_start();
        
        
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === FALSE){ 
            header("Location: ../../../public/vista/paginashtml/login.html"); 
        }
        
        
        $id = $_GET['id'];
        $mtod = null;


    ?>

<head> 
    <meta charset="UTF-8"> 
    <title>Guia Telefonica</title> 
    <link rel="stylesheet" type="text/css" href="../../../public/vista/css/directorio.css"/>
    <script src='../../controladores/admin/busquedaNums.js' ></script>
</head> 

<body onload="mostrarTodos(<?php echo $id ?>);"> 
    


    <p>Menu de Busqueda</p>

    <div id="volver">
        <a href="../../../public/vista/paginashtml/index.php?id=<?php echo $id ?>"><img src="../../../public/vista/imagenes/pngwing.com.png"></a> 
    </div>

    <form id="formularioC">

        <label for="cedula">Cedula de la pesona</label> <br>

        <input type="text" id="cedula" name="cedula" value="" placeholder="Ingrese la cedula de la persona"/> <br>

        <input type="button" id="celBusc" name="celBusc" value="Buscar por Cedula" onclick="buscarPorCedula()" /><br>   

    </form>


    
    <br>

    <form id="formularioM" onsubmit="return buscarPorMail()">

        <label for="mail">Email de la Persona</label><br>

        <input type="text" id="mail" name="mail" value="" placeholder="Ingrese el mail de la persona"/> <br>

        <input type="button" id="maiBusc" name="maiBusc" value="Buscar por Mail" onclick="buscarPorMail()"/><br>   

    </form>

    <button id="reset" onclick="mostrarTodos()">Mostrar a Todos los usuarios </button>

    <button id="add" onclick="nuevoUsuario( <?php echo $id ?> )">Añadir un usuario </button>
    
    <div id="usuarios">


        
    
    
    
    </div>
    
    
    
    <div id="informacion">


        
    
    
    
    </div>






</body>


</html>