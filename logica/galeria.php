<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            margin: 30px;
            text-align: center;
        }

        .galeria{
            display: inline-block;
            position: relative;
            width: 20%;
            height: 400px;
            background-color: cornflowerblue;
            margin: 15px;
            border-radius: 15px;
        }

        .galeria img{
            position: absolute;
            width: 100%;
            height: 60%;
            left: 0;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            border: 2px solid navy;
        }

        .galeria img:hover{
            box-shadow: 1px 1px 5px green;
            background: green;
            opacity: 0.7;
        }

        .galeria .descripcion{
            position: absolute;
            width: 100%;
            height: 40%;
            top: 60%;
            background-color: navy;
            padding: 15px;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .galeria .descripcion .nombre{
            color: goldenrod;
            width: 100%;
            height: 30%;
            font-size: 18px;
            text-align: center;
        }

        .galeria .descripcion .precio{
            color: goldenrod;
            width: 100%;
            height: 25%;
            padding-top: 15px;
            padding-bottom: 20px;
            margin-bottom: 10px;
            font-size: 20px;
        }

        .galeria .descripcion button{
            color: black;
            background-color: goldenrod;
            border: 1px solid goldenrod;
            border-radius: 15px;
            width: 100%;
            height: 30%;
            padding: 10px;
            font-size: 18px;
            font-weight: 900;
        }

        .galeria .descripcion button:hover{
            color: navy;
            background-color: burlywood;
            border: 1px solid;
        }

        @media screen and (max-width: 1200px) {
            .galeria{
                width: 30%;
            }
        }

        @media screen and (min-width: 1050px) and (max-width: 1200px){
            .galeria{
                width: 30%;
            }
        }

        @media screen and (min-width: 700px) and (max-width: 1050px){
            .galeria{
                width: 45%;
            }
        }

        @media screen and and (min-width: 690px) and (max-width: 700px){
            .galeria{
                width: 50%;
            }
        }

        @media screen and (min-width: 200px) and (max-width: 690px){
            .galeria{
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <?php
        // Subiendo a Bases de Datos
        include('../php/conexion.php');
        $sql = "select * from img_articulos order by id_articulo desc";
        $resultado = $conn->query($sql);
        if($resultado->num_rows > 0){
            while($imagenes = $resultado->fetch_assoc()){
                echo "
                    <div class='galeria'>
                        <img src='".$imagenes['ruta_imagen']."' alt='Articulos'>
                        <div class='descripcion'>
                            <p class='nombre'>".$imagenes['nombre']."</p>
                            <p class='precio'>".$imagenes['precio']." MXN</p>
                            <button class='agregar' value='".$imagenes['id_articulo']."'>Agregar al Carrito</button>
                        </div>
                    </div>";
            }
        }
        include('../php/cerrar_con.php'); // Cerrando Conexion
    ?>
    <!--<div class="galeria">
        <img src="piedra_fes.jpeg" alt="piedra_fes">
        <div class="descripcion">
            <p class="nombre">Nombre Articulo</p>
            <p class="precio">Precio</p>
            <button class="agregar">Agregar al Carrito</button>
        </div>
    </div>
    <div class="galeria">
        <img src="piedra_fes.jpeg" alt="piedra_fes">
        <div class="descripcion">
            <p class="nombre">Nombre Articulo asoidioduadoaduousdioaodoisd</p>
            <p class="precio">Precio</p>
            <button>Agregar al Carrito</button>
        </div>
    </div>
    <div class="galeria">
        <img src="piedra_fes.jpeg" alt="piedra_fes">
        <div class="descripcion">
            <p class="nombre">Nombre Articulo asoidioduadoaduousdioaodoisd</p>
            <p class="precio">Precio</p>
            <button>Agregar al Carrito</button>
        </div>
    </div>
    <div class="galeria">
        <img src="piedra_fes.jpeg" alt="piedra_fes">
        <div class="descripcion">
            <p class="nombre">Nombre Articulo asoidioduadoaduousdioaodoisd</p>
            <p class="precio">Precio</p>
            <button>Agregar al Carrito</button>
        </div>
    </div>
    <div class="galeria">
        <img src="piedra_fes.jpeg" alt="piedra_fes">
        <div class="descripcion">
            <p class="nombre">Nombre Articulo asoidioduadoaduousdioaodoisd</p>
            <p class="precio">Precio</p>
            <button>Agregar al Carrito</button>
        </div>
    </div>
    <div class="galeria">
        <img src="piedra_fes.jpeg" alt="piedra_fes">
        <div class="descripcion">
            <p class="nombre">Nombre Articulo asoidioduadoaduousdioaodoisd</p>
            <p class="precio">Precio</p>
            <button>Agregar al Carrito</button>
        </div>
    </div>
    <div class="galeria">
        <img src="piedra_fes.jpeg" alt="piedra_fes">
        <div class="descripcion">
            <p class="nombre">Nombre Articulo asoidioduadoaduousdioaodoisd</p>
            <p class="precio">Precio</p>
            <button>Agregar al Carrito</button>
        </div>
    </div>
    <div class="galeria">
        <img src="piedra_fes.jpeg" alt="piedra_fes">
        <div class="descripcion">
            <p class="nombre">Nombre Articulo asoidioduadoaduousdioaodoisd</p>
            <p class="precio">Precio</p>
            <button>Agregar al Carrito</button>
        </div>
    </div>-->

</body>
</html>