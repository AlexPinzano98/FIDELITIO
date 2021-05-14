window.onload = function() {
    ver_usuarios();
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

function ver_usuarios() {
    var datos = document.getElementById("datos");
    //console.log('hola')
    var token = document.getElementById("token").getAttribute("content");
    var f_nombre = document.getElementById("f_nombre").value;
    var f_apellidos = document.getElementById("f_apellidos").value;
    var f_email = document.getElementById("f_email").value;
    var f_sexo = document.getElementById("f_sexo").value;
    var f_conf = document.getElementById("f_conf").value;
    var f_rol = document.getElementById("f_rol").value;
    var f_status = document.getElementById("f_status").value;
    console.log(f_sexo)
    var ajax = new objetoAjax();
    ajax.open('GET', 'ver_usuarios', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('nombre', f_nombre);
    datasend.append('apellidos', f_apellidos);
    datasend.append('email', f_email);
    datasend.append('sexo', f_sexo);
    datasend.append('conf', f_conf);
    datasend.append('rol', f_rol);
    datasend.append('status', f_status);
    ajax.onreadystatechange = function() {
        var tabla = '';
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            // var pagination = document.getElementsByClassName('pagination')[0];

            for (let i = 0; i < respuesta.length; i++) {
                //console.log(respuesta[i])
                tabla += '<tr>' + '<td>' + respuesta[i].id_user + '</td>';
                tabla += '<td>' + respuesta[i].name + '</td>';
                tabla += '<td>' + respuesta[i].lastname + '</td>';
                tabla += '<td>' + respuesta[i].email + '</td>';
                tabla += '<td>' + respuesta[i].gender + '</td>';
                if (respuesta[i].confidentiality == 1) {
                    tabla += '<td>' + 'Si' + '</td>';
                } else {
                    tabla += '<td>' + 'No' + '</td>';
                }

                switch (respuesta[i].id_typeuser_fk) {
                    case 1:
                        tabla += '<td>' + 'Cliente' + '</td>';
                        break;
                    case 2:
                        tabla += '<td>' + 'Camarero' + '</td>';
                        break;
                    case 3:
                        tabla += '<td>' + 'Adm establecimiento' + '</td>';
                        break;
                    case 4:
                        tabla += '<td>' + 'Adm grupo' + '</td>';
                        break;
                    case 5:
                        tabla += '<td>' + 'Adm master' + '</td>';
                        break;
                }

                if (respuesta[i].status == 'Activo') { // Usuario activo
                    tabla += '<td>' + '<a onclick="cambiar_estado(' + respuesta[i].id_user + ',' + 1 + ')">Activo</a>' + '</td>';
                } else { // Usuario inactivo
                    tabla += '<td>' + '<a onclick="cambiar_estado(' + respuesta[i].id_user + ',' + 0 + ')">Inhabilitado</a>' + '</td>';
                }
                tabla += '<td> <button onclick="openUpdate(' + respuesta[i].id_user + ')">UPDATE</button>' + '</td>';
                tabla += '<td>' + '<button onclick="eliminar_usuario(' + respuesta[i].id_user + ')">DELETE</button>' + '</td>' + '</tr>';


            }

            //pagination

            $(document).ready(function() {
                $('#tablax').DataTable({
                    retrieve: true,
                    responsive: true,
                    searchPanes: true,
                    info: false,
                    language: {
                        processing: "Tratamiento en curso...",
                        search: "Buscar:",
                        lengthMenu: "Agrupar por _MENU_ usuarios",
                        // info: "",
                        infoEmpty: "No existen datos.",
                        infoFiltered: "(filtrado de _MAX_ elementos en total)",
                        infoPostFix: "",
                        loadingRecords: "Cargando...",
                        zeroRecords: "No se encontraron datos con tu busqueda",
                        emptyTable: "No hay datos disponibles en la tabla.",
                        paginate: {
                            first: "Primero",
                            previous: "Anterior",
                            next: "Siguiente",
                            last: "Ultimo"
                        },
                        aria: {
                            sortAscending: ": active para ordenar la columna en orden ascendente",
                            sortDescending: ": active para ordenar la columna en orden descendente"
                        }
                    },
                    // scrollY: 400,
                    lengthMenu: [
                        [10, 25, 50, 100 - 1],
                        [10, 25, 50, 100, "Todo"]
                    ],

                });

            });

        }
        datos.innerHTML = tabla;
    }
    ajax.send(datasend);
}


function registrar_usuario() {
    var token = document.getElementById("token").getAttribute("content");
    var nombre = document.getElementById('nombre').value;
    var apellidos = document.getElementById('apellidos').value;
    var email = document.getElementById('email').value;
    var psswd = document.getElementById('psswd').value;
    var sexo = document.getElementById('sexo').value;
    var confidentiality = document.getElementById('consentimiento').checked;
    var rol = document.getElementById('rol').value;
    //console.log(confidentiality)

    var ajax = new objetoAjax();
    ajax.open('POST', 'registrar_usuario', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('nombre', nombre);
    datasend.append('apellidos', apellidos);
    datasend.append('email', email);
    datasend.append('psswd', psswd);
    datasend.append('sexo', sexo);
    datasend.append('confidentiality', confidentiality);
    datasend.append('rol', rol);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
        }

        ver_usuarios();
        borrar_registro();
    }
    ajax.send(datasend);
}

