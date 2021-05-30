window.onload = function() {
    perfilU();
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

function perfilU() {
    var section = document.getElementById('perfilU');
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    // Busca la ruta read y que sea asyncrono
    ajax.open('GET', 'datosU', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            var tabla = '';
            if (respuesta.length > 0) {
                tabla += '<div id="card">';
                tabla += '<div class="card-block text-center">';
                tabla += '<div class="m-b-25">';
                tabla += '<img src="https://img.icons8.com/bubbles/100/000000/user.png"> ';
                tabla += '</div>';
                tabla += "<p class='font-italic'>Pablo Soriano Antón</p>";
                tabla += '<button type="submit" id="editarP">Editar perfil</button>';
                tabla += '<i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>';
                tabla += '</div>';
                tabla += '<div class="card-block col-sm-8">';
                tabla += '<h6 class="m-b-20 p-b-5">Mis datos</h6>';
                tabla += '<div class="row">';
                tabla += '<div class="col-sm-6">';
                tabla += '<p class="m-b-10">Nombre</p>';
                tabla += '<h6 class="text-muted">' + respuesta.name + '</h6>';
                tabla += '</div>';
                tabla += '<div class="col-sm-6">';
                tabla += '<p class="m-b-10">Email</p>';
                tabla += '<h6 class="text-muted"' + respuesta.email + '</h6>';
                tabla += '</div>';
                tabla += '<div class="col-sm-6">';
                tabla += '<p class="m-b-10">Teléfono</p>';
                tabla += '<h6 class="text-muted">' + respuesta.phone + '</h6>';
                tabla += '</div>';
                tabla += '<div class="col-sm-6">';
                tabla += '<p class="m-b-10">Género</p>';
                tabla += '<h6 class="text-muted">' + respuesta.gender + '</h6>';
                tabla += '</div>';
                tabla += '<div class="col-sm-6">';
                tabla += '<p class="m-b-10">Contraseña</p>';
                tabla += '<h6 class="text-muted">' + respuesta.psswd + '</h6>';
                tabla += '</div>';
                tabla += '<h6 class="m-b-20 m-t-40 p-b-5 b-b-default" >Opciones</h6>';
                tabla += '<div class="row">';
                tabla += '<div class="col-sm-6">';
                tabla += '<p class="m-b-10">Recent</p>';
                tabla += '<h6 class="text-muted">' + respuesta.cognoms + '</h6>';
                tabla += '</div>';
                tabla += '</div>';
                tabla += '</div>';
                tabla += '</div>';
                tabla += '</div>';
            }
            section.innerHTML = tabla;
        }
    }
    ajax.send(datasend);
}