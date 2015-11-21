function agregarEquipo() {
    var div = document.getElementById("panelEquipos");
    var html = "<table class='CSS_Table'><th>Tipo de Equipo</th> <tr><td> <input type = 'radio' name = 'equipo' value = 'Computadora'/> Computadora <input type = 'radio' name = 'equipo' value = 'Impresora'> Impresora <input type = 'radio' name = 'equipo' value = 'Celular'> Celular </td></tr></table><table class = 'CSS_Table'><th> Marca </th><th> Modelo </th><th> Serie </th><th> Estado </th><tr><td> <input type = 'text'/> </td><td> <input type = 'text'/> </td><td> <input type = 'text'/> </td><td> <select><option value = 'Nuevo'> Nuevo </option><option value = 'Pendiente'> Pendiente </option><option value = 'Listo'> Listo </option> </select></td> </tr> </table>";
    var  aux = document.createElement("div");
    aux.innerHTML=html;
    div.appendChild(aux);
    /*
     // Crea un elemento <table> y un elemento <tbody>
     var tabla = document.createElement("table");
     
     var tblBody = document.createElement("tbody");
     var hilera = document.createElement("tr");
     var celda = document.createElement("td");
     celda.innerHTML = "<input type='radio' name='equipo' value='Computadora'/>Computadora <input type='radio' name='equipo' value='Impresora'>Impresora <input type='radio' name='equipo' value='Celular'>Celular";
     hilera.appendChild(celda);
     
     // agrega la hilera al final de la tabla (al final del elemento tblbody)
     tblBody.appendChild(hilera);
     
     // posiciona el <tbody> debajo del elemento <table>
     tabla.appendChild(tblBody);
     // appends <table> into <div>
     div.appendChild(tabla);
     // modifica el atributo "border" de la tabla y lo fija a "2";
     tabla.setAttribute("border", "2");
     */
}





