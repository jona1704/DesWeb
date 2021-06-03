<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // md5(password): Encriptar el password
    // PHP inventado por Rasmus Lerdof
    if($_POST["submit"] == "Registrar"){
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $passwd = $_POST["password"];
        $genero = $_POST["genero"];
        $edo = $_POST["estados"];
        $municipio = $_POST["municipios"];
        // Caso particular de las preferencias
        if(!isset($_POST["preferencias"])){
            echo "No selecciono preferencias";
        } else{
            $preferencias = $_POST["preferencias"];
            $num_preferencias = sizeof($preferencias);
            // Variables para preferencias
            $chk_deportes = 0;
            $chk_lectura = 0;
            $chk_musica = 0;
            $chk_tecnologia = 0;
            if($num_preferencias > 0){
                for($i=0; $i<$num_preferencias; $i++){
                    if($preferencias[$i] == "Deportes") $chk_deportes = 1;
                    if($preferencias[$i] == "Lectura") $chk_lectura = 1;
                    if($preferencias[$i] == "Musica") $chk_musica = 1;
                    if($preferencias[$i] == "Tecnologia") $chk_tecnologia = 1;
                }
            }

            include('conexion.php');

            $mensaje = "";
            // Conectar a la base de datos e ingresar elementos
            $sql = "insert into registrar_usuarios(nombre, apellido, correo, password, ";
            $sql .= "genero, estado, municipio, deportes, lectura, musica, tecnologia) ";
            $sql .= "values ('$nombre' , '$apellido', '$correo', '$passwd', '$genero', $edo, ";
            $sql .= "$municipio, $chk_deportes, $chk_lectura, $chk_musica, $chk_tecnologia)";
            $resultado = $conn->query($sql);
            if($resultado){
                $mensaje = "bien";
            } else{
                $mensaje = "mal";
            }

            include('cerrar_con.php');
            header("Location: registrar.php?mensaje=".$mensaje);
        }
    }
?>