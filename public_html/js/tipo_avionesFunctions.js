//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdateTipo_Aviones(false);
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    
    
    //agrega los eventos las capas necesarias
    //agrega los eventos las capas necesarias
    $("#buscar").click(function () {
        showTipo_AvionesByID();
    });
    
    //agrega los eventos las capas necesarias
    $("#borrar").click(function () {
        deleteTipo_AvionesByID();
    });
    
    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormTipo_Aviones();
        $("#typeAction").val("add_aviones");
        $("#myModalFormulario").modal();
    });
});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
    showALLTipo_Aviones(true);
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdateTipo_Aviones(ocultarModalBool) {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/agenda/controller/t_avionesController.php',
            data: {
                action:                   $("#typeAction").val(),
                idTipo_Avion:             $("#txtAvion").val(),
                Fecha:                    $("#txtFecha").val(),
                Modelo:                   $("#txtModelo").val(),
                Marca:                    $("#txtMarca").val(),
                Fila:                     $("#txtFila").val(),
                Asiento_Fila:             $("#txtAsiento").val() 
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
                    clearFormTipo_Aviones();
                    showALLTipo_Aviones();
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

    if ($("#txtAvion").val() === "") {
        validacion = false;
    }

    if ($("#txtFecha").val() === "") {
        validacion = false;
    }

    if ($("#txtModelo").val() === "") {
        validacion = false;
    }

    if ($("#txtMarca").val() === "") {
        validacion = false;
    }

    if ($("#txtFila").val() === "") {
        validacion = false;
    }

    if ($("#txtAsiento").val() === "") {
        validacion = false;
    }
    
    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormTipo_Aviones() {
    $('#formAvion').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormTipo_Aviones();
    $("#typeAction").val("add_aviones");
    $("#myModalFormulario").modal("hide");
}

//*****************************************************************
//*****************************************************************

function showALLTipo_Aviones(ocultarModalBool) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/t_avionesController.php',
        data: {
            action: "showAll_aviones"
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de los tipo_aviones en la base de datos");
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

function showTipo_AvionesByID() {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/t_avionesController.php',
        data: {
            action: "show_aviones",
            idTipo_Avion:  $("#txtAvion").val()
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de los tipo_aviones en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objTipo_AvionesJSon = JSON.parse(data);
            $("#txtAvion").val(objTipo_AvionesJSon.idTipo_Avion);
            $("#txtFecha").val(objTipo_AvionesJSon.Fecha);
            $("#txtModelo").val(objTipo_AvionesJSon.Modelo);
            $("#txtMarca").val(objTipo_AvionesJSon.Marca);
            $("#txtFila").val(objTipo_AvionesJSon.Fila);
            $("#txtAsiento").val(objTipo_AvionesJSon.Asiento_fila);
            $("#typeAction").val("update_aviones");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deleteTipo_AvionesByID() {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/t_avionesController.php',
        data: {
            action: "delete_aviones",
            idTipo_Avion:  $("#txtAvion").val()
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de los tipo_aviones en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                mostrarModal("myModal", "Resultado de la acción", responseText);
                showALLTipo_Aviones(false);
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