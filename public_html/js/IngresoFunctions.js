//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdatePersonas();
    });
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdatePersonas() {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/agenda/controller/personasController.php',
            data: {
                action: "show_personas",
                Usuario: $("txtUsuario").val()
            },
            error: function () { //si existe un error en la respuesta del ajax
                alert("Se presento un error a la hora de cargar la información de las personas en la base de datos");
            },
            success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
                var objPersonasJSon = JSON.parse(data);
                $("txtUsuario").val(objPersonasJSon.Usuario);
            },
            type: 'POST'
        });
    }else{
        swal("Error de validación", "Los datos del formulario no fueron digitados, por favor verificar", "error");
    }
}

//*****************************************************************
//*****************************************************************
function validar() {
    var validacion = true;

    
    //valida cada uno de los campos del formulario
    //Nota: Solo si fueron digitados
    if ($("#txtUsuario").val() === "") {
        validacion = false;
    }

    if ($("#txtContrasena").val() === "") {
        validacion = false;
    }
    
    return validacion;
}