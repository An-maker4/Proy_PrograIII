$(function () { //para la creación de los controles  
    //vuelos botones1
    $("#precio1").click(function () {
        definirVuelo(110,"vuelo COD.230"); 
        setVuelo("230");
        showVuelosByID("230");
    });
   
    $("#precio2").click(function () {
        definirVuelo(120,"vuelo COD.240"); 
        setVuelo("240");
        showVuelosByID("240");
    });
    
    //vuelos botones2
    $("#precio3").click(function () {
        definirVuelo(220,"vuelo COD.250"); 
        setVuelo("250");
        showVuelosByID("250");
    });
   
    $("#precio4").click(function () {
        definirVuelo(230,"vuelo COD.260"); 
        setVuelo("260");
        showVuelosByID("260");
    });
    
    //vuelos botones3
    $("#precio5").click(function () {
        definirVuelo(330,"vuelo COD.270"); 
        setVuelo("270");
        showVuelosByID("270");
    });
   
    $("#precio6").click(function () {
        definirVuelo(340,"vuelo COD.280"); 
        setVuelo("280");
        showVuelosByID("280");
    });
    
    //vuelos botones4
    $("#precio7").click(function () {
        definirVuelo(440,"vuelo COD.290"); 
        setVuelo("290");
        showVuelosByID("290");
    });
   
    $("#precio8").click(function () {
        definirVuelo(450,"vuelo COD.300"); 
        setVuelo("300");
        showVuelosByID("300");
    });
    
    $("#enviar").click(function () {
        Bool();
    });
});

function Bool(){
    document.getElementById("bool_item").value = "false";
}

function definirVuelo(_valor1,_valor2) {
    document.getElementById("precio_item").value = _valor1;
    document.getElementById("vuelo_item").value = _valor2;
}

function setVuelo(numero) {
    document.getElementById("txtVuelo").value = numero;
}

function setAsientos(fila,asiento){
    document.getElementById("txtFila").value = fila;
    document.getElementById("txtAsiento").value = asiento;
}

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
            document.getElementById("txtFila").value = "";
            document.getElementById("txtAsiento").value = "";
            $("#txtAvion").val(objVuelosJSon.avion);
            $("#parte1").html("");
            showTipo_AvionesByID();
            swal("Confirmacion", "Los datos de la vuelos fueron cargados correctamente", "success");
        },
        type: 'POST'
    });
}

function showTipo_AvionesByID() {    
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/agenda/controller/t_avionesController.php',
        data: {
            action: "show_aviones",
            idTipo_Avion:  $("#txtAvion").val()
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objTipo_AvionesJSon = JSON.parse(data);
            for(var i=1; i<= objTipo_AvionesJSon.fila; i++){
                for(var j=1; j<= objTipo_AvionesJSon.asiento_fila; j++){
                    $("#parte1").append('<td><button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" onclick="setAsientos('+i+','+j+')">F'+i+'A'+j+'</button></td>');
                }
            }
        },
        type: 'POST'
    });
}

//class="btn-gen-asiento btn-asiento'+i+'"


