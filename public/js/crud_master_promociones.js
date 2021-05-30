var respuesta;
var pag_actual = 1;
window.onload = function() {
    ver_promociones();
    start_locales();
    start_iconos();
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
    var datos = document.getElementById("datos");
    // console.log('hola')
    var token = document.getElementById("token").getAttribute("content");
    var f_sellos = document.getElementById("f_sellos").value;
    var f_premio = document.getElementById("f_premio").value;
    var f_nombre = document.getElementById("f_nombre").value;
    var f_ilimitada = document.getElementById("f_ilimitada").value;
    var f_local = document.getElementById("f_local").value;
    var f_email = document.getElementById("f_email").value;
    var f_status = document.getElementById("f_status").value;
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_promos_master', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('sellos', f_sellos);
    datasend.append('premio', f_premio);
    datasend.append('nombre', f_nombre);
    datasend.append('ilimitada', f_ilimitada);
    datasend.append('local', f_local);
    datasend.append('email', f_email);
    datasend.append('status', f_status);
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

function mostrar_datos() {
    var datos = document.getElementById("datos");
    var num_results = document.getElementById('results').value;
    var pag_totales = Math.ceil(respuesta.length / num_results)
    document.getElementById('total_datos').innerHTML = 'Promociones totales: ' + respuesta.length;
    document.getElementById('listado').innerHTML = 'Listando pag ' + pag_actual + ' de ' + pag_totales;

    var desde = ((pag_actual - 1) * num_results);
    var hasta = (desde + (num_results * 1));

    var tabla = '';
    for (let i = desde; i < hasta; i++) {
        if (i == respuesta.length) {
            break;
        }
        //console.log(respuesta[i])
        //tabla += '<td>'+ '<img src="storage/storage/icons/UqNtJHQjMfbBpLUkRORaM4dp6abyFWBbRH4SlIpt.svg" alt="perfilRestaurant">'+'</td>'
        tabla += '<td>' + respuesta[i].stamp_max + '</td>';
        tabla += '<td>' + respuesta[i].reward + '</td>';
        tabla += '<td>' + respuesta[i].name_promo + '</td>';

        tabla += '<td>' + respuesta[i].name + '</td>';
        tabla += '<td>' + respuesta[i].email + '</td>';
        if (respuesta[i].unlimited == 'Si') { // Promocion ilimitada
            tabla += '<td style="color: blue;"> Ilimitada </td>';
            tabla += '<td>' + respuesta[i].unlimited + '</td>';
        } else { // Promoción limitada
            tabla += '<td style="color: green;">' + respuesta[i].expiration + '</td>';
            tabla += '<td>' + respuesta[i].unlimited + '</td>';
        }
        tabla += '<td>' + respuesta[i].create_date_promo + '</td>';
        tabla += '<td>' + respuesta[i].close_data_promo + '</td>';
        if (respuesta[i].status_promo == 'enable') { // Usuario activo
            tabla += '<td>' + '<a onclick="cambiar_estado(' + respuesta[i].id_promotion + ',' + 1 + ')"><i class="fas fa-lock" style="color: green"></i></a>' + '</td>';
        } else { // Usuario inactivo
            tabla += '<td>' + '<a onclick="cambiar_estado(' + respuesta[i].id_promotion + ',' + 0 + ')"><i class="fas fa-lock"></i></a>' + '</td>';
        }
        tabla += '<td> <button onclick="openUpdate(' + respuesta[i].id_promotion + ')"><i class="fas fa-edit"></i></button>' + '</td>';
        tabla += '<td>' + '<button onclick="eliminar_promo(' + respuesta[i].id_promotion + ')"><i class="fas fa-trash-alt"></i></button>' + '</td>' + '</tr>';
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
    mostrar_datos();
}

function eliminar_promo(id_promo) {
    //console.log(id_promo)
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'eliminar_promo', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_promo', id_promo);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            ver_promociones();
        }
    }
    ajax.send(datasend)
}

function cambiar_estado(id, act) {
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'cambiar_estado_p', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_promo', id);
    datasend.append('status', act);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            ver_promociones();
        }
    }
    ajax.send(datasend);
}

