$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#1-a").click(function () {
        A(0);
    });
    
    //agrega los eventos las capas necesarias
    $("#1-b").click(function () {
        A(1);
    });    
    
    //agrega los eventos las capas necesarias
    $("#1-c").click(function () {
        A(2);
    });
   
});

var array=[false,false,false];

function A(numero){
    if(document.getElementById("txtVuelo").value === "230"){
        if(array[numero]===false){
            document.getElementById("txtFila").value = numero;
            document.getElementById("txtAsiento").value = "a";
            array[numero]=true;
        }else{        
            document.getElementById("txtFila").value = "ocupado";
            document.getElementById("txtAsiento").value = "ocupado";
            
        }
    }else{
        document.getElementById("txtFila").value = "inavilitado";
        document.getElementById("txtAsiento").value = "inavilitado";
    }
}


/*var val =false;
function Ab(numero){
        if(document.getElementById("txtVuelo").value === "230" && val===false){
            document.getElementById("txtFila").value = "1";
            document.getElementById("txtAsiento").value = "a"; 
        }else{
            document.getElementById("txtFila").value = "ocupado";
            document.getElementById("txtAsiento").value = "pcupado";  
        }
    }

function B1(){    
         if(document.getElementById("txtVuelo").value === "230" && val===false){
            document.getElementById("txtFila").value = "1";
            document.getElementById("txtAsiento").value = "a"; 
        }else{
            document.getElementById("txtFila").value = "ocupado";
            document.getElementById("txtAsiento").value = "pcupado";  
        }
    }

function C1(){    
         if(document.getElementById("txtVuelo").value === "230" && val===false){
            document.getElementById("txtFila").value = "1";
            document.getElementById("txtAsiento").value = "a";
        }else{
            document.getElementById("txtFila").value = "ocupado";
            document.getElementById("txtAsiento").value = "pcupado";  
        }
}*/