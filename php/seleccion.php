<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccion</title>
</head>
<body>
<?php
    include('conexion.php');
    // Realizando el query
    $sql = "select * from articulos";
    $resultado = $conn->query($sql);
    if($resultado->num_rows > 0){
?>
        <table id="articulo">
            <thead>
                <tr><th>Nombre</th><th>Precio</th><th colspan="2">Acciones</th></tr>
            </thead>
<?php
            while($fila = $resultado->fetch_assoc()){
?>
                <tr><td><?php echo $fila['nombre'] ?></td>
                    <td><?php echo $fila['precio'] ?></td>
                    <td><a href="editar.php">Editar</a></td>
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