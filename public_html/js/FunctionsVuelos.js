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


////*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdateVuelos();
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

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
    cargarTablas();
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdateVuelos() {
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
                    $("#typeAction").val("add_vuelos");
                    $("#dt_vuelos").DataTable().ajax.reload();
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
    $('#formVuelo').trigger("reset");
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

function showVuelosByID(PK_vuelo) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/vuelosController.php',
        data: {
            action: "show_vuelos",
            id_Vuelo: PK_vuelo
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objVuelosJSon = JSON.parse(data);
            $("#txtVuelo").val(objVuelosJSon.id_vuelo);
            $("#txtFecha").val(objVuelosJSon.fecha_hora);
            $("#txtRuta").val(objVuelosJSon.ruta);
            $("#txtAvion").val(objVuelosJSon.avion);
            $("#typeAction").val("update_vuelos");
            $("#myModalFormulario").modal();
            
            swal("Confirmacion", "Los datos de la vuelos fueron cargados correctamente", "success");
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deleteVuelosByID(PK_vuelo) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/vuelosController.php',
        data: {
            action: "delete_vuelos",
            id_Vuelo: PK_vuelo
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormVuelos();
                $("#dt_vuelos").DataTable().ajax.reload();
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

    var dataTableVuelos_const = function () {
        if ($("#dt_vuelos").length) {
            $("#dt_vuelos").DataTable({
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
                        targets: 4,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="showVuelosByID(\''+row[0]+'\');">Cargar</button> ';
                            botones += '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="deleteVuelosByID(\''+row[0]+'\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                pageLength: 2,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: '../backend/agenda/controller/vuelosController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_vuelos"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_vuelos').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTableVuelos_const();
                $(".dataTables_filter input").addClass("form-control input-rounded ml-sm");
            }
        };
    }();

    TableManageButtons.init();
}

//*******************************************************************************
//evento que reajusta la tabla en el tamaño de la pantall 
//
//
//*******************************************************************************

window.onresize = function () {
    $('#dt_vuelos').DataTable().columns.adjust().responsive.recalc();
};