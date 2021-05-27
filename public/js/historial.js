window.onload = function() {
    //VER HISTORIAL
    verHistorial();
}

function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != "undefined") {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function verHistorial() {
    var ajax = new objetoAjax();
    //var token = document.getElementById("token").getAttribute("content");
    ajax.open("GET", "verHistorial", true);
    //var datos = new FormData();
    //datos.append("_token", token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var response = JSON.parse(ajax.responseText);

            tabla = "";
            tabla += `<table>
            <caption>Historial tarjetas</caption>
            <thead>
                <tr>
                <th>Estado</th>
                <th>Sellos actuales</th>
                <th>Sellos promoción</th>
                <th>Creación</th>
                <th>Finalizada</th>
                <th>Nombre promoción</th>
                <th>nº</th>
                </tr>
            </thead>
            <tbody>`;
            for (let i = 0; i < response.length; i++) {
                console.log(response[i])
                tabla += `<tr>
                <td>` + response[i].status_card + `</td>
                <td>` + response[i].stamp_now + `</td>
                <td>` + response[i].stamp_max + `</td>
                <td>` + response[i].create_date + `</td>`;
                if (response[i].complete_date_card == null) {
                    tabla += `
                <td>No finalizada</td>`;
                } else {
                    tabla += `
                <td>` + response[i].complete_date_card + `</td>`;
                }
                tabla += `
                <td>` + response[i].name_promo + `</td>
                <td>` + response[i].id_card + `</td>
                </tr>`;
            }
            tabla += `</tbody>
            </table>`;
            historial.innerHTML = tabla;
        }
    }
    ajax.send();
}