<?php
 //incluir conexión a la base de datos
include '../../config/conexionBD.php';


 $cedula = $_GET['buscador'];
 //echo "Hola " . $cedula;

 echo $cedula;

 $sql = "SELECT  u.usu_nombres, u.usu_apellidos, u.usu_direccion, u.usu_correo,
 GROUP_CONCAT(DISTINCT t.tel_numero, ' / ',' Operadora: ', T.tel_operadora, ' /  Tipo: ', T.tel_tipo, '<br>', '<br>') as telefonos
FROM usuario u , telefono t 
WHERE u.usu_codigo = t.usuario_usu_codigo and usu_eliminado = 'N' and (usu_cedula='$cedula' or usu_correo='$cedula')
GROUP by 1;";
echo $sql;
 

//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo "<table style='width:100%'>
 <tr>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Dirección</th>
 <th>Telefonos</th>
 <th>Correo</th>
 <th></th>
 <th></th>
 <th></th>
 </tr>";
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {

 echo "<tr>";
 echo " <td>" . $row['usu_nombres'] ."</td>";
 echo " <td>" . $row['usu_apellidos'] . "</td>";
 echo " <td>" . $row['usu_direccion'] . "</td>";
 echo " <td>" . $row['telefonos'] . "</td>";
 echo " <td>" . $row['usu_correo'] . "</td>";
 echo "</tr>";
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 echo "</table>";
 $conn->close();

?>