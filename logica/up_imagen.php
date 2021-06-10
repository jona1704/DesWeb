<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d705254159.js" crossorigin="anonymous"></script>
    <title>Subir Imagen</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        form{
            width: 450px;
            height: 300px;
            margin: 50px auto;
            background-color: beige;
            padding: 20px;
        }

        .alerta{
            color: red;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="number"], input[type="submit"]{
            display: block;
            margin: 0 auto;
            margin-bottom: 10px;
            width: 100%;
            height: 30px;
        }

        input[type="text"], input[type="number"]{
            padding-left: 15px;
        }

        input[type="submit"]{
            margin-top: 10px;
        }

        input[type="file"] {
            display: none;
        }

        i{
            margin-right: 10px;
        }

        #file-name{
            margin-left: 10px;
        }

        .custom-file-upload {
            border: 2px solid black;
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 10px;
            cursor: pointer;
            background: navy;
            color: white;
        }
    </style>
</head>
<body>
    <form method="post" action="upload.php" enctype="multipart/form-data">
        <?php
        if(isset($_GET["mensaje"])){
            echo "<p class='alerta'>".$_GET["mensaje"]."</p>";
        }
        ?>
        <input type="text" name="nombre_articulo" placeholder="Ingrese Nombre de Articulo" required>
        <input type="number" step="0.0001" name="precio" placeholder="Ingrese Precio de Articulo" required>
        <label for="file-upload" class="custom-file-upload">
            <i class="fas fa-images"></i>Subir Imagen
        </label>
        <input id="file-upload" type="file" name="imagen"><label id="file-name"></label>
        <input type="submit" name="submit" value="Enviar">
    </form>
    <script>
        document.querySelector("#file-upload").onchange = function(){
            document.querySelector("#file-name").textContent = this.files[0].name;
        }
    </script>
</body>
</html>