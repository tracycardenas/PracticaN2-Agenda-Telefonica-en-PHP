<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar datos de persona </title>
</head>

<body>
    <?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
    ?>

    <?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $codigo=$_GET['codigo'];

    //Si voy a eliminar físicamente el registro de la tabla
    //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = "DELETE FROM telefono WHERE tel_id =  '$codigo'";
    $sql2 = "SELECT u.usu_cedula FROM usuario u, telefono t WHERE u.usu_codigo = t.usuario_usu_codigo and t.tel_id='$codigo' ";
    $result = $conn->query($sql2);
    $row = $result->fetch_assoc();
    $cedula =$row["usu_cedula"];

    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
    } 
    
    else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
 
    echo "<a href='../../vista/usuario/Perfil.php?cedula= $cedula'>Regresar</a>";
    $conn->close();
    ?>
</body>
</html>