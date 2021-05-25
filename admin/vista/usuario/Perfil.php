<!DOCTYPE html>
<HTML>

    <HEAD>
        <meta charset="utf-8" language="es"> 
        <TITLE>Perfil</TITLE>
        
        <link href="../../../Css/Perfil.css" rel="stylesheet" type="text/css">
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
        <a id="Inicio" href="../../../public/vista/login.html"> Iniciar Sesion</a>
        <a href="../../../public/vista/crear_usuario.html"> Registrarse</a>
        <a href="./Perfil.php">Mi perfil</a>
        <a href="../../../public/vista/crear_usuario.html">About</a>
        <a href="./PugMobile.html">Cerrar Sesion</a>
        </li>     
    </ul>           
    </nav>

    <Section id="cont">
        <?php 
            
            $cedula=$_GET['cedula'];
            include '../../../config/conexionBD.php';
            $sql = "SELECT * FROM usuario WHERE usu_cedula=$cedula";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        ?>
        
        <article id="Art1">
  
                <Br>
                <label id="label" for="cedula">Cedula :</label>
                <input type="text" style="width: 302px;" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" placeholder="" disabled/>
                <br>
                <span id="mensajeCedula" class="error"></span>
                <br>
                <br>
                <label for="nombres">Nombres :</label>
                <input type="text" style="width: 290px;" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" placeholder=""disabled/>
                <span id="mensajeNombres" class="error"></span>

            
                <label for="apellidos">Apellidos :</label>
                <input type="text" style="width: 290px;" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" placeholder="" disabled/>
                
                <span id="mensajeApellidos" class="error"></span>


                <label for="direccion">Direccion :</label>
                <input type="text"  style="width: 285px;" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" placeholder=""  disabled />
                <br>
                <span id="mensajeApellidos" class="error"></span>

                <br>
                <br>
                <span id="mensajeTelefono" class="error"></span>

                <label for="fecha">Fecha Nacimiento :</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" placeholder="" disabled />
    
                <span id="mensajeFechaNacimiento" class="error"></span>

                <label id="coname"for="correo">E-mail :</label>
                <input type="email" style="width: 305px;" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" placeholder="" disabled/>
                
                

        </article>

        <?php
         $cedula=$_GET["cedula"];
         include '../../../config/conexionBD.php';
         $sql = "SELECT * FROM usuario WHERE usu_cedula=$cedula";
         $result = $conn->query($sql); 
         $row = $result->fetch_assoc();
         $cod =$row["usu_codigo"];

         
         
        

         echo "<a id= 'mod' href='./Mod.php?codigo=$cod'>Modificar</a>";
        ?>
        <h3>TELEFONOS</h3>
        <table id="table" style="width:100%">
            <tr>

                <th>Numero</th>
                <th>Operadora</th>
                <th>Tipo</th>


            </tr>

        
        <?php
            include '../../../config/conexionBD.php';
            $sql2 = "SELECT * FROM telefono WHERE usuario_usu_codigo = $cod";
            $result2 = $conn->query($sql2);
           
            if ($result2->num_rows > 0) {
                while($row = $result2->fetch_assoc()) {
                    echo "<tr>";

                    echo " <td>" . $row['tel_numero'] . "</td>";
                    echo " <td>" . $row['tel_operadora'] . "</td>";
                    echo " <td>" . $row['tel_tipo'] . "</td>";

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