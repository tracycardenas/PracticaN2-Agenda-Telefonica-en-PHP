<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="../../../../public/vista/validacion.js"></script>
    <title>Gestión de usuarios</title>
</head>
<body>
<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 header("Location: /SistemaDeGestion/public/vista/login.html");
 }
?>

    <table style="width:100%">
    <tr>
        <th>Cedula</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Dirección</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Fecha Nacimiento</th>
    </tr>


 <?php
    include '../../../config/conexionBD.php';
    $sql = "SELECT * FROM usuario";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo " <td>" . $row["usu_cedula"] . "</td>";
            echo " <td>" . $row['usu_nombres'] ."</td>";
            echo " <td>" . $row['usu_apellidos'] . "</td>";
            echo " <td>" . $row['usu_direccion'] . "</td>";
            echo " <td>" . $row['usu_telefono'] . "</td>";
            echo " <td>" . $row['usu_correo'] . "</td>";
            echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
            echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
            echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>";
            echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar contraseña</a> </td>";
            echo "</tr>";
        }
    } 
    else {
        echo "<tr>";
        echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
        echo "</tr>";
    }
    echo "<a href='../../../config/cerrar_sesion.php'>Cerrar Sesion</a>";

    $conn->close();

    ?>
</table>
</body>
</html>