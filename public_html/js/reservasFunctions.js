//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdateReservas(false);
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormReservas();
        $("#typeAction").val("add_reservas");
        $("#myModalFormulario").modal();
    });
});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
    showALLReservas(true);
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdateReservas(ocultarModalBool) {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/agenda/controller/reservasController.php',
            data: {
                action:             $("#typeAction").val(),
                Numero_Fila:        $("#txtFila").val(),
                Numero_Asiento:     $("#txtAsiento").val(),
                Vuelo_id_Vuelo:     $("#txtVuelo").val(),
                Persona_Usuario1:   $("#txtUsuario").val()
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
                    clearFormReservas();
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
    if ($("#txtFila").val() === "") {
        validacion = false;
    }

    if ($("#txtAsiento").val() === "") {
        validacion = false;
    }

    if ($("#txtVuelo").val() === "") {
        validacion = false;
    }

    if ($("#txtUsuario").val() === "") {
        validacion = false;
    }
    
    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormReservas() {
    $('#formReservas').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormReservas();
    $("#typeAction").val("add_reservas");
    $("#myModalFormulario").modal("hide");
}

//*****************************************************************
//*****************************************************************

function showALLReservas(ocultarModalBool) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/reservasController.php',
        data: {
            action: "showAll_personas"
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las personas en la base de datos");
            if (ocultarModalBool) {
                ocultarModal("myModal");
            }
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            $("#divResult").html(data);
            // se oculta el modal esta funcion se encuentra en el utils.js
            
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function showPersonasByID(PK_cedula) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/reservasController.php',
        data: {
            action: "show_reservas",
            PK_cedula: PK_cedula
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las personas en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objPersonasJSon = JSON.parse(data);
            $("#txtPK_cedula").val(objPersonasJSon.PK_cedula);
            $("#txtnombre").val(objPersonasJSon.nombre);
            $("#txtapellido1").val(objPersonasJSon.apellido1);
            $("#txtapellido2").val(objPersonasJSon.apellido2);
            $("#txtfecNacimiento").val(objPersonasJSon.fecNacimiento);
            $("#txtsexo").val(objPersonasJSon.sexo);
            $("#txtobservaciones").val(objPersonasJSon.observaciones);
            $("#typeAction").val("update_personas");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deletePersonasByID(PK_cedula) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/personasController.php',
        data: {
            action: "delete_personas",
            PK_cedula: PK_cedula
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las personas en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                mostrarModal("myModal", "Resultado de la acción", responseText);
                showALLPersonas(false);
            } else {//existe un error
                mostrarModal("myModal", "Error", responseText);
            }
        },
        type: 'POST'
    });
}

function mostrarModal(idDiv, titulo, mensaje) {
    $("#" + idDiv + "Title").html(titulo);
    $("#" + idDiv + "Message").html(mensaje);
    $("#" + idDiv).modal();
}

function ocultarModal(idDiv) {
    $("#" + idDiv).modal("hide");
}

