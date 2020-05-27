<?php 

    include "../../../config/conexionBD.php"; 
    $idcel = $_GET['id']; 


    $sql = "SELECT * FROM telefonos WHERE tel_eliminado = 'N' and USUARIOS_usu_id= '$idcel' "; 


    $result = $conn->query($sql); 
    echo " <table class='tg' style='width:95%'> 
    <tr> <th class='tg-46ru'>Numero</th> 
        <th class='tg-46ru'>Tipo</th> 
        <th class='tg-46ru'>Operadora</th>
        </tr>";  
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { 
            echo "<tr>"; 
            echo " <td class='tg-y698'>" . $row['tel_numero'] . "</td>"; 
            echo " <td class='tg-y698'>" . $row['tel_tipo'] ."</td>"; 
            echo " <td class='tg-y698'>" . $row['tel_operadora'] . "</td>";
            echo "</tr>"; 
        }
             
    } else { 
        echo "<tr>"; 
        echo " <td  class='tg-y698' colspan='10'> Este Usuario no tiene Telefonos registrados </td>"; 
        echo "</tr>"; 
    } 
    echo "</table>"; 
    $conn->close(); 
?>