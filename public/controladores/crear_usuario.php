<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
        .error{
        color: red;
        }
    </style>
</head>
    <body>
        <?php
            //incluir conexión a la base de datos
            
            include '../../config/conexionBD.php';
            
            
            //Insertar datos en usuario 
            $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
            $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
            $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
            $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
            $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
            $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;
            $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;

            if ($cedula=="0105891717") {
                $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion',
                '$correo', MD5('$contrasena'), '$fechaNacimiento', 'N', null, null,1)";

                
            } else {
                $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion',
                '$correo', MD5('$contrasena'), '$fechaNacimiento', 'N', null, null,2)";


            }

           

            //Insertar datos en telefono
            $items1 = ($_POST["telefono"]);
            $items2 = ($_POST["operadora"]) ;
            $items3 = ($_POST["tipo"]);
            






            if ($conn->query($sql) === TRUE) {
                $usu_codigo = $conn->insert_id;

				 
				///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
				while(true) {

				    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
				    $item1 = current($items1);
				    $item2 = current($items2);
				    $item3 = current($items3);
				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
				    $numerotelefono=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $operadora=(( $item2 !== false) ? $item2 : ", &nbsp;");
				    $tipo=(( $item3 !== false) ? $item3 : ", &nbsp;");


				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				   // $valores='('.$numerotelefono.',"'.$operadora.'","'.$tipo.'"),';

				    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				   // $valoresQ= substr($valores, 0, -1);
				    
				    ///////// QUERY DE INSERCIÓN ////////////////////////////
                    $sql2 = "INSERT INTO telefono VALUES (0, '$numerotelefono', '$operadora','$tipo', $usu_codigo );";
                    if ($conn->query($sql2) === TRUE) {
                        //echo "<p>Telefono creado!!!</p>";
                    } else{
                            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                        }

				    
				    // Up! Next Value
				    $item1 = next( $items1 );
				    $item2 = next( $items2 );
				    $item3 = next( $items3 );
				    
				    // Check terminator
				    if($item1 === false && $item2 === false && $item3 === false ) break;
                    
    
				}



                echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
               
                
            } 
        
            else {
                if($conn->errno == 1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
                } 
                else {
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                }
            }

            
            

            //cerrar la base de datos
            $conn->close();
            echo "<a href='../vista/crear_usuario.html'>Regresar</a>";

        ?>
    </body>
</html>