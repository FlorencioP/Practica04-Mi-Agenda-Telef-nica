<!DOCTYPE html> 
<html> 

<head> 
    <meta charset="UTF-8"> 
    <title>Guia Telefonica</title> 
</head> 

<body> 
    
    <?php 
        session_start(); 
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === FALSE){ 
            header("Location: /SistemaDeGestion/public/vista/login.html"); 
        } 
    ?>  


        <p>Telefonos Usuario</p>


</body>


</html>
