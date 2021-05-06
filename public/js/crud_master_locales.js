var respuesta = '';
window.onload = function() {
    ver_locales();
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
    //console.log('hola')
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_locales', true);
    var datasend = new FormData();
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        var tabla = '';
        if (ajax.readyState == 4 && ajax.status == 200) {
            respuesta = JSON.parse(ajax.responseText);
            //console.log(respuesta)
            /*
            for (let i = 0; i < respuesta.length; i++) {
                tabla += '<tr>'+'<td>'+respuesta[i].id_local+'</td>';
                tabla += '<td>'+respuesta[i].image+'</td>';
                tabla += '<td>'+respuesta[i].name+'</td>';
                tabla += '<td>'+respuesta[i].id_user_fk+'</td>';
                tabla += '<td>'+respuesta[i].id_company_fk+'</td>';
                tabla += '<td>'+respuesta[i].id_group_fk +'</td></tr>';
            }*/
            paginado(respuesta)
        }
        // datos.innerHTML = tabla;
    }
    ajax.send(datasend);
}

function paginado(){
    console.log(respuesta)
    var datos = document.getElementById("datos");
    var num_registros = document.getElementById("resultados").value;
    //console.log(num_registros)
    //console.log(respuesta.length)

    var dato = respuesta.length / num_registros;
    console.log(Math.ceil(dato)) // Tenemos el numero de paginas para listar
    var tabla = '';
    for (let i = 0; i < num_registros ; i++){
        // console.log(respuesta[i].name)
        tabla += '<tr>'+'<td>'+respuesta[i].id_local+'</td>';
        tabla += '<td>'+respuesta[i].image+'</td>';
        tabla += '<td>'+respuesta[i].name+'</td>';
        tabla += '<td>'+respuesta[i].id_user_fk+'</td>';
        tabla += '<td>'+respuesta[i].id_company_fk+'</td>';
        tabla += '<td>'+respuesta[i].id_group_fk +'</td></tr>';
        if (i == (respuesta.length-1)){
            break;
        }
    }
    datos.innerHTML = tabla;

    var pag = document.getElementById("paginacion");
    var nums = '';
    for (let i = 0; i < Math.ceil(dato); i++){
        nums+= '<li><a onclick="paginado()">'+i+'</a></li>';
    }
    pag.innerHTML = nums;
    
}

