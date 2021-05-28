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

        #articulos{
            margin: 0 auto;
            margin-top: 20px;
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
    <div class="enlaces">
        <a class="ver_registros" href="ingresar.php">Regresar</a>
    </div>
<?php
    include('conexion.php');
    // Realizando el query
    $sql = "select * from articulos";
    $resultado = $conn->query($sql);
    if($resultado->num_rows > 0){
?>
        <table id="articulos">
            <thead>
                <tr><th>Nombre</th><th>Precio</th><th colspan="2">Acciones</th></tr>
            </thead>
<?php
            while($fila = $resultado->fetch_assoc()){
?>
                <tr><td><?php echo $fila['nombre'] ?></td>
                    <td><?php echo $fila['precio'] ?></td>
                    <td><a href="editar.php?id_editar=<?php echo $fila['id_articulos'] ?>">Editar</a></td>
                    <td><a href="#" onclick="confirmar(<?php echo $fila['id_articulos'] ?>)">Borrar</a></td>
                </tr>
<?php
            }
?>
        </table>
        <script type="text/javascript">
            function confirmar(id){
                if(confirm("¿Esta seguro de borrar el registro?")){
                    //alert(id);
                    window.location.href = "borrar.php?id_borrar="+id;
                }
            }
        </script>
<?php
    } else{
        echo "No existen registros";
    }

    include('cerrar_con.php');
?>
</body>
</html>