<?php
    session_start();
    include '../../config/ConexionBD.php';
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =MD5('$contrasena')";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['isLogged'] = TRUE;
        header("Location: ../../admin/vista/usuario/index.php");
    } else {
        header("Location: ../vista/crear_usuario.html");
    }

    $conn->close();
?>