<?php 

    include "../../../config/conexionBD.php"; 
    $idcel = $_GET['id']; 


    $sql = "SELECT * FROM telefonos WHERE tel_eliminado = 'N' and USUARIOS_usu_id= '$idcel' "; 


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
        echo " <td colspan='7'> Este Usuario no tiene Telefonos registrados </td>"; 
        echo "</tr>"; 
    } 
    echo "</table>"; 
    $conn->close(); 
?>