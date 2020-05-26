<?php 
    //incluir conexión a la base de datos 
    include "../../../config/conexionBD.php"; 
    $cedula = $_GET['cedula']; 
    //echo "Hola " . $cedula; 
    
    $sql = "SELECT * FROM usuarios WHERE usu_eliminado = 'N' and usu_cedula='$cedula' ORDER BY usu_nombres ASC"; 
    //cambiar la consulta para puede buscar por ocurrencias de letras 
    $result = $conn->query($sql); 
    
    echo " <table style='width:100%'> 
        <tr> 
        <th>Cedula</th> 
        <th>Nombres</th> 
        <th>Apellidos</th> 
        <th>Dirección</th> 
        <th>Telefono</th> 
        <th>Correo</th> 
        <th>Fecha Nacimiento</th> 
        <th></th> 
        <th></th> 
        <th></th> 
        </tr>"; 
        
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { 
            echo "<tr>"; 
            echo " <td>" . $row['usu_cedula'] . "</td>"; 
            echo " <td>" . $row['usu_nombres'] ."</td>"; 
            echo " <td>" . $row['usu_apellidos'] . "</td>"; 
            echo " <td>" . $row['usu_direccion'] . "</td>"; 
            echo " <td>" . $row['usu_correo'] . "</td>"; 
            echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>"; 

                        
            echo "  <td><button onclick='buscarPorid(" . $row['usu_id'] . ")'>Telefonos</button></td>";


            //sIN fUNCION
            echo " <td><a href='modificar.php?codigo=" . $row['usu_id'] . "'>Modificar</a></td>";
            //sIN fUNCION
            echo " <td><a href='modificar.php?codigo=" . $row['usu_id'] . "'>Eliminar</a></td>";

            echo "</tr>"; 
        } 
    } else { 
        echo "<tr>"; 
        echo " <td colspan='7'> No existe un usuarios registrado en el sistema con esa cedula </td>"; 
        echo "</tr>"; 
    } 
    echo "</table>"; 
    $conn->close(); 
?>