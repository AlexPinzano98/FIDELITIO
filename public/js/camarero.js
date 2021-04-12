window.onload = function() {
    ver_promociones();
    modal_qr = document.getElementById("modal");
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
    var promociones = document.getElementById("promociones");
    //var id_local=1;
    var token = document.getElementById("token").getAttribute("content");
    var ajax = new objetoAjax();
    ajax.open('POST', 'ver_promociones', true);
    var datasend = new FormData();
    //datasend.append('id_local', id_local);
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        var tabla = '';
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            tabla += '<div>';
            for (let i = 0; i < respuesta.length; i++) {
                tabla += respuesta[i].name;
                tabla += '</br>';

                tabla +='<button onclick="generar_qr('+respuesta[i].id_promotion+',&#039'+respuesta[i].name+'&#039)">Generar QR</button>';
                tabla += '</br>';  
            }
            tabla += '</div>';  
            
        }else{  
            var cont=1
        }
        if(tabla=='<div></div>'){
            tabla = '<h1>Tu restaurante no tiene promociones activas, habla con el gerente para que las cree!</h1>';  

        }

        promociones.innerHTML = tabla;
    }
    ajax.send(datasend);
}

function closeModal() {
    modal_qr.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal_qr) {
        modal_qr.style.display = "none";
    }
}


function generar_qr(id_promotion,nombre_local){
    modal_qr.style.display = "block";
    document.getElementById('content').value=id_promotion+','+nombre_local;
    // var ajax = new objetoAjax();
    // ajax.open('POST', '../generate_code.php', true);
    // var datasend = new FormData();
    // datasend.append('$', nombre_local);
    // datasend.append('ecc', "M");
    // datasend.append('size', "40");
    // datasend.append('_token', token);
    // ajax.onreadystatechange = function() {
    //     if (ajax.readyState == 4 && ajax.status == 200) {
    //         $(".showQRCode").html(response);
    //     }
    // }
    // ajax.send(datasend);
    // $(document).ready(function() {
    //     $("#codeForm").submit(function(){
        //var ruta= "asset('camarero.php')";
        // var formData = new FormData();
        // formData.append("id_promotion", id_promotion);
            $.ajax({
                url:'./generate_code.php',
                //url:ruta,
                type:'POST',
                //data: {data:formData, ecc:$("#ecc").val(), size:$("#size").val()},
                data: {formData:$("#content").val(), ecc:$("#ecc").val(), size:$("#size").val()},
                success: function(response) {
                    $(".showQRCode").html(response);  
                },
             });
    //     });
    // });
    //alert(nombre_local);
}