window.onload = function() {
    ver_permisos();
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

function ver_permisos(){
    var permissionsTag = document.getElementById("permissions");
    var ajax = new objetoAjax();
    ajax.open('GET', 'sendSessionId', true);

    ajax.onreadystatechange = function() {

        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta[0].id_typeuser_fk);

            switch(respuesta[0].id_typeuser_fk) {
                case 3:
                    permissionsTag.innerHTML = `
                    <a href="crudPromociones">PROMOCIONES</a>
                    <a href="crudTarjetas">TARJETAS</a>
                    <a href="crudUsuarios">USUARIOS</a>`
                  break;
                case 4:
                    permissionsTag.innerHTML = `
                    <a href="crudLocales">LOCALES</a>
                    <a href="crudPromociones">PROMOCIONES</a>
                    <a href="crudTarjetas">TARJETAS</a>
                    <a href="crudUsuarios">USUARIOS</a>`
                  break;
                default:
                    permissionsTag.innerHTML = ` <a href="crudCompany">COMPAÑIAS</a>
                    <a href="crudLocales">LOCALES</a>
                    <a href="crudPromociones">PROMOCIONES</a>
                    <a href="crudTarjetas">TARJETAS</a>
                    <a href="crudUsuarios">USUARIOS</a>`;
              }

        }

    }

    ajax.send();

}


