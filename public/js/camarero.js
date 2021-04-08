window.onload = function() {
    ver_promociones();
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
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
function ver_promociones() {
    var promociones = document.getElementById("promociones");
    var id_local=1;
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_promociones', true);
    var datasend = new FormData();
    datasend.append('id_local', id_local);
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            var tabla = '';
            tabla += '<div">';

            for (let i = 0; i < respuesta.length; i++) {
                tabla += respuesta[i].name;
            }
            tabla += '</div>';  
        }
        promociones.innerHTML = tabla;
    }
    ajax.send(datasend);
}