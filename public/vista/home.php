<!DOCTYPE html>
<HTML>

    <HEAD>
        <meta charset="utf-8" language="es"> 
        <TITLE>Agenda </TITLE>
        
        <link href="../../Css/Home.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="../../JavaScr/validacion.js"></script>
        <script type="text/javascript" src="../../JavaScr/buscar.js"></script>


    </HEAD>
<body>
    
    <header id="header">
        <h1><b>FAST MOBILE</b></h1>

        <H2><b>NO GAME NO LIFE</b></H2>
    </header>

    <?php 
    
    $cedula=$_GET['cedula'];
    $sql1 = "SELECT * FROM usuario where usu_cedula=$cedula";

    echo $sql1;

    ?>

    

    <nav id="menu1">


        <ul><li type="none">

       

       
        <a id="Inicio" href="./login.html"> Iniciar Sesion</a>
        <a href="./crear_usuario.html"> Registrarse</a>

        <?php 
    
            $cedula=$_GET['cedula'];
            include '../../config/conexionBD.php';
            $sql = "SELECT usu_nombres FROM usuario WHERE usu_cedula=$cedula";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $nombres =$row["usu_nombres"];
            echo "<a href='../../admin/vista/usuario/Perfil.php?cedula=$cedula'> Mi Perfil</a>"
        ?>

        <a href="./PugMobile.html">About</a>
        </li>     
    </ul>           
    </nav>
    


    <Section id="datosbuscar">
    <form onsubmit="return buscarPorCedula()" >
        <input type="text" id="cedula" name="cedula" value="">
        <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPorCedula()">
    </form>

        <br>
            <div id="informacion"><b>Datos de la persona</b></div>
        <br>
        

    </Section>

  
    

    <Section id="cont">
        
        <table id="table" style="width:100%">
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Dirección</th>
                <th>Telefonos</th>
                
                <th>Correo</th>
                <th>Fecha Nacimiento</th>
            </tr>

        


        <?php
            include '../../config/conexionBD.php';
            
        

            $sql = "SELECT u.usu_codigo, u.usu_cedula, u.usu_nombres, u.usu_apellidos, u.usu_direccion, u.usu_correo, u.usu_fecha_nacimiento ,
                    GROUP_CONCAT(DISTINCT t.tel_numero, ' / ',' Operadora: ', T.tel_operadora, ' /  Tipo: ', T.tel_tipo, '<br>', '<br>') as telefonos
                   FROM usuario u , telefono t 
                   WHERE u.usu_codigo = t.usuario_usu_codigo 
                   GROUP by 1";

            
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo " <td>" . $row["usu_cedula"] . "</td>";
                    echo " <td>" . $row['usu_nombres'] ."</td>";
                    echo " <td>" . $row['usu_apellidos'] . "</td>";
                    echo " <td>" . $row['usu_direccion'] . "</td>";

                    echo " <td>" . $row['telefonos'] . "</td>";
                   

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