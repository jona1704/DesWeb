<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include('../php/conexion.php');

    session_start();

    if(isset($_POST['correo']) && isset($_POST['passwd'])){
        $correo = $_POST['correo'];
        $passwd = $_POST['passwd'];
        // Realizando Query
        $sql = "select * from prueba_usuarios where correo='$correo' and password='$passwd'";
        $consulta = $conn->query($sql);
        if($consulta->num_rows > 0){
            //echo "consulta correcta";
            $_SESSION['nombre_correo'] = $correo;

            //echo "<p>Hola mundo</p>";

            if(isset($_POST['recordar'])){
                setcookie("login_correo", $correo, time() + 86400, "/"); // 86400 ms = 1 día
                setcookie("login_passwd", $passwd, time() + 86400, "/"); // 86400 ms = 1 día*
                //echo "Checkbox Activado";
            } else{
                if(isset($_COOKIE["login_correo"])){
                    setcookie("login_correo", $correo, time() - 86400, "/"); // 86400 ms = 1 día
                }

                if(isset($_COOKIE["login_passwd"])){
                    setcookie("login_passwd", $passwd, time() - 86400, "/"); // 86400 ms = 1 día
                }
                //echo "Checkbox Desactivado";
            }

            $fila = $consulta->fetch_assoc();
            if($fila['id_rol'] == 1){
                //echo "Administrativo";
                header("Location: ../php/ingresar.php");
            } else{
                //echo "Estudiante";
                header("Location: estudiante.php");
            }
            //header("Location: ../index.php");*/
        } else{
            //echo "consulta erronea";
            $mensaje = "error";
            header("location: ../index.php?msg=$mensaje");
        }
    }

    include('../php/cerrar_con.php');
?>