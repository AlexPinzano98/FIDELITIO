window.onload = function() {
    ver_tarjetas();
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
function ver_tarjetas(){
    var datos = document.getElementById("datos");
    //console.log('hola')
    var token = document.getElementById("token").getAttribute("content");
    var f_sellos = document.getElementById("f_sellos").value;
    var f_status = document.getElementById("f_status").value;
    var f_promo = document.getElementById("f_promo").value;
    var f_nombre = document.getElementById("f_nombre").value;
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_tarjetas', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('sellos', f_sellos);
    datasend.append('status', f_status);
    datasend.append('promo', f_promo);
    datasend.append('nombre', f_nombre);
    ajax.onreadystatechange = function() {
        var tabla = '';
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta)
            for (let i = 0; i < respuesta.length; i++) {
                tabla += '<tr>'+'<td>'+respuesta[i].id_card+'</td>';
                tabla += '<td>'+respuesta[i].stamp_now+'</td>';
                tabla += '<td>'+respuesta[i].status+'</td>';
                tabla += '<td>'+respuesta[i].name_promo+'</td>';
                tabla += '<td>'+respuesta[i].name + ' ' + respuesta[i].lastname +'</td></tr>';
            }
            
        }
        datos.innerHTML = tabla;
    }
    ajax.send(datasend);
}