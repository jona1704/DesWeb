<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto_Final</title>
    <style>
        .lema{
            font-size: 20px;
            color: green;
            font-weight: bold;
        }

        .acierto{
            font-size: 20px;
            color: green;
            font-weight: bold;
        }

        .error{
            font-size: 20px;
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
        if(!empty($_GET["mensaje"])){
            if($_GET["mensaje"] == "acierto"){
                echo "<p class='acierto'>Registro Ingresado Correctamente</p>";
            } else{
                echo "<p class='error'>Error al Ingresar Datos</p>";
            }
        }
    ?>
    <form method="get" action="../DesWeb/php/insercion.php">
        <label for="nombre">Nombre: </label><br>
        <input type="text" name="nombre" id="nombre"><br>
        <label for="precio">Precio:</label><br>
        <input type="text" name="precio" id="precio"><br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        /* $nombre = "Jonathan";
        echo "<p class='lema'>Bienvenidos a Desarrollo Web $nombre</p>";*/
    ?>
</body>
</html>