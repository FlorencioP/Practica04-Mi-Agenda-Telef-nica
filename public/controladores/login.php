<?php 
//Charly


    session_start(); 



    
    include '../../config/conexionBD.php'; 
    
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null; 
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null; 
    $sql = "SELECT * FROM usuarios WHERE usu_correo = '$usuario' and usu_contrasena = MD5('$contrasena') and usu_eliminado = 'N'"; 

    $result = $conn->query($sql); 
    
    if ($result->num_rows > 0) { 


        $_SESSION['loggedin'] = true;

        $sql2 = "SELECT usu_id FROM usuarios WHERE usu_correo = '$usuario' and usu_contrasena = MD5('$contrasena')";

        $result2 = $conn->query($sql2);
        while ($row = $result2 -> fetch_assoc()){
            $id = $row['usu_id']; 
            
        } 
        
        //header("Location: ../../admin/vista/usuario/index.php"); 
        header("Location: ../vista/paginashtml/index.php?id=" . $id); 

    } else { 

        header("Location: ../vista/paginashtml/login.html"); 
    } 
    
    
    $conn->close(); 

?>
