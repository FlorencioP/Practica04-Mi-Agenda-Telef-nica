<?php 
    session_start(); 
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === FALSE){ 
        header("Location: /SistemaDeGestion/public/vista/login.html"); 
    } 
?>

<!DOCTYPE html> 
<html> 

<head> 
    <meta charset="UTF-8"> 
    <title>Gestión de usuarios</title> 
    <link   rel="stylesheet" type="text/css" href="../../../public/vista/css/user.css"/>
    <link   rel="stylesheet" type="text/css" href="../../../public/vista/css/estilosUser.css"/>
    <script type="text/javascript" src="../../../public/controladores/validaciones.js"></script>
    <script type="text/javascript" src="../../controladores/admin/funcionesBtn.js"></script>
</head> 

<body> 
    
<?php 
        session_start(); 
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === FALSE){ 
            header("Location: ../../../public/vista/paginashtml/login.html"); 
        } 
    ?>

    <table style="width:100%"> 
        <tr> 
            <th>Cedula</th> 
            <th>Nombres</th> 
            <th>Apellidos</th> 
            <th>Dirección</th> 
            <!--<th>Telefono</th> -->
            <th>Correo</th> 
            <th>Fecha Nacimiento</th> 
        </tr> 
    <?php 
        include '../../../config/conexionBD.php'; 
        $id=$_GET['id'];
        $sql = "SELECT * FROM usuarios where usu_id=$id"; 
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) {
    ?> 
        <div id="atras">
            <a href="../../../public/vista/paginashtml/index.php?id=<?php echo $id?>"><img src="../../../public/vista/imagenes/kirby_atras.png" id="ima"></a>
        </div>
        <div id="centro"> 
            <form id="formulario01" method="POST" action="../../controladores/admin/modificar.php?id=<?php echo $id ?>" onsubmit="return validarForm2()">
            <div id="texto">
                    <div class="inputP">
                        <label id="text">Cedula:</label>
                        <br>
                        <input type="text" id="Cedula" size="30"  name="cedula" value="<?php echo $row["usu_cedula"]; ?>" onkeyup="validarTamano()" onblur="validarCedula()" disabled>
                        <br>
                        <span id="msjCedula" class="error"></span>
                    </div>
                    
                    <div class="inputP">
                        <label id="text">Nombres:</label>
                        <input type="text" id="Nombre" size="30" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" onblur="validarNombres()" onkeyup="valLeNom()" disabled>
                        <br>
                        <span id="msjNombres" class="error"></span>
                    </div>
                
                    <div class="inputP">
                        <label id="text">Apellido:</label>
                        <input type="text" id="Apellido" size="30" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" onblur="validarApellidos()" onkeyup="valApeLe()" disabled>
                        <br>
                        <span id="msjApellido" class="error"></span>
                    </div>
                    
                    <div class="inputP">
                        <label id="text">Direccion:</label>
                        <input type="text" id="Direccion" name="direccion" size="30" value="<?php echo $row["usu_direccion"]; ?>" onblur="validarDireccion()" disabled>
                        <br>
                        <span id="msjDireccion" class="error"></span>
                    </div> 
                    
                    <div class="inputP">
                        <label id="text">Fecha de nacimiento:</label>
                        <input type="date" id="Fecha" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>"  onkeyup="validarFecha()" placeholder="Ingrese su
                        fecha de nacimiento ..." disabled>
                        <br>
                        <span id="msjFecha" class="error"></span>
                    </div>
                    
                    <div class="inputP">
                        <label id="text">Correo:</label>
                        <input type="text" id="Correo" size="30" name="correo" value="<?php echo $row["usu_correo"]; ?>" onblur="validarCorreo()" disabled>
                        <br>
                        <span id="msjCorreo" class="error"></span>
                    </div>

                    <div id="btnlog">
                        <input style="display: none;" class="btnLog" type="submit" value="Aceptar" name="aceptar" id="aceptar" onclick="validarCorreo();validarFecha();validarDireccion();validarApellidos();
                        validarNombres();validarTamano();">
                        <input style="display: none;" type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick="bloqueo();"/>
                    </div>
                </div>
            </form> 
        </div> 

        <div id="centro2" style="display: none">
            <form id="formulario01" method="POST" action="../../controladores/admin/cambiar_contrasena.php?id=<?php echo $id ?>" onsubmit="return validarForm3()">
            <div id="texto">
                <div class="inputP">
                    <label id="text">Contraseña:</label>
                    <input type="password" id="password" name="contrasena" size="30" onblur="validarPassword()">
                    <br>
                    <span id="msjPassword" class="error"></span>
                </div>
                <div class="inputP">
                    <label id="text">Nueva Contraseña:</label>
                    <input type="password" id="newPassword" name="newContrasena" size="30" onblur="validarPassword2()">
                    <br>
                    <span id="msjPassword2" class="error"></span>
                </div>
                <div id="btnlog">
                    <input class="btnLog" type="submit" value="Aceptar" name="crear" onclick="validarPassword();validarPassword2()">
                    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick="btnCancelar();"/>
                </div>
            </div>
            <br>
            <!--<input type="submit" id="crear" name="crear" value="Aceptar"/>-->
            </form> 
        </div>

        <div id="centro3" style="display: none">
            <form id="formulario01" method="POST" action="../../controladores/admin/addTelefono.php?id=<?php echo $id ?>" onsubmit="return validarForm4()">
            <div id="texto">
                <div class="inputP">
                    <label id="text">Numero:</label>
                    <input type="text" id="Telefono" name="Telefono" size="30" onkeyup="validarTlf()">
                    <br>
                    <span id="msjTelefono" class="error"></span>
                </div> 
                <div class="inputP">
                    <label id="text">Tipo:</label>
                    <input type="text" id="tipo" name="tipo" size="30" onblur="validarTipo()">
                    <br>
                    <span id="msjTipo" class="error"></span>
                </div>
                <div class="inputP">
                    <label id="text">Operadora:</label>
                    <input type="text" id="operadora" name="operadora" size="30" onblur="validarOperadora()">
                    <br>
                    <span id="msjOperadora" class="error"></span>
                </div>
                <div id="btnlog">
                    <input class="btnLog" type="submit" value="Aceptar" name="crear" onclick="validarTlf();validarTipo();validarOperadora()">
                    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick="btnCancelar();"/>
                </div>
            </div>
            <br>
            <!--<input type="submit" id="crear" name="crear" value="Aceptar"/>-->
            </form> 
        </div>

        <div id="botones">
            <button class="boton" id="modificar" onclick="modificar();">Modificar perfil</button>
            <button class="boton" id="cambContra" onclick="cambiarContra();">Cambiar contraseña</button>
            <button class="boton" id="eliminar" onclick="eliminar(<?php echo $id ?>);">Eliminar perfil</button>
            <button class="boton" id="agregarTlf" onclick="agregarTlf()">Agregar Telefono</button>
        </div>
    <?php
        }
        } else { 
            echo "<tr>"; 
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>"; 
            echo "</tr>"; 
        } 
        $conn->close(); 
    ?>
    <div id="tabla" >
        <style type="text/css">
            .tg  {border-collapse:collapse;border-spacing:0;}
            .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
            overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
            font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg .tg-46ru{background-color:#96fffb;border-color:inherit;text-align:left;vertical-align:top}
            .tg .tg-y698{background-color:#efefef;border-color:inherit;text-align:left;vertical-align:top}
            .tg .tg-y6988{background-color:rgb(240, 248, 255,0.6);border-color:inherit;text-align:left;vertical-align:top}
        </style>
        <table class="tg" style="width:100%">
            <thead>
            <tr>
                <th class="tg-46ru">Numero</th>
                <th class="tg-46ru">Tipo</th>
                <th class="tg-46ru">Operadora</th>
                <th class="tg-46ru"></th>
                <th class="tg-46ru"></th>
            </tr>
            </thead>
            <tbody>
            <?php 
                include '../../../config/conexionBD.php'; 
                $id=$_GET['id'];
                $sql = "SELECT * FROM telefonos where USUARIOS_usu_id=$id and 	tel_eliminado='N' "; 
                $result = $conn->query($sql); 
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?> 
                <tr>
                    <td class="tg-y698"><?php echo $row["tel_numero"] ?></td>
                    <td class="tg-y698"><?php echo $row["tel_tipo"] ?></td>
                    <td class="tg-y698"><?php echo $row["tel_operadora"] ?></td>
                    <td class="tg-y698"><span style="cursor: pointer" onclick="cambiarRenglon(this,<?php echo $row['tel_id'] ?>,<?php echo $id ?>)">Modificar</span></td>
                    <td class="tg-y698"><a href='../../controladores/user/elimTelefono.php?idT=<?php echo $row["tel_id"] ?>+&id=<?php echo $id ?>'>Eliminar</a></td>
                </tr> 
            <?php 
               }
            }
            $conn->close(); 
            ?> 
            </tbody>
        </table>
    </div>
</body> 
</html>