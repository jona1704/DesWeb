<?php
    include('conexion.php');

    if(isset($_GET['ed_id']) && isset($_GET['ed_nombre']) && isset($_GET['ed_precio'])){
        $id = $_GET['ed_id'];
        $nombre = $_GET['ed_nombre'];
        $precio = $_GET['ed_precio'];
        // Query para editar
        $sql = "update articulos set nombre='$nombre', precio=$precio where id_articulos=$id";
        $resultado = $conn->query($sql);
        if($resultado){
?>
            <script>
                alert("Se han guardado los cambios correctamente, se actualizará la página para ver los cambios");
                window.location.href = "../php/seleccion.php";
            </script>
<?php
        } else{
?>
            <script>
                alert("No se pudieron guardar los cambios");
                window.history.go(-1);
            </script>
<?php
        }
    }

    include('cerrar_con.php');
?>