<?php
    include('conexion.php');

    if(isset($_GET["id_borrar"])){
        $id = $_GET["id_borrar"];
        // Query
        $sql = "delete from articulos where id_articulos=$id";
        $conn->query($sql);
    }

    include('cerrar_con.php');
    header("Location: seleccion.php");
?>