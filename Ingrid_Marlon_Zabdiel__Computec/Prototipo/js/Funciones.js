
function inicio() {

    //Darle el alto y ancho
    $("#pop").css('width', ' 60%');
    $("#pop").css('height', ' 50%');

    //Esconder el popup
    $("#pop").hide();
    $(".popupGrayBg").hide();

    //Centra el popup   
    $("#pop").css("left", "32%");
    $("#pop").css("top", "25%");

}


function mostrar( ) {

    $(".popupGrayBg").fadeIn('fast');
    $("#pop").fadeIn('fast');
}



function cerrar() {

    $(".popupGrayBg").fadeOut('fast');
    $("#pop").fadeOut('fast');
}
 
 function agregarEquipo(){
     
             var equipo="ninguno";

 

        var equipos=document.getElementsByName("equipo");

        

        for(var i=0;i<equipos.length;i++)

        {

            if(equipos[i].checked)

                equipo=equipos[i].value;

        }
     
     var html="<table class="+"CSS_Table"+"><th>Equipo</th><th>Marca</th><th>Modelo</th><th>Serie</th><tr><td>"+equipo+"</td><td>"+document.getElementById("Marca").value+"</td><td>"+document.getElementById("Modelo").value+"</td><td>"+document.getElementById("Serie").value+"</td></tr></table>";
     var aux = document.createElement("div");
     aux.innerHTML+=html;
     document.getElementById("panelEquipos").appendChild(aux);
     cerrar();
 }
 
 function guardarBoleta(){
     alert("Lo sentimos esta opcion no está disponible en el prototipo");
 }