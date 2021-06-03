<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto_Final</title>
    
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /*body{
            background: linear-gradient(45deg, navy, #B4C0D6,darkgoldenrod);
        }*/


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

        form{
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin-right: -50%;
            width: 350px;
            height: 280px;
            background-color: darkgoldenrod;
            border-radius: 10px;
            box-shadow: 10px 10px navy;
        }

        form h2{
            text-align: center;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        label{
            margin-left: 20px;
        }

        input[type="text"]{
            display: block;
            margin: 10px auto;
            margin-bottom: 10px;
            padding-left: 15px;
            width: 90%;
            height: 30px;
        }

        input[type="submit"]{
            display: block;
            width: 90%;
            margin: 10px auto;
            margin-top: 20px;
            font-size: 20px
        }

        .lema{
            font-size: 20px;
            color: green;
            font-weight: bold;
        }

        .acierto{
            font-size: 20px;
            color: green;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .error{
            font-size: 20px;
            color: red;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
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

        @media screen and (max-width: 400px){
            header h1{
                font-size: 16px;
                margin-left: 5px;
            }

            header a{
                font-size: 16px;
                margin-right: 5px;
            }
        }
    </style>
</head>
<body>
    <?php
        session_start();
        $correo = $_SESSION['nombre_correo'];
        if(!isset($correo)){
            header("Location: ../index.php");
        } else{
    ?>
    <header>
        <?php
            echo "<h1> Bienvenido: " . $_SESSION['nombre_correo'] . "</h1>";
            echo "<a href='../logica/salir.php'>Cerrar Sesion</a>";
        ?>
    </header>
    <div class="enlaces">
        <a class="ver_registros" href="seleccion.php">Ver registros</a>
    </div>

    <form method="get" action="procesar_ingresar.php">
        <h2>Ingrese Artículo</h2>
        <?php
            if(!empty($_GET["mensaje"])){
                if($_GET["mensaje"] == "acierto"){
                    echo "<p class='acierto'>Registro Ingresado Correctamente</p>";
                } else{
                    echo "<p class='error'>Error al Ingresar Datos</p>";
                }
            }
        ?>
        <label for="nombre"><b>Nombre: </b></label>
        <input type="text" name="nombre" id="nombre">
        <label for="precio"><b>Precio:</b></label>
        <input type="text" name="precio" id="precio">
        <input type="submit" value="Enviar">
    </form>
    <?php
    }
        /*$nombre = "Jonathan";
        echo "<p class='lema'>Bienvenidos a Desarrollo Web $nombre</p>";*/
    ?>
</body>
</html>