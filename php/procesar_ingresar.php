<?php
    include('conexion.php');

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
            $mensaje = "acierto";
            //echo "Inserción Realizada";
        } else{
            $mensaje = "error";
            //echo "Error en la Insercion";
        }
    }

    include('cerrar_con.php');
    header("Location: ingresar.php?mensaje=$mensaje");
?>