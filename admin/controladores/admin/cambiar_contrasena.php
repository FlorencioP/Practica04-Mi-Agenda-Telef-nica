<?php 
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        //echo "<script src='../scripts/indexopclog.js?id=$id' ></script>";
        header("Location: /SistemaDeGestion/public/vista/login.html");
    } 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar datos de persona </title>
    </head>
    <body>
    <?php
        //incluir conexión a la base de datos
        include '../../../config/conexionBD.php';
        $codigo = $_GET["id"];
        $contrasena1 = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
        $contrasena2 = isset($_POST["newContrasena"]) ? trim($_POST["newContrasena"]) : null;
        $sqlContrasena1 = "SELECT * FROM usuarios where usu_id=$codigo and
        usu_contrasena=MD5('$contrasena1')";

        $result1 = $conn->query($sqlContrasena1);

        if ($result1->num_rows > 0) {
            date_default_timezone_set("America/Guayaquil");
            $fecha = date('Y-m-d H:i:s', time());
            $sqlContrasena2 = "UPDATE usuarios " .
            "SET usu_contrasena = MD5('$contrasena2'), " .
            "usu_fecha_modificacion = '$fecha' " .
            "WHERE usu_id = $codigo";
            if ($conn->query($sqlContrasena2) === TRUE) {
                echo "Se ha actualizado la contraseña correctamemte!!!<br>"; 
                header("Location: ../../../config/cerrar_sesion.php");
            } 
            else {
                echo "<p>Error: " . mysqli_error($conn) . "</p>";
            }
        }else{
            echo "<script>alert('la contrasena actual ingresada es incorrecta');
                        window.location= '../../vista/admin/index.php?id=$codigo';
                    </script>";
        }
        echo "<a href='../../vista/admin/index.php'>Regresar</a>";
        $conn->close();
        ?>
    </body>
</html>