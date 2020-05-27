<!DOCTYPE html> 
<head> 
    <meta charset="UTF-8"> 
    <title>Guia Telefonica</title> 

    <link rel="stylesheet" type="text/css" href="../../../public/vista/css/directorio.css"/>
    <script src='../../controladores/user/busquedaNums.js' ></script>

</head> 

<body> 
    
    <?php 
        session_start(); 
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === FALSE){ 
            header("Location: /SistemaDeGestion/public/vista/login.html"); 
        } else {
            $id = $_GET['id'];
        }

        $mtod = null;


    ?>

    <p>Menu de Busqueda</p>
    
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


    


    
    <div id="informacion">


        
    
    
    
    </div>






</body>


</html>