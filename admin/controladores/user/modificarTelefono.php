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
            @$codigo = $_GET["idT"];
            @$id=$_GET["id"];
            $telefono = isset($_GET["numeroT"]) ? trim($_GET["numeroT"]): null;
            $tipo = isset($_GET["tipoT"]) ? trim($_GET["tipoT"]): null;
            $operadora = isset($_GET["operadoraT"]) ? trim($_GET["operadoraT"]): null;
            @$sql = "UPDATE telefonos " .
            "SET tel_numero = '$telefono', " .
            "tel_tipo = '$tipo', " .
            "tel_operadora = '$operadora', " .
            "tel_fecha_modificacion = '$fecha' " .
            "WHERE tel_id = $codigo";
            if ($conn->query($sql) === TRUE) {
                echo "Se ha actualizado los datos personales correctamemte!!!<br>";
                header("Location: ../../vista/usuario/index.php?id=$id");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
            }
            echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
            $conn->close();
        ?>
    </body>
</html>