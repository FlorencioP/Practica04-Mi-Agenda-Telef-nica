<?php 
    //incluir conexión a la base de datos
   // echo "<p>Si llega pa aca</p>"; 
    include "../../config/conexionBD.php"; 
    @$cedula = $_GET['cedula']; 
    //echo "Hola " . $cedula; 


    
     
    
    $sqlc = "SELECT usu_id FROM usuarios WHERE usu_eliminado = 'N' and usu_cedula='$cedula'"; 

    $resultc = $conn->query($sqlc);
    while ($row = $resultc -> fetch_assoc()){
        $idcel = $row['usu_id']; 
    } 
    

    $sqlm = "SELECT usu_correo FROM usuarios WHERE usu_eliminado = 'N' and usu_cedula='$cedula'"; 

    $resultm = $conn->query($sqlm);
    while ($row = $resultm -> fetch_assoc()){
        $mail = $row['usu_correo']; 
    } 


    @$sql = "SELECT * FROM telefonos WHERE tel_eliminado = 'N' and USUARIOS_usu_id= '$idcel' "; 
    //cambiar la consulta para puede buscar por ocurrencias de letras 
    $result = $conn->query($sql); 
    echo " <table class='tg' style='width:95% '> 
    <tr> <th class='tg-46ru'>Numero</th> 
        <th class='tg-46ru'>Tipo</th> 
        <th class='tg-46ru'>Operadora</th>
        <th class='tg-46ru' ></th>
        <th class='tg-46ru' ></th>
        </tr>";  
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { 
            echo "<tr>"; 
            echo " <td class='tg-y698'>" . $row['tel_numero'] . "</td>"; 
            echo " <td class='tg-y698'>" . $row['tel_tipo'] ."</td>"; 
            echo " <td class='tg-y698'>" . $row['tel_operadora'] . "</td>";
            //mail y llamada

            echo " <td class='tg-y698'><a href='tel:+593" . $row['tel_numero'] . "'> Llamar </a></td>";
            echo " <td class='tg-y698'><a href='mailto:" . $mail . "'>Enviar un mail</a></td>";
            echo "</tr>"; 
        }
             
    } else { 
        echo "<tr>"; 
        echo " <td  colspan='10' class='tg-y698'> No existen telefonos registrados en el sistema </td>"; 
        echo "</tr>"; 
    } 
    echo "</table>"; 
    $conn->close(); 
?>