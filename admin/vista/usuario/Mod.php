<!DOCTYPE html>
<HTML>

    <HEAD>
        <meta charset="utf-8" language="es"> 
        <TITLE>Agenda </TITLE>
        
        <link href="../../../Css/Modificar.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
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
        <a href="../../../public/vista/home.php"> Home</a>
        <?php 
    
            $codigo = $_GET["codigo"];
            $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
            include '../../../config/conexionBD.php';
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $cedula =$row["usu_cedula"];
            echo "<a href='./Perfil.php?cedula=$cedula'> Mi Perfil</a>"

        ?>
        
        </li>     
    </ul>           
    </nav>

    <Section id="cont">
    <?php
        session_start();
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../public/vista/login.html");
        }
    ?>

    <?php
        $codigo = $_GET["codigo"];
        $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
        include '../../../config/conexionBD.php';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
    ?>

                <form id="formulario01" method="POST" action="../../controladores/usuario/modificar.php">
                    
                    <br>
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                    <label for="cedula">Cedula :</label>
                    <input type="text" style="width: 302px;" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" required placeholder="Ingrese la cedula ..."/>
                    <br> <br>
                    <label for="nombres">Nombres : </label>
                    <input type="text" style="width: 290px;" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" required placeholder="Ingrese los dos nombres ..."/>
                    <label for="apellidos">Apelidos :</label>
                    <input type="text" style="width: 290px;"  id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" required placeholder="Ingrese los dos apellidos ..."/>
                    
                    <label for="direccion">Dirección :</label>
                    <input type="text" style="width: 285px;" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" required placeholder="Ingrese la dirección ..."/>
                    <br><br>

                    <label for="fecha">Fecha Nacimiento :</label>
                    <input type="date"  style="width: 205px;" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" required placeholder="Ingrese la fecha de nacimiento ..."/>
                
                    <label for="correo">E-mail:</label>
                    <input type="email"  style="width: 305px;" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" required placeholder="Ingrese el correo electrónico ..."/>
                    <br><br><br>

                    <script>
			
                    $(function(){
                            // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                            $("#adicional").on('click', function(){
                                $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
                                
                            });
                        
                            // Evento que selecciona la fila y la elimina 
                            $(document).on("click",".eliminar",function(){
                                var parent = $(this).parents().get(0);
                                $(parent).remove();
                            });
                        });
                    </script>

                    <h3>TELEFONOS</h3>
        <table id="table" style="width:100%">
            <tr>

                <th>Numero</th>
                <th>Tipo</th>
                <th>Operadora</th>
                <th colspan="7" >Administrar</th>


            </tr>
        <?php
            include '../../../config/conexionBD.php';
            $sql = "SELECT * FROM telefono WHERE usuario_usu_codigo =$codigo";
            $result = $conn->query($sql);
           
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
            
                    <td>  <input type="text" style="width: 285px;" id="direccion" name="direccion" value="<?php echo $row['tel_numero'] ; ?>" required placeholder="Ingrese la dirección ..."/> </td>
                    <td>  <input type="text" style="width: 285px;" id="direccion" name="direccion" value="<?php echo $row['tel_operadora'] ; ?>" required placeholder="Ingrese la dirección ..."/> </td>
                    <td>  <input type="text" style="width: 285px;" id="direccion" name="direccion" value="<?php echo $row['tel_tipo'] ; ?>" required placeholder="Ingrese la dirección ..."/> </td>

                <?php

                    echo " <td ><button id='adicional' style='margin-top: 15px;' name='adicional' type='button' class='btn btn-warning'>Agregar</button></td>";
                    echo " <td> <a id= 'links' href='../../controladores/usuario/eliminar_telefono.php?codigo=" . $row['tel_id'] . "'>Eliminar</a> </td>";
                    echo "</tr>";
                }
            } 
            else {
                echo "<tr>";
                echo " <td colspan='7'>El usuario no tiene telefonos registrados </td>";
                echo "</tr>";
            }
            

           

            ?>
        </table>
                <input type="submit" id="modificar" name="modificar" value="Guardar" />
                    <?php
                   $codigo = $_GET["codigo"];
                   $sql = "SELECT * FROM usuario where usu_codigo=$codigo";
                    include '../../../config/conexionBD.php';
                    $result = $conn->query($sql); 
                    $row = $result->fetch_assoc();
                    $cedula =$row["usu_cedula"];
                    echo "<a id= 'mod' href='./Perfil.php?cedula=$cedula'>Cancelar</a>";
                    $conn->close();
                    ?>
                </form>
                <?php
            }
        } 
        else {
            echo "<p>Ha ocurrido un error inesperado !</p>";
            echo "<p>" . mysqli_error($conn) . "</p>";
        }
    ?>

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