function cambiar_estado(id, act) {
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'cambiar_estado', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_user', id);
    datasend.append('status', act);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);

            ver_usuarios();
        }
    }
    ajax.send(datasend);
}

function ver_usuario(id_user) {
    //console.log(id_user);
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_usuario', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_user', id_user)
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta[0])
            document.getElementById('id_user').value = respuesta[0].id_user;
            document.getElementById('nombrea').value = respuesta[0].name;
            document.getElementById('apellidosa').value = respuesta[0].lastname;
            document.getElementById('emaila').value = respuesta[0].email;
            document.getElementById('contrasenyaa').value = respuesta[0].psswd;
            document.getElementById('sexoa').value = respuesta[0].gender;
            document.getElementById('rola').value = respuesta[0].id_typeuser_fk;
            if (respuesta[0].confidentiality == 1) {
                document.getElementById('consentimientoa').checked = true;
            } else {
                document.getElementById('consentimientoa').checked = false;
            }
        }
    }
    ajax.send(datasend);
}

function actualizar_usuario() {
    var token = document.getElementById("token").getAttribute("content");
    var id = document.getElementById('id_user').value;
    var nombre = document.getElementById('nombrea').value;
    var apellidos = document.getElementById('apellidosa').value;
    var email = document.getElementById('emaila').value;
    var psswd = document.getElementById('contrasenyaa').value;
    var sexo = document.getElementById('sexoa').value;
    var confidentiality = document.getElementById('consentimientoa').checked;
    var rol = document.getElementById('rola').value;
    //console.log(confidentiality)

    var ajax = new objetoAjax();
    ajax.open('POST', 'actualizar_usuario', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_user', id);
    datasend.append('nombre', nombre);
    datasend.append('apellidos', apellidos);
    datasend.append('email', email);
    datasend.append('psswd', psswd);
    datasend.append('sexo', sexo);
    datasend.append('confidentiality', confidentiality);
    datasend.append('rol', rol);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);

            ver_usuarios();
        }
    }
    ajax.send(datasend);
}

function eliminar_usuario(id_usuario) {
    console.log(id_usuario)
        // var datos = document.getElementById("datos");
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'eliminar_usuario', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('id_usuario', id_usuario);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            // var respuesta = JSON.parse(ajax.responseText);
            // console.log(respuesta);

            ver_usuarios();
        }
    }
    ajax.send(datasend)
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
}

function openUpdate(id_user) {
    var x = document.getElementById("actualizar");
    x.style.display = "block";
    closeRegister();
    ver_usuario(id_user);
    //console.log(id_user)
}

function closeUpdate() {
    var x = document.getElementById("actualizar");
    x.style.display = "none";
}

function borrar_registro() {
    document.getElementById('nombre').value = '';
    document.getElementById('apellidos').value = '';
    document.getElementById('email').value = '';
    document.getElementById('psswd').value = '';
    document.getElementById('sexo').value = '';
    document.getElementById('consentimiento').checked = false;
}