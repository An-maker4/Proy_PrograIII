//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdatePersonas(false);
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias
    
    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormPersonas();
        $("#typeAction").val("add_personas");
        $("#myModalFormulario").modal();
    });
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdatePersonas(ocultarModalBool) {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/agenda/controller/personasController.php',
            data: {
                action:             $("#typeAction").val(),
                Usuario:            $("#txtUsuario").val(),
                Contrasena:         $("#txtContrasena").val(),
                Nombre:             $("#txtNombre").val(),
                Apellido1:          $("#txtApellido1").val(),
                Apellido2:          $("#txtApellido2").val(),
                Correo:             $("#txtCorreo").val(),
                Fecha_Nacimiento:   $("#txtFecha").val(),
                Direccion:          $("#txtDireccion").val(),
                Telefono1:          $("#txtTel1").val(),
                Telefono2:          $("#txtTel2").val(),
                Tipo_Usuario:       $("#txtTip").val(),
                sexo:               $("#txtSexo").val()
            },
            error: function () { //si existe un error en la respuesta del ajax
                swal("Error", "Se presento un error al enviar la informacion", "error");
            },
            success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
                var messageComplete = data.trim();
                var responseText = messageComplete.substring(2);
                var typeOfMessage = messageComplete.substring(0, 2);
                if (typeOfMessage === "M~") { //si todo esta corecto
                    swal("Confirmacion", responseText, "success");
                    clearFormPersonas();
                } else {//existe un error
                    swal("Error", responseText, "error");
                }
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

    if ($("#txtNombre").val() === "") {
        validacion = false;
    }

    if ($("#txtApellido1").val() === "") {
        validacion = false;
    }

    if ($("#txtApellido2").val() === "") {
        validacion = false;
    }

    if ($("#txtCorreo").val() === "") {
        validacion = false;
    }

    if ($("#txtFecha").val() === "") {
        validacion = false;
    }
    
    if ($("#txtDireccion").val() === "") {
        validacion = false;
    }
    
    if ($("#txtTel1").val() === "") {
        validacion = false;
    }
    
    if ($("#txtTel2").val() === "") {
        validacion = false;
    }
    
    if ($("#txtTip").val() === "") {
        validacion = false;
    }

    if ($("#txtSexo").val() === "") {
        validacion = false;
    }
    
    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormPersonas() {
    $('#formPersonas').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormPersonas();
    $("#typeAction").val("add_personas");
    $("#myModalFormulario").modal("hide");
}

function mostrarModal(idDiv, titulo, mensaje) {
    $("#" + idDiv + "Title").html(titulo);
    $("#" + idDiv + "Message").html(mensaje);
    $("#" + idDiv).modal();
}

function ocultarModal(idDiv) {
    $("#" + idDiv).modal("hide");
}