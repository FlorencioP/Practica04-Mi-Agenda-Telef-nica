<!DOCTYPE html> 
<html> 

<head> 
    <meta charset="UTF-8"> 
    <title>Gestión de usuarios</title> 
</head> 

<body> 
    
<?php 
        session_start(); 
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === FALSE){ 
            header("Location: /SistemaDeGestion/public/vista/login.html"); 
        } 
    ?>

    <table style="width:100%"> 
        <tr> 
            <th>Cedula</th> 
            <th>Nombres</th> 
            <th>Apellidos</th> 
            <th>Dirección</th> 
            <!--<th>Telefono</th> -->
            <th>Correo</th> 
            <th>Fecha Nacimiento</th> 
        </tr> 
    <?php 
        include '../../../config/conexionBD.php'; 
        $sql = "SELECT * FROM usuarios"; 
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) { 
                echo "<tr>"; 
                echo " <td>" . $row["usu_cedula"] . "</td>"; 
                echo " <td>" . $row['usu_nombres'] ."</td>"; 
                echo " <td>" . $row['usu_apellidos'] . "</td>"; 
                echo " <td>" . $row['usu_direccion'] . "</td>"; 

                echo " <td>" . $row['usu_correo'] . "</td>"; 

                echo "</tr>"; 
            }

        } else { 
            echo "<tr>"; 
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>"; 
            echo "</tr>"; 
            
        } 
        $conn->close(); 
    ?> 

    </table> 

</body> 

</html>