function start_locales() {
    var locales = document.getElementById("restaurante");
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_locales_p', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        var tabla = '<option selected disabled value="">Seleccione el restaurante</option>';
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            //console.log(respuesta)
            for (let i = 0; i < respuesta.length; i++) {
                //console.log(respuesta[i].name)
                tabla += '<option value="' + respuesta[i].id_local + '">' + respuesta[i].name + '</option>';
            }
        }
        locales.innerHTML = tabla;
    }
    ajax.send(datasend);
}

function start_iconos() {
    var iconos = document.getElementById("iconos");
    var iconosa = document.getElementById("iconosa");
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_iconos', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        var tabla = '<option selected disabled value="0">Seleccione el icono</option>';
        var tabla2 = '<option selected disabled value="0">Seleccione el icono</option>';
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            //console.log(respuesta)
            for (let i = 0; i < respuesta.length; i++) {
                //console.log(respuesta[i].name)
                tabla += '<option value="' + respuesta[i].id_image + '" onselect="mostrar_iconos(' + respuesta[i].id_image + ')">' + respuesta[i].name + '</option>';
                tabla2 += '<option value="' + respuesta[i].id_image + '">' + respuesta[i].name + '</option>';
            }
        }
        iconos.innerHTML = tabla;
        iconosa.innerHTML = tabla2;
    }
    ajax.send(datasend);
}

function mostrar_iconos(id_img) {
    console.log(id_img)
    var on = document.getElementById('img_on_r');
    var off = document.getElementById('img_off_r');
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_icono', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_icono', id_img);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta)
            on.src = 'storage/' + respuesta[0].on;
            off.src = 'storage/' + respuesta[0].off;
        }
    }
    ajax.send(datasend);
}

function registrar_promo() {
    var token = document.getElementById("token").getAttribute("content");
    var id_icono = document.getElementById('iconos').value;
    var nombre = document.getElementById('nombre').value;
    var premio = document.getElementById('premio').value;
    var sellos = document.getElementById('sellos').value;
    var fecha = document.getElementById('fecha').value;
    var restaurante = document.getElementById('restaurante').value;

    var ajax = new objetoAjax();
    ajax.open('POST', 'registrar_promo', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_icono', id_icono);
    datasend.append('nombre', nombre);
    datasend.append('premio', premio);
    datasend.append('sellos', sellos);
    datasend.append('fecha', fecha);
    datasend.append('restaurante', restaurante);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            ver_promociones();
            closeRegister();
        }
    }
    ajax.send(datasend);
}

function actualizar_promo() {
    var token = document.getElementById("token").getAttribute("content");
    var id_promo = document.getElementById('id_promo').value;
    var id_icono = document.getElementById('iconosa').value;
    var nombre = document.getElementById('nombrea').value;
    var premio = document.getElementById('premioa').value;
    var fecha = document.getElementById('fechaa').value;

    var ajax = new objetoAjax();
    ajax.open('POST', 'actualizar_promo', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_promo', id_promo);
    datasend.append('id_icono', id_icono);
    datasend.append('nombre', nombre);
    datasend.append('premio', premio);
    datasend.append('fecha', fecha);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            ver_promociones();
            closeUpdate();
        }
    }
    ajax.send(datasend);
}

function openUpdate(id_promo) {
    //var x = document.getElementById("actualizar");
    // x.style.display = "block";
    // closeRegister();
    ver_promo(id_promo);
    console.log(id_promo)
}

function ver_promo(id_promo) {
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_promo', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_promo', id_promo)
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta[0])
            document.getElementById('id_promo').value = respuesta[0].id_promotion;
            document.getElementById('iconosa').value = respuesta[0].id_image_fk_promo;
            document.getElementById('nombrea').value = respuesta[0].name_promo;
            document.getElementById('premioa').value = respuesta[0].reward;
            document.getElementById('sellosa').value = respuesta[0].stamp_max;
            // Marcamos si es seleccionada o no
            if (respuesta[0].unlimited == 'No') {
                document.getElementById('Noa').checked = true;
                document.getElementById('div_fechaa').style.display = 'block';
                document.getElementById('fechaa').value = respuesta[0].expiration;
            } else {
                document.getElementById('Sia').checked = true;
                document.getElementById('div_fechaa').style.display = 'none';
            }
            document.getElementById('fechaa').value = respuesta[0].expiration;
            document.getElementById('emaila').value = respuesta[0].email;
            document.getElementById('restaurantea').value = respuesta[0].name;
        }
    }
    ajax.send(datasend);
}

