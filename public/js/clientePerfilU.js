window.onload = function() {
    //? VER INFO USUARIO
    verInfouser();
    editPerfil();
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

function verInfouser() {
    //! FUNCION PARA MOSTRAR EL RESULTADO EN LA VISTA
    var ajax = new objetoAjax();
    //var token = document.getElementById("token").getAttribute("content");
    ajax.open("GET", "verInfouser", true);
    //var datos = new FormData();
    //datos.append("_token", token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var response = JSON.parse(ajax.responseText);

            tabla = "";
            for (let i = 0; i < response.length; i++) {
                //console.log(response[i])
                // * INSERTAMOS DATOS RECOGIDOS DEL CONTROLADOR
                tabla += `<h6 class="m-b-20 p-b-5">Mis datos</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="m-b-10">Nombre</p>
                            <h6 class="text-muted">` + response[i].name + `</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10">Apellido</p>
                            <h6 class="text-muted">` + response[i].lastname + `</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10">Email</p>
                            <h6 class="text-muted">` + response[i].email + `</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10">Teléfono</p>
                            <h6 class="text-muted">` + response[i].phone + `</h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10">Género</p>
                            <h6 class="text-muted">` + response[i].gender + `</h6>
                        </div>
                    </div>`;
                tabla += '<form method="get" action="editar/' + response[i].id_user + '" >'
                tabla += '<button type="submit" class="btn btn-outline-primary">Editar</button>'
                tabla += '</form>'
            }

            datosUsuario.innerHTML = tabla;
        }
    }
    ajax.send();
}