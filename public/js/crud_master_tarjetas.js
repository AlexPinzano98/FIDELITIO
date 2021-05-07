window.onload = function() {
    ver_tarjetas();
    start_registro();
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
            //console.log(respuesta)
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
function start_registro(){
    var local = document.getElementById("local");
    //console.log('hola')
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_locales_t', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        var tabla = '<option selected disabled value="">Seleccione el establecimiento</option>';
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            //console.log(respuesta)
            for (let i = 0; i < respuesta.length; i++) {
                //console.log(respuesta[i].name)
                tabla += '<option value="'+ respuesta[i].id_local + '">' + respuesta[i].name + '</option>';
            }
            
        }
        local.innerHTML = tabla;
    }
    ajax.send(datasend);
}
function start_promocion(){
    var id_local = document.getElementById("local").value;
    console.log(id_local)
    //var promo = document.getElementById("promo");
    //console.log('hola')
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_promos_t', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_local', id_local);
    ajax.onreadystatechange = function() {
        var tabla = '';
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta)
            if (respuesta.length == 0) {
                var tabla = '<option selected disabled value="0">No existen promociones</option>';
            } else {
                var tabla = '<option selected disabled value="0">Seleccione la promocion</option>';
                for (let i = 0; i < respuesta.length; i++) {
                    //console.log(respuesta[i].name)
                    tabla += '<option value="'+ respuesta[i].id_promotion + '">' + respuesta[i].name_promo + '</option>';
                }
            }
            
        }
        promo.innerHTML = tabla;
    }
    ajax.send(datasend);
}
function registrar_tarjeta(){
    var token = document.getElementById("token").getAttribute("content");
    var promo = document.getElementById('promo').value;
    var email = document.getElementById('email').value;
    console.log(promo)
    console.log(email)

    var ajax = new objetoAjax();
    ajax.open('POST', 'registrar_tarjeta', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('promo', promo);
    datasend.append('email', email);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            ver_tarjetas();
        }
    }
    ajax.send(datasend);
}