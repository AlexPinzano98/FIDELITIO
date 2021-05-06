window.onload = function() {
    ver_companyias();
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
function ver_companyias(){
    var datos = document.getElementById("datos");
    //console.log('hola')
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_companyias', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        var tabla = '';
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta)
            for (let i = 0; i < respuesta.length; i++) {
                tabla += '<tr>'+'<td>'+respuesta[i].id_company+'</td>';
                tabla += '<td>'+respuesta[i].name+'</td>';
                tabla += '<td>'+respuesta[i].id_user_fk +'</td></tr>';
            }
        }
        datos.innerHTML = tabla;
    }
    ajax.send(datasend);
}