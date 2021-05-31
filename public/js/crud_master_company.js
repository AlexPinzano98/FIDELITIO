var respuesta;
var pag_actual = 1;
window.onload = function() {
    ver_companys();
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
function ver_companys(){
    var datos = document.getElementById("datos");
    // console.log('hola')
    var token = document.getElementById("token").getAttribute("content");
    var f_nombre = document.getElementById("f_nombre").value;
    var f_email = document.getElementById("f_email").value;
    var ajax = new objetoAjax(); 
    ajax.open('POST', 'ver_companys', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('nombre', f_nombre);
    datasend.append('email', f_email);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta)
            pag_actual = 1;
            mostrar_datos();
        }
    }
    ajax.send(datasend);
}
function mostrar_datos(){
    var datos = document.getElementById("datos");
    var num_results = document.getElementById('results').value;
    var pag_totales = Math.ceil(respuesta.length / num_results)
    document.getElementById('total_datos').innerHTML = 'Compañias totales: ' + respuesta.length;
    document.getElementById('listado').innerHTML = 'Listando pag ' + pag_actual + ' de ' + pag_totales;
    var desde = ((pag_actual-1) * num_results); 
    var hasta = (desde + (num_results*1));
    
    var tabla = '';
    for (let i = desde; i < hasta; i++) {
        if (i == respuesta.length){
            break;
        }
        tabla += '<td>'+respuesta[i].name+'</td>';
        tabla += '<td>'+respuesta[i].email+'</td>';
        tabla += '<td>'+'<button onclick="eliminar_company('+respuesta[i].id_company+')">DELETE</button>' +'</td>'+'</tr>';
    }
    datos.innerHTML = tabla;
}
function prev(){
    if (pag_actual > 1){
        pag_actual--;
    } 
    mostrar_datos();
}
function next(){
    var num_results = document.getElementById('results').value;
    var pag_totales = Math.ceil(respuesta.length / num_results);
    if (pag_actual < pag_totales){
        pag_actual++;
    } 
    mostrar_datos();
}
function registrar_company(){
    var token = document.getElementById("token").getAttribute("content");
    var nombre = document.getElementById('nombre').value;

    var ajax = new objetoAjax();
    ajax.open('POST', 'registrar_company', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('nombre', nombre);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            ver_companys();
        }
    }
    ajax.send(datasend);
}
function eliminar_company(id_company){
    //console.log(id_company) 
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'eliminar_company', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_company', id_company);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            ver_companys();
        }
    }
    ajax.send(datasend)
}