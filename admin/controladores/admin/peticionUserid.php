<?php 
    //incluir conexión a la base de datos 
    include "../../../config/conexionBD.php"; 
    @$id = $_GET['id']; 
    //echo "Hola " . $cedula; 
    
    $sql = "SELECT * FROM usuarios WHERE usu_eliminado = 'N' and usu_id='$id' ORDER BY usu_nombres ASC"; 
    //cambiar la consulta para puede buscar por ocurrencias de letras 
    $result = $conn->query($sql); 
    
    echo " <table class='tg' style='width:95%'> 
        <tr> 
        <th class='tg-46ru'>Cedula</th> 
        <th class='tg-46ru'>Nombres</th> 
        <th class='tg-46ru'>Apellidos</th> 
        <th class='tg-46ru'>Dirección</th> 
 
        <th class='tg-46ru'>Correo</th> 
        <th class='tg-46ru'>Fecha Nacimiento</th> 
        <th class='tg-46ru'></th> 
        <th class='tg-46ru'> Perfil </th> 
        </tr>"; 
        
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { 
            echo "<tr>"; 
            echo " <td class='tg-y698'>" . $row['usu_cedula'] . "</td>"; 
            echo " <td class='tg-y698'>" . $row['usu_nombres'] ."</td>"; 
            echo " <td class='tg-y698'>" . $row['usu_apellidos'] . "</td>"; 
            echo " <td class='tg-y698'>" . $row['usu_direccion'] . "</td>"; 
            echo " <td class='tg-y698'>" . $row['usu_correo'] . "</td>"; 
            echo " <td class='tg-y698'>" . $row['usu_fecha_nacimiento'] . "</td>"; 

                        
            echo "  <td class='tg-y698'><button onclick='buscarPorid(" . $row['usu_id'] . ")'>Telefonos</button></td>";


            echo " <td class='tg-y698'><a href='../../vista/admin/indexMod.php?id=" . $id . " &idmod=" . $row['usu_id'] ."'>Modificar</a></td>";


            echo "</tr>"; 
        } 
    } else { 
        echo "<tr>"; 
        echo " <td class='tg-y698' colspan='10'>No se encontro al usuario </td>"; 
        echo "</tr>"; 
    } 
    echo "</table>"; 
    $conn->close(); 
?>