function verificar(){
    var pass_d = document.getElementById("password").value;
    var c_pass = document.getElementById("conf_password").value;
    //alert(pass_d);
    //alert(c_pass);
    if(pass_d == c_pass){
        $val_edo = document.getElementById("estados").value;
        if($val_edo == 0){
            document.getElementById("alerta").innerHTML = "Debe seleccionar un Estado";
            return false;
        } else{
            $val_mpo = document.getElementById("municipios").value;
            if($val_mpo == 0){
                document.getElementById("alerta").innerHTML = "Debe seleccionar un Municipio";
                return false;
            } else{
                return true;
            }
        }
    } else{
        document.getElementById("alerta").innerHTML = "Las contraseñas no coinciden";
        return false;
    }
}

function obtenerEstado(id){
    //alert(id);
    $.ajax({
        type: "post",
        url: "municipios.php",
        data: "id_estado="+id,
        success: function(data){
            //alert("Vamos bien");
            $('#municipios').html(data);
        }
    })
}