function openRegister() {
    message1.innerHTML = "";
    message2.innerHTML = "";
    message3.innerHTML = "";
    closeUpdate();
    var x = document.getElementById("registrar");
    x.style.display = "block";
    var btn = document.getElementById("btn-register");
    btn.style.display = "none";
    closeRegisterIcon();
}

function closeRegister() {
    var x = document.getElementById("registrar");
    x.style.display = "none";
    var btn = document.getElementById("btn-register");
    btn.style.display = "block";
    document.getElementById('iconos').value = 0;
    document.getElementById('img_on_r').src = '';
    document.getElementById('img_off_r').src = '';
    document.getElementById('nombre').value = '';
    document.getElementById('premio').value = '';
    document.getElementById('sellos').value = '';
    document.getElementById('Si').checked = true;
    document.getElementById('fecha').value = '';
    document.getElementById('div_fecha').style.display = 'none';
    document.getElementById('restaurante').value = '';
}

function openUpdate(id_user) {
    message1.innerHTML = "";
    message2.innerHTML = "";
    message3.innerHTML = "";
    var x = document.getElementById("actualizar");
    x.style.display = "block";
    closeRegister();
    ver_promo(id_user);
    //console.log(id_user)
}

function closeUpdate() {
    var x = document.getElementById("actualizar");
    x.style.display = "none";
}

function display_fecha(sino) {
    console.log(sino)
    var div_fecha = document.getElementById('div_fecha');
    var fecha = document.getElementById('fecha');
    if (sino == 0) {
        div_fecha.style.display = 'block';
    } else {
        div_fecha.style.display = 'none';
        fecha.value = '';
    }
}

function display_fechaa(sino) {
    console.log(sino)
    var div_fecha = document.getElementById('div_fechaa');
    var fecha = document.getElementById('fechaa');
    if (sino == 0) {
        div_fecha.style.display = 'block';
    } else {
        div_fecha.style.display = 'none';
        fecha.value = '';
    }
}
document.getElementById("onimg").onchange = function(e) {
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();

    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);

    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function() {
        let preview = document.getElementById('onprev'),
            image = document.createElement('img');

        image.src = reader.result;
        image.style.width = '50px';

        preview.innerHTML = '';
        preview.append(image);
    };
}
document.getElementById("offimg").onchange = function(e) {
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();

    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);

    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function() {
        let preview = document.getElementById('offprev'),
            image = document.createElement('img');

        image.src = reader.result;
        image.style.width = '50px';

        preview.innerHTML = '';
        preview.append(image);
    };
}

function registerIcon() {
    var token = document.getElementById("token").getAttribute("content");
    let fileon = document.getElementById('onimg').files[0];
    let fileoff = document.getElementById('offimg').files[0];
    var name = document.getElementById('icon_name').value;

    var ajax = new objetoAjax();
    ajax.open('POST', 'registrar_icono', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('fileon', fileon);
    datasend.append('fileoff', fileoff);
    datasend.append('name', name);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            //ver_promociones();
        }
    }
    ajax.send(datasend);
}

function openRegisterIcons() {
    message1.innerHTML = "";
    message2.innerHTML = "";
    message3.innerHTML = "";
    document.getElementById('newIcono').style.display = 'block';
    document.getElementById('btn-register-icon').style.display = 'none';
    closeRegisterIcons();
    closeRegister();
}

function closeRegisterIcon() {
    document.getElementById('newIcono').style.display = 'none';
    document.getElementById('btn-register-icon').style.display = 'block';
    closeRegisterIcons();
}

function closeRegisterIcons() {
    document.getElementById('icon_name').value = '';
    document.getElementById('onimg').value = '';
    document.getElementById('offimg').value = '';
    document.getElementById('onprev').innerHTML = '';
    document.getElementById('offprev').innerHTML = '';
}