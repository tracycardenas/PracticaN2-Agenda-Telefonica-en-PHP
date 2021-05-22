<!DOCTYPE html>
<HTML>

    <HEAD>
        <meta charset="utf-8" language="es"> 
        <TITLE>Agenda </TITLE>
        
        <link href="Css/Home.css" rel="stylesheet" type="text/css">
    </HEAD>
<body>
    
    <header id="header">
        <h1><b>FAST MOBILE</b></h1>

        <H2><b>NO GAME NO LIFE</b></H2>
    </header>
    <nav id="menu1">

        <ul><li type="none">
        <input type="text" style="width: 320px;" id="Buscador" name="Buscador" value="" placeholder="Ingrese el número de Telefono o Correo"/>
        <input type ="submit" id="buscar" name="buscar" value="BUSCAR">
        <a id="Inicio" href="./login.html"> Iniciar Sesion</a>
        <a href="./crear_usuario.html"> Registrarse</a>
        <a href="./Apex_Legends.html">Mi perfil</a>
        <a href="./PugMobile.html">About</a>
        </li>     
    </ul>           
    </nav>

    <Section id="cont">
        
        <table id="table" style="width:100%">
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
            include '../../config/conexionBD.php';
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
                    echo " <td> <a id= 'links' href='../../admin/controladores/usuario/eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
                    echo " <td> <a id= 'links' href='../../admin/controladores/usuario/modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>";
                    echo " <td> <a id= 'links' href='../../admin/controladores/usuario/cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar contraseña</a> </td>";
                    echo "</tr>";
                }
            } 
            else {
                echo "<tr>";
                echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
                echo "</tr>";
            }

            $conn->close();

            ?>
        </table>
    </Section>
    <footer>
        -----------------------------------------------------------------------<br>
        Derechos reservados &copy; 2021 <br>
        Diseñado por: David Paguay <br>
        Email:  <a href="mailto: dapaguay54@outlook.com"> dapaguay54@outlook.com</a> <br>
        Facebook:<a href=" https://www.facebook.com/luisdavid.paguaypalaguachi/">  David Paguay</a><br> <br>
        PRACTICA 1 --PROGRAMACION HIPERMEDIAL--
    
    </footer>
   
</body>

 </HTML>