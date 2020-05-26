<?php 
    //incluir conexión a la base de datos
   // echo "<p>Si llega pa aca</p>"; 
    include "../../../config/conexionBD.php"; 
    $mail = $_GET['mail']; 
    //echo "Hola " . $cedula; 


    
     
    
    $sqlc = "SELECT usu_id FROM usuarios WHERE usu_eliminado = 'N' and usu_correo='$mail'"; 

    $resultc = $conn->query($sqlc);
    while ($row = $resultc -> fetch_assoc()){
        $idcel = $row['usu_id']; 
    } 
    

    $sql = "SELECT * FROM telefonos WHERE tel_eliminado = 'N' and USUARIOS_usu_id= '$idcel' "; 
    //cambiar la consulta para puede buscar por ocurrencias de letras 
    $result = $conn->query($sql); 
    echo " <table style='width:100%'> 
    <tr> <th>Numero</th> 
        <th>Tipo</th> 
        <th>Operadora</th>
        </tr>";  
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { 
            echo "<tr>"; 
            echo " <td>" . $row['tel_numero'] . "</td>"; 
            echo " <td>" . $row['tel_tipo'] ."</td>"; 
            echo " <td>" . $row['tel_operadora'] . "</td>";
            echo "</tr>"; 
        }
             
    } else { 
        echo "<tr>"; 
        echo " <td colspan='7'> No existen Telefonos registrado en el sistema </td>"; 
        echo "</tr>"; 
    } 
    echo "</table>"; 
    $conn->close(); 
?>