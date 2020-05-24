<?php 
    session_start(); 
    
    include '../../config/conexionBD.php'; 
    
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null; 
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null; 
    $sql = "SELECT * FROM usuarios WHERE usu_correo = '$usuario' and usu_contrasena = MD5('$contrasena')"; 
    $result = $conn->query($sql); 
    
    if ($result->num_rows > 0) { 
        $_SESSION['isLogged'] = TRUE; 

        //header("Location: ../../admin/vista/usuario/index.php"); 
        header("Location: ../vista/paginashtml/index.php"); 

    } else { 

        header("Location: ../vista/paginashtml/login.html"); 
    } 
    
    
    $conn->close(); 

?>