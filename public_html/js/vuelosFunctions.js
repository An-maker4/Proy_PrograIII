//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdateVuelos(false);
    });
    
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    
    
    //agrega los eventos las capas necesarias
    $("#buscar").click(function () {
        showVuelosByID();
    });
    
    //agrega los eventos las capas necesarias
    $("#borrar").click(function () {
        deleteVuelosByID();
    });

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormVuelos();
        $("#typeAction").val("add_vuelos");
        $("#myModalFormulario").modal();
    });
});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
    showALLvuelos(true);
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdateVuelos(ocultarModalBool) {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/agenda/controller/vuelosController.php',
            data: {
                action:                           $("#typeAction").val(),
                id_Vuelo:                         $("#txtVuelo").val(),
                Fecha_Hora:                       $("#txtFecha").val(),
                Ruta_idRuta:                      $("#txtRuta").val(),
                Tipo_Avion_idTipo_Avion:          $("#txtAvion").val()
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
                    clearFormVuelos();
                    showALLvuelos();
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

    if ($("#txtVuelo").val() === "") {
        validacion = false;
    }

    if ($("#txtFecha").val() === "") {
        validacion = false;
    }
    
    if ($("#txtRuta").val() === "") {
        validacion = false;
    }

    if ($("#txtAvion").val() === "") {
        validacion = false;
    }
    
    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormVuelos() {
    $('#formVuelos').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormVuelos();
    $("#typeAction").val("add_vuelos");
    $("#myModalFormulario").modal("hide");
}

//*****************************************************************
//*****************************************************************

function showALLvuelos(ocultarModalBool) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/vuelosController.php',
        data: {
            action: "showAll_vuelos"
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de los vuelos en la base de datos");
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

function showVuelosByID() {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/vuelosController.php',
        data: {
            action: "show_vuelos",
            id_Vuelo: $("#txtVuelos").val() 
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de los vuelos en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objVuelosJSon = JSON.parse(data);
            $("#txtVuelo").val(objVuelosJSon.id_Vuelo);
            $("#txtFecha").val(objVuelosJSon.Fecha_Hora);
            $("#txtRuta").val(objVuelosJSon.Ruta_idRuta);
            $("#txtTipoAvion").val(objVuelosJSon.Tipo_Avion_idTipo_Avion);
            $("#typeAction").val("update_vuelos");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deleteVuelosByID() {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/vuelosController.php',
        data: {
            action: "delete_vuelos",
            id_Vuelo: $("#txtVuelo").val()
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las personas en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                mostrarModal("myModal", "Resultado de la acción", responseText);
                showALLvuelos(false);
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