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

        .descripcion{
            margin-top: 20px;
            margin-left: 25px;
        }
    </style>
</head>
<body>
    <?php
        session_start();
    ?>
    <header>
        <?php
            echo "<h1> Bienvenido: " . $_SESSION['nombre_correo'] . "</h1>";
            echo "<a href='../logica/salir.php'>Cerrar Sesion</a>";
        ?>
    </header>
    <?php
        echo "<h1 class='descripcion'>Página del Estudiante</h1>";
    ?>
</body>
</html>
