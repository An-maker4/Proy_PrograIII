//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************
var dt_lenguaje_espanol = {
    decimal:        "",
    emptyTable:     "No existe información",
    info:           "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
    infoEmpty:      "Mostrando 0 a 0 de 0 registros",
    infoFiltered:   "(filtered from _MAX_ total entries)",
    infoPostFix:    "",
    thousands:      ",",
    lengthMenu:     "Mostrar _MENU_ registros por página",
    loadingRecords: "Cargando, por favor espere...",
    processing:     "Procesando...",
    search:         "Buscar ",
    zeroRecords:    "No se encontraron registros que cumplan con el criterio",
    paginate: {
        first:      "Primero",
        last:       "Último",
        next:       "Siguiente",
        previous:   "Anterior"
    }
};

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdatePersonas();
    });
    
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    
    
    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormPersonas();
        $("#typeAction").val("add_personas");
        $("#myModalFormulario").modal();
    });
});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
    cargarTablas();   
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
                    $("#typeAction").val("add_personas");
                    $("#dt_personas").DataTable().ajax.reload();
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

//*****************************************************************
//*****************************************************************

function showPersonasByID(PK_cedula) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/personasController.php',
        data: {
            action: "show_personas",
            Usuario: PK_cedula
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objPersonasJSon = JSON.parse(data);
            $("#txtUsuario").val(objPersonasJSon.usuario);
            $("#txtNombre").val(objPersonasJSon.nombre);
            $("#txtApellido1").val(objPersonasJSon.apellido1);
            $("#txtApellido2").val(objPersonasJSon.apellido2);
            $("#txtCorreo").val(objPersonasJSon.correo);
            $("#txtFecha").val(objPersonasJSon.fecha_nacimiento);
            $("#txtDireccion").val(objPersonasJSon.direccion);
            $("#txtTel1").val(objPersonasJSon.telefono1);
            $("#txtTel2").val(objPersonasJSon.telefono2);
            $("#txtTip").val(objPersonasJSon.tipo_usuario);
            $("#txtSexo").val(objPersonasJSon.sexo);
            $("#typeAction").val("update_personas");
            swal("Confirmacion", "Los datos de la persona fueron cargados correctamente", "success");
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deletePersonasByID(PK_cedula) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/personasController.php',
        data: {
            action: "delete_personas",
            Usuario: PK_cedula
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormPersonas();
                $("#dt_personas").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}

function cargarTablas() {

    var dataTablePersonas_const = function () {
        if ($("#dt_personas").length) {
            $("#dt_personas").DataTable({
                dom: "Bfrtip",
                bFilter: true,
                ordering: false,
                buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm",
                        text: "Copiar"
                    },
                    {
                        extend: "csv",
                        className: "btn-sm",
                        text: "Exportar a CSV"
                    },
                    {
                        extend: "print",
                        className: "btn-sm",
                        text: "Imprimir"
                    }

                ],
                "columnDefs": [
                    {
                        targets: 11,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="showPersonasByID(\''+row[0]+'\');">Cargar</button> ';
                            botones += '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="deletePersonasByID(\''+row[0]+'\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                pageLength: 2,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: '../backend/agenda/controller/personasController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_personas"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_personas').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTablePersonas_const();
                $(".dataTables_filter input").addClass("form-control input-rounded ml-sm");
            }
        };
    }();

    TableManageButtons.init();
}

//*******************************************************************************
//evento que reajusta la tabla en el tamaño de la pantall
//*******************************************************************************

window.onresize = function () {
    $('#dt_personas').DataTable().columns.adjust().responsive.recalc();
};
