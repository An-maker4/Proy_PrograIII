$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#1-a").click(function () {
        setAsientos("7","A");
    });
    
    //agrega los eventos las capas necesarias
    $("#1-b").click(function () {
        setAsientos("7","B")
    });    
    
    //agrega los eventos las capas necesarias
    $("#1-c").click(function () {
        setAsientos("7","C")
    });
    
    //vuelos botones1
    $("#precio1").click(function () {
        definirVuelo(110,"vuelo COD.230"); 
        setVuelo("230");
    });
   
    $("#precio2").click(function () {
        definirVuelo(120,"vuelo COD.240"); 
        setVuelo("240");
    });
    
    //vuelos botones2
    $("#precio3").click(function () {
        definirVuelo(220,"vuelo COD.250"); 
        setVuelo("250");
    });
   
    $("#precio4").click(function () {
        definirVuelo(230,"vuelo COD.260"); 
        setVuelo("260");
    });
    
    //vuelos botones3
    $("#precio5").click(function () {
        definirVuelo(330,"vuelo COD.270"); 
        setVuelo("270");
    });
   
    $("#precio6").click(function () {
        definirVuelo(340,"vuelo COD.280"); 
        setVuelo("280");
    });
    
    //vuelos botones4
    $("#precio7").click(function () {
        definirVuelo(440,"vuelo COD.290"); 
        setVuelo("290");
    });
   
    $("#precio8").click(function () {
        definirVuelo(450,"vuelo COD.300"); 
        setVuelo("300");
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
