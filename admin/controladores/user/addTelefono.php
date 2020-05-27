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
            $telefono = isset($_POST["Telefono"]) ? trim($_POST["Telefono"]) : null;
            $tipo = isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8') : null;
            $operadora = isset($_POST["operadora"]) ? mb_strtoupper(trim($_POST["operadora"]), 'UTF-8') : null; 
            $sql = "INSERT INTO telefonos VALUES (0, '$telefono', '$tipo', '$operadora', 'N', null, null,'$codigo')";
            if ($conn->query($sql) === TRUE) {
                echo "Se ha actualizado los datos personales correctamemte!!!<br>";
//ideota
                header("Location: ../../vista/usuario/index.php?id=$codigo");

            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
            }
            echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
            $conn->close();
        ?>
    </body>
</html>