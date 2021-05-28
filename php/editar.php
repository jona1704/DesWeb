<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Web 2602</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header{
            width: 100%;
            height: 50px;
            background-color: black;
            padding: 10px;
        }

        header h1{
            margin-left: 20px;
            color: white;
            float: left;
            font-size: 20px;
        }

        header a{
            color: white;
            float: right;
            text-decoration: none;
            font-size: 20px;
            margin-right: 20px;
        }

        .enlaces{
            background: #F2F4F4;
            height: 50px;
            text-align: center;
            padding: 15px;
            color: navy;
            font-size: 20px;
            font-weight: bold;
        }

        .enlaces a{
            text-decoration: none;
        }

        form h2{
           text-align: center;
           margin-top: 10px;
        }

        form{
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            /*margin-right: -50%;*/
            width: 350px;
            height: 250px;
            background-color: darkgoldenrod;
            border-radius: 10px;
            box-shadow: 10px 10px navy; /* Creamos un efecto sobre el contenedor del formulario */
        }

        input[type="text"]{
            display: block;
            margin-top: 10px;
            margin: 10px auto;
            padding-left: 15px;
            width: 90%;
            height: 30px;
        }

        input[type="submit"]{
            display: block;
            width: 90%;
            margin: 10px auto;
            font-size: 20px
        }
    </style>
</head>
    <?php
        session_start();
    ?>
<body>
    <header>
        <?php
            echo "<h1> Bienvenido: " . $_SESSION['nombre_correo'] . "</h1>";
            echo "<a href='../logica/salir.php'>Cerrar Sesion</a>";
        ?>
    </header>
    <div class="enlaces">
        <a class="ver_registros" href="../index.php">Regresar</a>
    </div>
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include('conexion.php');

    if(isset($_GET['id_editar'])){
        $id = $_GET['id_editar'];
        // Query para editar
        $sql = "select * from articulos where id_articulos=$id";
        $resultado = $conn->query($sql);
        if($resultado->num_rows > 0){
            while($fila = $resultado->fetch_assoc()){
?>
            <form method="get" action="../php/procesar_edicion.php">
                <h2>Actualización</h2>
                <input type="hidden" name="ed_id" value="<?php echo $fila['id_articulos']?>">
                <input type="text" name="ed_nombre" value="<?php echo $fila['nombre']?>">
                <input type="text" name="ed_precio" value="<?php echo $fila['precio']?>">
                <input type="submit" value="Actualizar">
            </form>
<?php
          }
        } else{
            echo "<p>No hay registros con ese identificador</p>";
        }
    }

    include('cerrar_con.php');
?>
</body>
</html>