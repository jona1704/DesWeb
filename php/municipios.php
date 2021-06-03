<?php
    $municipio = $_POST['id_estado'];
    include('conexion.php');

    $sql = "select municipios.id, municipios.municipio from estados join estados_municipios ";
    $sql .= "on estados.id = estados_municipios.estados_id ";
    $sql .= "join municipios on municipios.id = estados_municipios.municipios_id ";
    $sql .= "where estados.id = $municipio";
    $resultado = $conn->query($sql);
?>
    <option value="0">Selecciona Municipio</option>
    <?php
        // Error: $mun = $$resultado->fetch_assoc()
        while($mun = $resultado->fetch_assoc()){
    ?>
            <option value="<?php echo $mun["id"]; ?>"><?php echo $mun["municipio"]; ?></option>
    <?php
        }
    ?>
<?

    include('cerrar_con.php');
?>