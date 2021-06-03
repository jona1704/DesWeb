<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_registrar.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/acciones_registrar.js"></script>
    <title>Registro</title>
</head>
<body>
    <?php
        include('conexion.php');
        $sql = "select * from estados";
        $resultado = $conn->query($sql);
        $estados = $resultado->fetch_all(MYSQLI_ASSOC);
        //$estados = $resultado->fetch_assoc();
        /*
            // Funciona igual que la de arriba
            $estados = $resultado->fetch_all(MYSQLI_ASSOC);
        */
    ?>
    <form onSubmit="return verificar();" action="procesar_registrar.php" method="post">
        <h2>Registro de Usuario</h2>
        <p id="alerta"></p>
        <?php
            if(isset($_GET["mensaje"])){
                if($_GET["mensaje"] == "bien"){
                    echo "<p id='mensaje'>Registro Exitoso</p>";
                } else{
                    echo "<p id='alerta'>No se pudo procesar el registro</p>";
                }
            }
        ?>
        <input type="text" name="nombre" placeholder="Ingrese Nombre" required>
        <input type="text" name="apellido" placeholder="Ingrese Apellido" required>
        <input type="email" name="correo" placeholder="Ingrese Correo" required>
        <input type="password" id="password" name="password" placeholder="Ingrese Contraseña" required>
        <input type="password" id="conf_password" name="conf_password" placeholder="Confirme Contraseña" required>
        <label>Seleccione Género:</label>
        <div class="radios">
            <input type="radio" name="genero" value="masculino" checked><label for="masculino">Masculino</label>
            <input type="radio" name="genero" value="femenino"><label for="femenino">Femenino</label>
            <input type="radio" name="genero" value="otro"><label for="otro">Otro</label>
        </div>
        <label>Seleccione Estado: </label>
        <div class="select_estados">
            <select id="estados" name="estados" onChange="obtenerEstado(this.value);">
                <option value="0">Seleccione Estado</option>
                <?php foreach($estados as $item){
                ?>
                    <option value="<?php echo $item["id"]; ?>"><?php echo $item["estado"]; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <label>Seleccione Municipio: </label>
        <div class="select_municipios">
            <select id="municipios" name="municipios" id="municipios">
                <option value="0">Seleccione Municipio</option>
            </select>
        </div>
        <label>Seleccione Preferencias:</label>
        <div class="preferencias">
            <input type="checkbox" name="preferencias[]" value="Deportes"><label>Deportes</label>
            <input type="checkbox" name="preferencias[]" value="Lectura"><label>Lectura</label>
            <input type="checkbox" name="preferencias[]" value="Musica"><label>Musica</label>
            <input type="checkbox" name="preferencias[]" value="Tecnologia"><label>Tecnologia</label>
        </div>
        <input type="submit" name="submit" value="Registrar">
    </form>
    <h3><a href="../index.php">Regresar</a></h3>
    <?php
        include('cerrar_con.php');
    ?>
</body>
</html>