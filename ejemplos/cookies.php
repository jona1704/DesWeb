<?php

$nombre_cookie = "usuario";
$valor_cookie = "Jonathan Cordoba";

setcookie($nombre_cookie, $valor_cookie, time() - 86400); // 86400 ms = 1 día
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creando Cookie</title>
</head>
<body>
    <?php
        if(isset($_COOKIE[$nombre_cookie])){
            echo "La cookie " . $nombre_cookie . " existe!<br>";
            echo "El valor de la cookie es: " . $_COOKIE[$nombre_cookie];
        } else{
            echo "La cookie " . $nombre_cookie . " NO existe!";
        }
    ?>
</body>
</html>