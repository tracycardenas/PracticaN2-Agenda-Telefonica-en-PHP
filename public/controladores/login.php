<?php
    session_start();
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : null;
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =MD5('$password')";
    

    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['isLogged'] = TRUE;
        $row = $result->fetch_assoc();
        $cedula =$row["usu_cedula"];
       header("Location: ../vista/home.php?cedula= $cedula");
        

    } else {
        header("Location: ../vista/crear_usuario.html");
        //echo '<input name="txt1" type="text" value="' echo $cedula '" />';

       
    }

    $conn->close();
?>
