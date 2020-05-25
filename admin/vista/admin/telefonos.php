<head> 
    <meta charset="UTF-8"> 
    <title>Guia Telefonica</title> 
</head> 

<body> 
    
    <?php 
        session_start(); 
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === FALSE){ 
            header("Location: /SistemaDeGestion/public/vista/login.html"); 
        } else {
            $id = $_GET['id'];
        }

        $mtod = null;


    ?>

    <p>Menu de Busqueda</p>
    
    <form id="formularioC" method="POST" action="../../controladores/admin/busquedaC.php">

        <label for="cedula">Cedula de la pesona</label> <br>
        <input type="text" id="cedula" name="cedula" value="" placeholder="Ingrese la cedula de la persona"/> <br>

        <input type="submit" id="celBusc" name="celBusc" value="Buscar por Cedula" /><br>   

    </form>


    
    <br>

    <form id="formularioM" method="POST" action="../../controladores/admin/busquedaM.php">

        <label for="mail">Email de la Persona</label><br>
        <input type="text" id="mail" name="mail" value="" placeholder="Ingrese el mail de la persona"/> <br>

        <input type="submit" id="maiBusc" name="maiBusc" value="Buscar por Mail" /><br>   

    </form>





   <!--- <table > 
        <tr> 
            <th>Numero</th> 
            <th>Tipo</th> 
            <th>Operadora</th> 
        </tr> 
    <?php 
        include '../../../config/conexionBD.php'; 



        $sql = "SELECT * FROM telefonos where USUARIOS_usu_id = '$id' "; 
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) { 
                echo "<tr>"; 
                echo " <td>" . $row["tel_numero"] . "</td>"; 
                echo " <td>" . $row['tel_tipo'] ."</td>"; 
                echo " <td>" . $row['tel_operadora'] . "</td>";  

                echo "</tr>"; 
            }

        } else { 
            echo "<tr>"; 
            echo " <td colspan='7'> No Se pudieron encontrar Telefonos </td>"; 
            echo "</tr>"; 
            
        } 

        $conn->close(); 
    ?> 
    </table> -->





    <script src='../../controladores/admin/busquedaNums.js' ></script>

    <form onsubmit="return buscarPorCedula()"> 
    
        <input type="text" id="cedulatest" name="cedulatest" value=""> 
        <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPorCedula()"> 
    
    </form>


    
    <div id="informacion">


        <b>Datos de la persona</b>
    
    
    
    </div>






</body>


</html>