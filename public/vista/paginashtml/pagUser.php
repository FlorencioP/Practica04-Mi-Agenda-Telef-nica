
<!DOCTYPE html>
<html lang="es">




<head>
    <meta charset="UTF-8">
    <title>User (El rincón F)</title>


</head>

<body>
    
<?php 
        session_start(); 
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ 
           
        }else{
            header("Location: login.html"); 
        }
    ?>


<p>Logeado con exito</p>


    
</body>


</html>