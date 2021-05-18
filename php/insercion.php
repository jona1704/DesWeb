<?php
    $servidor = "localhost";
    $bd = "proyecto";
    $usuario = "root";
    $password = "login72";
    // Crear la conexion
    $conn = new mysqli($servidor, $usuario, $password, $bd);
    // Verificar la conexion
    if($conn->connect_error){
        die("Falló la conexion: " . $conn->connect_error);
    }

    /*echo "Conexion Exitosa";*/
    // Recibir parametros
    /*
        Error detectado: En la variable superglobal $_GET[]
        Descripcion: En el if el parametro dentro de $_GET[parametro] va entre comillas '',
        en la cadena $sql el parametro va sin comillas
    */
    if(isset($_GET['nombre']) && isset($_GET['precio'])){
        $sql = "insert into articulos(nombre, precio) values ('$_GET[nombre]', $_GET[precio])";
        // Validar el Query
        if($conn->query($sql) == true){
            echo "Inserción Realizada";
        } else{
            echo "Error en la Insercion";
        }
    }

    $conn->close();
?>