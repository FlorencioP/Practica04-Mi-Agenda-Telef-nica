
<?php
    session_start(); 

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        
        $id = $_GET['id'];      
        
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link   rel="stylesheet" type="text/css" href="../../../public/vista/css/user.css"/>
    <link   rel="stylesheet" type="text/css" href="../../../public/vista/css/estilosUser.css"/>
    <script type="text/javascript" src="../../../admin/controladores/admin/validaciones_adm.js"></script>
</head>
    <body>
        <div id="atras">
            <a href="telefonos.php?id=<?php echo $id ?>"><img src="../../../public/vista/imagenes/kirby_atras.png" id="ima"></a>
        </div>
        <div id="centro4">
        <form id="formulario01" method="POST" action="../../controladores/admin/crear_usuario.php?id=<?php echo $id ?>" onsubmit="return validarForm()">
        <div id="texto">
                <div class="inputP">
                    <label id="text">Cedula:</label>
                    <br>
                    <input type="text" id="Cedula" size="30" name="cedula" onkeyup="validarTamano()" onblur="validarCedula()">
                    <br>
                    <span id="msjCedula" class="error"></span>
                </div>
                
                <div class="inputP">
                    <label id="text">Nombres:</label>
                    <input type="text" id="Nombre" size="30" name="nombres" onblur="validarNombres()" onkeyup="valLeNom()">
                    <br>
                    <span id="msjNombres" class="error"></span>
                </div>
            
                <div class="inputP">
                    <label id="text">Apellido:</label>
                    <input type="text" id="Apellido" size="30" name="apellidos" onblur="validarApellidos()" onkeyup="valApeLe()">
                    <br>
                    <span id="msjApellido" class="error"></span>
                </div>
                
                <div class="inputP">
                    <label id="text">Direccion:</label>
                    <input type="text" id="Direccion" name="direccion" size="30" onblur="validarDireccion()">
                    <br>
                    <span id="msjDireccion" class="error"></span>
                </div>
                
                <div class="inputP">
                    <label id="text">Telefono:</label>
                    <input type="text" id="Telefono" name="telefono" size="30" onkeyup="validarTlf()" onblur="validarLongTel()">
                    <br>
                    <span id="msjTelefono" class="error"></span>
                </div>

                <div class="inputP">
                    <label id="text">Tipo:</label>
                    <input type="text" id="tipo" name="tipo" size="30" onkeyup="validarTipo()" onblur="validarLongTel()">
                    <br>
                    <span id="msjTipo" class="error"></span>
                </div>

                <div class="inputP">
                    <label id="text">Operadora:</label>
                    <input type="text" id="operadora" name="operadora" size="30" onkeyup="validarOperadora()" onblur="validarLongTel()">
                    <br>
                    <span id="msjOperadora" class="error"></span>
                </div>
                
                <div class="inputP">
                    <label id="text">Fecha de nacimiento:</label>
                    <input type="date" id="Fecha" name="fechaNacimiento" value=""  onkeyup="validarFecha()" placeholder="Ingrese su
                    fecha de nacimiento ..." required/>
                    <br>
                    <span id="msjFecha" class="error"></span>
                </div>
                
                <div class="inputP">
                    <label id="text">Correo:</label>
                    <input type="text" id="Correo" size="30" name="correo" onblur="validarCorreo()">
                    <br>
                    <span id="msjCorreo" class="error"></span>
                </div>
            
                <div class="inputP">
                    <label id="text">Password:</label>
                    <input type="password" id="password" name="contrasena" size="30" onblur="validarPassword()">
                    <br>
                    <span id="msjPassword" class="error"></span>
                </div>
                <div id="btnlog">
                    <input class="btnLog" type="submit" value="Registrarse" name="crear" onclick="validarPassword();
                        validarCorreo();validarFecha();validarTlf();validarDireccion();validarApellidos();
                        validarNombres();validarTamano();validarTipo();validarOperadora()">
                </div>
            </div>
            <br>
            <!--<input type="submit" id="crear" name="crear" value="Aceptar"/>-->
            </form> 
        </div>
    </body>
</html>