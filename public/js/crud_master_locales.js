var respuesta;
var pag_actual = 1;
window.onload = function() {
    ver_locales();
    cargar_company();
    cargar_grupo();
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
function ver_locales(){
    var datos = document.getElementById("datos");
    // console.log('hola')
    var token = document.getElementById("token").getAttribute("content");
    var f_nombre = document.getElementById("f_nombre").value;
    var f_email = document.getElementById("f_email").value;
    var f_company = document.getElementById("f_company").value;
    var f_grupo = document.getElementById("f_grupo").value;
    var f_dir = document.getElementById("f_dir").value;
    var f_cp = document.getElementById("f_cp").value;
    var f_ciudad = document.getElementById("f_ciudad").value;
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_locales', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('nombre', f_nombre);
    datasend.append('email', f_email);
    datasend.append('company', f_company);
    datasend.append('grupo', f_grupo);
    datasend.append('dir', f_dir);
    datasend.append('cp', f_cp);
    datasend.append('ciudad', f_ciudad);
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
    document.getElementById('total_datos').innerHTML = 'Locales totales: ' + respuesta.length;
    document.getElementById('listado').innerHTML = 'Listando pag ' + pag_actual + ' de ' + pag_totales;

    var desde = ((pag_actual-1) * num_results); 
    var hasta = (desde + (num_results*1));
    var tabla = '';
    for (let i = desde; i < hasta; i++) {
        if (i == respuesta.length){
            break;
        }
        tabla += '<td>'+ '<img src="./img/restaurantes/'+ respuesta[i].image +'" style="width: 100px">  ' + '</td>';
        tabla += '<td>'+respuesta[i].name+'</td>';
        tabla += '<td>'+respuesta[i].email+'</td>';
        tabla += '<td>'+respuesta[i].company+'</td>';
        tabla += '<td>'+respuesta[i].groupname +'</td>';
        tabla += '<td>'+respuesta[i].name_street + ', ' + respuesta[i].num_street +'</td>';
        tabla += '<td>'+respuesta[i].cod_postal +'</td>';
        tabla += '<td>'+respuesta[i].town_name +'</td>';
        tabla += '<td> <button onclick="openUpdate('+respuesta[i].id_local+')">UPDATE</button>'+ '</td>';
        tabla += '<td>'+'<button onclick="eliminar_local('+respuesta[i].id_local+')">DELETE</button>' +'</td>'+'</tr>';
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
function registrar_local(){
    var token = document.getElementById("token").getAttribute("content");
    var nombre = document.getElementById('nombre').value;
    var company = document.getElementById('company').value;
    var grupo = document.getElementById('grupo').value;
    var dir = document.getElementById('dir').value;
    var num_dir = document.getElementById('num_dir').value;
    var cod_pos = document.getElementById('cod_pos').value;
    var ciudad = document.getElementById('ciudad').value;
    console.log(nombre + ' ' + company + ' ' + grupo + ' ' + dir + ' ' + num_dir + ' ' + cod_pos + ' ' + ciudad)

    var ajax = new objetoAjax();
    ajax.open('POST', 'registrar_local', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('nombre', nombre);
    datasend.append('company', company);
    datasend.append('grupo', grupo); 
    datasend.append('dir', dir);
    datasend.append('num_dir', num_dir);
    datasend.append('cod_pos', cod_pos);
    datasend.append('ciudad', ciudad);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            ver_locales();
        }
    }
    ajax.send(datasend);
}
function eliminar_local(id_local){
    //console.log(id_local)
    // var datos = document.getElementById("datos");
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'eliminar_local', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_local', id_local);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            ver_locales();
        }
    }
    ajax.send(datasend)
}
function cargar_company(){
    var company = document.getElementById("company");
    var companya = document.getElementById("companya");
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();

    ajax.open('POST', 'ver_companys_l', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        var tabla = '<option selected disabled value="">Seleccione la compañia</option>';
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            //console.log(respuesta)
            for (let i = 0; i < respuesta.length; i++) {
                //console.log(respuesta[i].name)
                tabla += '<option value="'+ respuesta[i].id_company + '">' + respuesta[i].name + '</option>';
            }
        }
        company.innerHTML = tabla;
        companya.innerHTML = tabla;
    }
    ajax.send(datasend);
}
function cargar_grupo(){
    var grupo = document.getElementById("grupo");
    var grupoa = document.getElementById("grupoa");
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_grupos_l', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        var tabla = '<option selected disabled value="">Seleccione el grupo</option>';
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            //console.log(respuesta)
            for (let i = 0; i < respuesta.length; i++) {
                //console.log(respuesta[i].name)
                tabla += '<option value="'+ respuesta[i].id_group + '">' + respuesta[i].groupname + '</option>';
            }
        }
        grupo.innerHTML = tabla;
        grupoa.innerHTML = tabla;
    }
    ajax.send(datasend);
}
function openUpdate(id_local){
    //var x = document.getElementById("actualizar");
    //x.style.display = "block";
    //closeRegister();
    ver_local(id_local);
    console.log(id_local)
}
function ver_local(id_local){
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_local', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_local', id_local)
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta)
            document.getElementById('id_local').value = respuesta[0].id_local;
            document.getElementById('nombrea').value = respuesta[0].name;
            document.getElementById('emaila').value = respuesta[0].email;
            document.getElementById('companya').value = respuesta[0].id_company_fk;
            document.getElementById('grupoa').value = respuesta[0].id_group_fk;
            document.getElementById('dira').value = respuesta[0].name_street;
            document.getElementById('num_dira').value = respuesta[0].num_street;
            document.getElementById('cod_posa').value = respuesta[0].cod_postal;
            document.getElementById('ciudada').value = respuesta[0].town_name;
        }
    }
    ajax.send(datasend);
}
function actualizar_local(){
    var token = document.getElementById("token").getAttribute("content");
    var id_local = document.getElementById('id_local').value;
    var nombre = document.getElementById('nombrea').value;
    var email = document.getElementById('emaila').value;
    var company = document.getElementById('companya').value;
    var grupo = document.getElementById('grupoa').value;
    var dir = document.getElementById('dira').value;
    var num_dir = document.getElementById('num_dira').value;
    var cod_pos = document.getElementById('cod_posa').value;
    var ciudad = document.getElementById('ciudada').value;
    //console.log(confidentiality)

    var ajax = new objetoAjax();
    ajax.open('POST', 'actualizar_local', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_local', id_local);
    datasend.append('nombre', nombre);
    datasend.append('email', email);
    datasend.append('company', company);
    datasend.append('grupo', grupo);
    datasend.append('dir', dir);
    datasend.append('num_dir', num_dir);
    datasend.append('cod_pos', cod_pos);
    datasend.append('ciudad', ciudad);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            ver_locales();
        }
    }
    ajax.send(datasend);
}
function openRegister(){
    closeUpdate();
    var x = document.getElementById("registrar");
    x.style.display = "block";
    var btn = document.getElementById("btn-register");
    btn.style.display = "none";
}
function closeRegister(){
    var x = document.getElementById("registrar");
    x.style.display = "none";
    var btn = document.getElementById("btn-register");
    btn.style.display = "block";
    document.getElementById('nombre').value = '';
    document.getElementById('company').value = '';
    document.getElementById('grupo').value = '';
    document.getElementById('dir').value = '';
    document.getElementById('num_dir').value = '';
    document.getElementById('cod_pos').value = '';
    document.getElementById('ciudad').value = '';
}
function openUpdate(id_user){
    var x = document.getElementById("actualizar");
    x.style.display = "block";
    closeRegister();
    ver_local(id_user);
    //console.log(id_user)
}
function closeUpdate(){
    var x = document.getElementById("actualizar");
    x.style.display = "none";
}