$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#ingreso").click(function () {
        IntoPersonasByID();
    });   
});

function IntoPersonasByID() {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/agenda/controller/personasController.php',
            data: {
                action: $("#typeAction").val(),
                Usuario: $("#txtUsuarioI").val(),
                Contrasena: $("#txtContrasena").val()
            },
            error: function () { //si existe un error en la respuesta del ajax
                swal("Error", "Se presento un error al consultar la informacion", "error");
            },
            success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
                var messageComplete = data.trim();
                var responseText = messageComplete.substring(2);
                var typeOfMessage = messageComplete.substring(0, 2);
                if (typeOfMessage === "E~") { //si todo esta corecto
                    swal("Error", responseText, "error");
                } else {//existe un error
                    location.href="Inicio.php";
                }
            },
            type: 'POST'
        });
    
    }else{
        swal("Error de validación", "Los datos del formulario no fueron digitados, por favor verificar", "error");
    }
}

function validar() {
    var validacion = true;

    
    //valida cada uno de los campos del formulario
    //Nota: Solo si fueron digitados
    if ($("#txtUsuarioI").val() === "") {
        validacion = false;
    }

    if ($("#txtContrasena").val() === "") {
        validacion = false;
    }
    
    return validacion;
}

