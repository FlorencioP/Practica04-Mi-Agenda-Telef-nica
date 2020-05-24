<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
    .error{
        color: red;
    }
    </style>
</head>
    <body>
    <?php
            include '../../config/conexionBD.php';
            $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
            $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
            $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
            $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
            $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
            $tipo = isset($_POST["tipo"]) ? trim($_POST["tipo"]): null;
            $operadora = isset($_POST["operadora"]) ? trim($_POST["operadora"]): null;
            $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
            $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;
            $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
            $sql = "INSERT INTO USUARIOS VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion',
            '$correo', MD5('$contrasena'), '$fechaNacimiento', 'N', null, null,'U')";
            if ($conn->query($sql) === TRUE) {
                $idTel = "SELECT MAX(usu_id) AS usu_id FROM USUARIOS";
                $result = $conn->query($idTel);
                while($row=$result->fetch_assoc()){
                    $id=$row['usu_id'];
                }
                $sqlTel = "INSERT INTO telefonos VALUES (0, '$telefono', '$tipo', '$operadora', 'N',
                NULL,NULL,$id)";
                if ($conn->query($sqlTel) != TRUE) {
                    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                }
                else{
                    header('Location: ../vista/paginashtml/index.html');
                } 
            } 
            else {
                if($conn->errno == 1062){
                    echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
                }else{
                    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                }
            }
            $conn->close();
            echo "<a href='../vista/crear_usuario.html'>Regresar</a>";
        ?>
    </body>
 </html>