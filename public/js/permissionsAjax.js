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

function ver_usuarios(){

    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_usuarios', true);

    ajax.onreadystatechange = function() {
        // var tags = '';
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            console.log(respuesta);
            // var pagination = document.getElementsByClassName('pagination')[0];

            // for (let i = 0; i < respuesta.length; i++) {
            //     //console.log(respuesta[i])
            //     tabla += '<tr>'+'<td>'+respuesta[i].id_user+'</td>';
            //     tabla += '<td>'+respuesta[i].name+'</td>';
            //     tabla += '<td>'+respuesta[i].lastname+'</td>';
            //     tabla += '<td>'+respuesta[i].email+'</td>';
            //     tabla += '<td>'+respuesta[i].gender+'</td>';
            //     if (respuesta[i].confidentiality == 1) {
            //         tabla += '<td>'+ 'Si' +'</td>';
            //     } else {
            //         tabla += '<td>'+ 'No' +'</td>';
            //     }

            //     switch (respuesta[i].id_typeuser_fk) {
            //         case 1:
            //             tabla += '<td>'+ 'Cliente' +'</td>';
            //             break;
            //         case 2:
            //             tabla += '<td>'+ 'Camarero' +'</td>';
            //             break;
            //         case 3:
            //             tabla += '<td>'+ 'Adm establecimiento' +'</td>';
            //             break;
            //         case 4:
            //             tabla += '<td>'+ 'Adm grupo' +'</td>';
            //             break;
            //         case 5:
            //             tabla += '<td>'+ 'Adm master' +'</td>';
            //             break;
            //     }

            //     if (respuesta[i].status=='Activo'){ // Usuario activo
            //         tabla += '<td>'+'<a onclick="cambiar_estado('+respuesta[i].id_user + ',' + 1 +')">Activo</a>'+'</td>';
            //     } else { // Usuario inactivo
            //         tabla += '<td>'+'<a onclick="cambiar_estado('+respuesta[i].id_user + ',' + 0 +')">Inhabilitado</a>'+'</td>';
            //     }
            //     tabla += '<td> <button onclick="openUpdate('+respuesta[i].id_user+')">UPDATE</button>'+ '</td>';
            //     tabla += '<td>'+'<button onclick="eliminar_usuario('+respuesta[i].id_user+')">DELETE</button>' +'</td>'+'</tr>';


            // }

            //pagination


        }
        // datos.innerHTML = tabla;
    }
    // ajax.send(datasend);
}


