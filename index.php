<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Web 2602</title>
    <style>
        body{
            background: linear-gradient(45deg, navy, darkgoldenrod);
        }

        form{
            position: absolute;
            /* Estos valores top, left, bottom, right solo se activan
            con position: relative o absolute. Por defecto todos los
            elementos estan en position: static.  */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /*margin-right: -50%;*/
            width: 350px;
            height: 250px;
            background-color: darkgoldenrod;
            border-radius: 10px;
            box-shadow: 10px 10px navy; /* Creamos un efecto sobre el contenedor del formulario */
        }

        form h2{
           text-align: center;
           margin-top: 10px;
        }

        form .crear_cuenta{
            margin-left: 10px;
        }

        form .crear_cuenta h3 a{
            color: navy;
            text-decoration: none;
        }

        input[type="text"], input[type="password"]{
            display: block;
            margin-top: 10px;
            margin: 10px auto;
            padding-left: 15px;
            width: 90%;
            height: 20px;
        }

        input[type="submit"]{
            display: block;
            width: 92%;
            margin: 10px auto;
            font-size: 20px
        }

        input[type="checkbox"]{
            margin-top: 10px;
            margin-left: 15px;
        }

        form .error{
            color: red;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="logica/login.php" method="post">
        <h2>Iniciar Sesión</h2>
        <?php
            if(isset($_GET["msg"])){
                echo "<p class='error'>Error al ingresar Datos</p>";
            }
        ?>
        <input type="text" name="correo" value="<?php if(isset($_COOKIE["login_correo"])) { echo $_COOKIE["login_correo"]; } ?>" placeholder="Ingrese Correo">
        <input type="password" name="passwd" value="<?php if(isset($_COOKIE["login_passwd"])) { echo $_COOKIE["login_passwd"]; } ?>" placeholder="Ingrese Contraseña">
        <input type="checkbox" name="recordar" <?php if(isset($_COOKIE["login_correo"])) { ?> checked <?php } ?>><span>Recuerdame</span>
        <input type="submit" value="Iniciar Sesión">
        <div class="crear_cuenta">
            <h3>¿No estas registrado? <a href="php/registrar.php">Crea una cuenta</a></h3>
        </div>

    </form>
</body>
</html>