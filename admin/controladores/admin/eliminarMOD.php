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
        <title>Eliminar datos de persona </title>
    </head>
    <body>
        <?php
            //incluir conexión a la base de datos
            include '../../../config/conexionBD.php';
            $codigo = $_GET["id"];
            $idmod = $_GET['idmod'];
            //Si voy a eliminar físicamente el registro de la tabla
            //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
            date_default_timezone_set("America/Guayaquil");
            $fecha = date('Y-m-d H:i:s', time());
            $sql = "UPDATE usuarios SET usu_eliminado = 'S', usu_fecha_modificacion = '$fecha' WHERE
            usu_id = $codigo";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Se ha eliminado los datos correctamemte!!!</p>";

                header("Location: ../../../admin/vista/admin/telefonos.php?id=$idmod");

            } else {
                echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
            }
            echo "<a href=' ../../vista/admin/indexMod.php?id=$idmod &idmod=$codigo'>Regresar</a>";
            $conn->close();
        ?>
    </body>
</html>