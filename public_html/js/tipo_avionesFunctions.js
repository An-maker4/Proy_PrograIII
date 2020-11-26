//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdateTipo_Aviones();
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

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
    cargarTablas();
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdateTipo_Aviones() {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/controller/t_avionesController.php',
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
                    $("#dt_aviones").DataTable().ajax.reload();
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
    $('#formTipo_Aviones').trigger("reset");
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

function showTipo_AvionesByID() {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/controller/t_avionesController.php',
        data: {
            action: "show_aviones",
            idTipo_Avion:  $("#txtAvion").val()
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
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
            
            swal("Confirmacion", "Los datos de la persona fueron cargados correctamente", "success");
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deleteTipo_AvionesByID() {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/controller/t_avionesController.php',
        data: {
            action: "show_aviones",
            idTipo_Avion:  $("#txtAvion").val()
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormTipo_Aviones();
                $("#dt_aviones").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}




//*******************************************************************************
//Metodo para cargar las tablas
//*******************************************************************************


function cargarTablas() {



    var dataTableTipo_Aviones_const = function () {
        if ($("#dt_aviones").length) {
            $("#dt_aviones").DataTable({
                dom: "Bfrtip",
                bFilter: false,
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
                        targets: 6,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="showTipo_AvionesByID(\''+row[0]+'\');">Cargar</button> ';
                            botones += '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="deleteTipo_AvionesByID(\''+row[0]+'\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                pageLength: 1,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: '../backend/controller/avionesController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_aviones"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_aviones').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTableTipo_Aviones_const();
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
    $('#dt_aviones').DataTable().columns.adjust().responsive.recalc();
};