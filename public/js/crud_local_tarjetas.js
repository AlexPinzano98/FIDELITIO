var respuesta;
var pag_actual = 1;
window.onload = function() {
    ver_tarjetas();
    start();
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

function ver_tarjetas() {
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
    datasend.append('email', f_nombre);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            respuesta = JSON.parse(ajax.responseText);
            //console.log(respuesta)
            pag_actual = 1;
            mostrar_datos();
        }
    }
    ajax.send(datasend);
}

function mostrar_datos() {
    var datos = document.getElementById("datos");
    var num_results = document.getElementById('results').value;
    var pag_totales = Math.ceil(respuesta.length / num_results)
    document.getElementById('total_datos').innerHTML = 'Usuarios totales: ' + respuesta.length;
    document.getElementById('listado').innerHTML = 'Listando pag ' + pag_actual + ' de ' + pag_totales;

    var desde = ((pag_actual - 1) * num_results);
    var hasta = (desde + (num_results * 1));

    var datos = document.getElementById("datos");
    var tabla = '';
    for (let i = desde; i < hasta; i++) {
        if (i == respuesta.length) {
            break;
        }
        tabla += '<td>' + respuesta[i].stamp_now + '</td>';
        if (respuesta[i].status == 'open') { // Tarjeta abierta (open)
            tabla += '<td>' + '<a onclick="cambiar_estado(' + respuesta[i].id_card + ',' + 1 + ')"><i class="fas fa-lock-open"></a>' + '</td>';
        } else { // Tarjeta cerrada (close)
            tabla += '<td>' + '<a onclick="cambiar_estado(' + respuesta[i].id_card + ',' + 0 + ')"><i class="fas fa-lock"></i></a>' + '</td>';
        }
        tabla += '<td>' + respuesta[i].name_promo + '</td>';
        tabla += '<td>' + respuesta[i].email + '</td>';
        tabla += '<td>' + respuesta[i].create_date + '</td>';
        tabla += '<td>' + respuesta[i].complete_date_card + '</td>';
        tabla += '<td>' + respuesta[i].status_card + '</td>';
        tabla += '<td> <button onclick="openUpdate(' + respuesta[i].id_card + ')"><i class="fas fa-user-edit"></i></button>' + '</td>';
        tabla += '<td>' + '<button onclick="eliminar_tarjeta(' + respuesta[i].id_card + ')"><i class="fas fa-user-slash"></i></button>' + '</td></tr>';
    }
    datos.innerHTML = tabla;
}

function prev() {
    if (pag_actual > 1) {
        pag_actual--;
    }
    mostrar_datos();
}

function next() {
    var num_results = document.getElementById('results').value;
    var pag_totales = Math.ceil(respuesta.length / num_results);
    if (pag_actual < pag_totales) {
        pag_actual++;
    }
    mostrar_datos(pag_actual);
}

function start() {
    var local = document.getElementById("local");
    var locala = document.getElementById("locala");
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
                tabla += '<option value="' + respuesta[i].id_local + '">' + respuesta[i].name + '</option>';
            }
        }
        local.innerHTML = tabla;
        locala.innerHTML = tabla;
    }
    ajax.send(datasend);
}

function start_promocion() {
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
                    tabla += '<option value="' + respuesta[i].id_promotion + '">' + respuesta[i].name_promo + '</option>';
                }
            }

        }
        promo.innerHTML = tabla;
    }
    ajax.send(datasend);
}

function registrar_tarjeta() {
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

function eliminar_tarjeta(id_tarjeta) {
    console.log(id_tarjeta)
        // var datos = document.getElementById("datos");
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'eliminar_tarjeta', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_tarjeta', id_tarjeta);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            // var respuesta = JSON.parse(ajax.responseText);
            // console.log(respuesta);
            ver_tarjetas();
        }
    }
    ajax.send(datasend)
}

function cambiar_estado(id, act) {
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'cambiar_estado_t', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_card', id);
    datasend.append('status', act);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            ver_tarjetas();
        }
    }
    ajax.send(datasend);
}

function openUpdate(id_card) {
    console.log(id_card)
        // var x = document.getElementById("actualizar");
        //x.style.display = "block";
        // closeRegister();
    ver_card(id_card);
    //console.log(id_card) 
}

function ver_card(id_card) {
    //console.log(id_card);
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_card', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_card', id_card)
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta)
            document.getElementById('locala').value = respuesta[0].id_local_fk;
            document.getElementById('sellosa').value = respuesta[0].stamp_now;
            document.getElementById('emaila').value = respuesta[0].email;
            /*document.getElementById('id_user').value = respuesta[0].id_user;
            document.getElementById('nombrea').value = respuesta[0].name;
            document.getElementById('apellidosa').value = respuesta[0].lastname;
            document.getElementById('emaila').value = respuesta[0].email;
            document.getElementById('contrasenyaa').value = respuesta[0].psswd;
            document.getElementById('sexoa').value = respuesta[0].gender;
            document.getElementById('rola').value = respuesta[0].id_typeuser_fk;
            if (respuesta[0].confidentiality == 1){
                document.getElementById('consentimientoa').checked = true;
            } else {
                document.getElementById('consentimientoa').checked = false;
            }*/
        }
    }
    ajax.send(datasend);
}

function openRegister() {
    closeUpdate();
    var x = document.getElementById("registrar");
    x.style.display = "block";
    var btn = document.getElementById("btn-register");
    btn.style.display = "none";
}

function closeRegister() {
    var x = document.getElementById("registrar");
    x.style.display = "none";
    var btn = document.getElementById("btn-register");
    btn.style.display = "block";
    document.getElementById('local').value = '';
    document.getElementById('promo').value = '';
    document.getElementById('email').value = '';
}

function closeRegisterIcons() {
    document.getElementById('icon_name').value = '';
    document.getElementById('onimg').value = '';
    document.getElementById('offimg').value = '';
}

function openUpdate(id_user) {
    var x = document.getElementById("actualizar");
    x.style.display = "block";
    closeRegister();
    ver_card(id_user);
    //console.log(id_user)
}

function closeUpdate() {
    var x = document.getElementById("actualizar");
    x.style.display = "none";
}