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

    echo "Conexion Exitosa";
    $conn->close();
?>