//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdateRutas(false);
    });
    
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    
    
    //agrega los eventos las capas necesarias
    $("#buscar").click(function () {
        showRutasByID();
    });
    
    //agrega los eventos las capas necesarias
    $("#borrar").click(function () {
        deleteRutasByID();
    });

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormRutas();
        $("#typeAction").val("add_rutas");
        $("#myModalFormulario").modal();
    });
});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
    showALLRutas(true);  
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdateRutas(ocultarModalBool) {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/agenda/controller/rutasController.php',
            data: {
                action:               $("#typeAction").val(),
                idRuta:               $("#txtRuta").val(),
                Trayecto:             $("#txtTrayecto").val(),
                Duracion:             $("#txtDuracion").val(),
                Precio:               $("#txtPrecio").val()
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
                    clearFormRutas();
                    showALLRutas();
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

    if ($("#txtidRuta").val() === "") {
        validacion = false;
    }

    if ($("#txtTrayecto").val() === "") {
        validacion = false;
    }

    if ($("#txtDuracion").val() === "") {
        validacion = false;
    }

    if ($("#txtPrecio").val() === "") {
        validacion = false;
    }
    
    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormRutas() {
    $('#formRutas').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormRutas();
    $("#typeAction").val("add_rutas");
    $("#myModalFormulario").modal("hide");
}

//*****************************************************************
//*****************************************************************

function showALLRutas(ocultarModalBool) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/rutasController.php',
        data: {
            action: "showAll_rutas"
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las rutas en la base de datos");
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

function showRutasByID() {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/rutasController.php',
        data: {
            action: "show_rutas",
            idRuta: $("#txtRuta").val()
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las rutas en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objRutasJSon = JSON.parse(data);
            $("#txtidRuta").val(objRutasJSon.idRuta);
            $("#txtTrayecto").val(objRutasJSon.Trayecto);
            $("#txtDuracion").val(objRutasJSon.Duracion);
            $("#txtPrecio").val(objRutasJSon.Precio);
            $("#typeAction").val("update_rutas");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deleteRutasByID() {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/rutasController.php',
        data: {
            action: "delete_rutas",
            idRuta: $("#txtRuta").val()
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las rutas en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                mostrarModal("myModal", "Resultado de la acción", responseText);
                showALLRutas(false);
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