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
            <?php  // and tel_numero=$num
                include '../../../config/conexionBD.php'; 
                @$id=$_GET['id'];
                @$num=$_GET['num'];
                
                $sql = "SELECT * FROM telefonos where USUARIOS_usu_id = $id and tel_numero = $num"; 
                $result = $conn->query($sql); 
                if (@$result->num_rows > 0) {
                    while($row = @$result->fetch_assoc()) {
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
               
            }else{
                if (!$result) {
                    trigger_error('Invalid query: ' . @$conn->error);
                }
            }
            $conn->close(); 
            ?> 
            </tbody>
        </table>
