$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#ingreso").click(function () {
        IntoPersonasByID();
    });   
});

function IntoPersonasByID() {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/personasController.php',
        data: {
            action: $("#typeAction").val(),
            Usuario: $("#txtUsuarioI").val()
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objPersonasJSon = JSON.parse(data);
            if($("#txtUsuarioI").val() === objPersonasJSon.usuario && $("#txtContrasena").val() === objPersonasJSon.contrasena && "1" === objPersonasJSon.tipo_usuario){ 
                swal("Confirmacion", "Acceso confirmado Cliente", "success");                
                location.href="Admin_Reserva.php";
            }else if($("#txtUsuarioI").val() === objPersonasJSon.usuario && $("#txtContrasena").val() === objPersonasJSon.contrasena && "2" === objPersonasJSon.tipo_usuario){           
                swal("Confirmacion", "Acceso confirmado Admin", "success"); 
                location.href="Admin_Registro.php";
            }else {//existe un error
                swal("Error", "Acceso denegado", "error");
            }
        },
        type: 'POST'
    });
}
