<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestión de usuarios</title>
    </head>
    <body>
        <table style="width:100%">
            <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
        </tr>
        <?php
            include '../../../config/conexionBD.php';
            $id=$_GET['id'];
            $sql = "SELECT * FROM telefonos WHERE USUARIOS_usu_id=$id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo " <td>" . $row['usu_numero'] . "</td>";
                    echo " <td>" . $row['usu_tipo'] . "</td>";
                    echo " <td>" . $row['usu_operadora'] . "</td>";
                    echo " <td> <a href='eliminar.php?codigo=" . $row['tel_id'] . "'>Eliminar</a> </td>";
                    echo " <td> <a href='modificar.php?codigo=" . $row['tel_id'] . "'>Modificar</a> </td>";
                    echo "</tr>";
                }
            } 
            else {
                echo "<tr>";
                echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
                echo "</tr>";
            }
            $conn->close();
        ?>
        </table>
        <a href='../../../config/cerrar_sesion.php'>cerrar sesion</a>
    </body>
</html>