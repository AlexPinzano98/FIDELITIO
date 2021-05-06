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
function ver_promociones(){
    var datos = document.getElementById("datos");
    //console.log('hola')
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_promociones', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        var tabla = '';
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta)
            for (let i = 0; i < respuesta.length; i++) {
                tabla += '<tr>'+'<td>'+respuesta[i].id_promotion+'</td>';
                tabla += '<td>'+respuesta[i].image+'</td>';
                tabla += '<td>'+respuesta[i].stamp_max+'</td>';
                tabla += '<td>'+respuesta[i].reward+'</td>';
                tabla += '<td>'+respuesta[i].name_promo+'</td>';
                tabla += '<td>'+respuesta[i].status_promo+'</td>';
                tabla += '<td>'+respuesta[i].expiration+'</td>';
                tabla += '<td>'+respuesta[i].id_local_fk+'</td>';
                tabla += '<td>'+respuesta[i].id_user_fk_promo +'</td></tr>';
            }
        }
        datos.innerHTML = tabla;
    }
    ajax.send(datasend);
}  