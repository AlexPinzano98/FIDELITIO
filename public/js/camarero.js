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
            
            //tabla +='<button style="text-aling:center;" onclick="canjear_promocion()">Canjear Promocion</button>';
            for (let i = 0; i < respuesta[0].length; i++) {
                tabla += '<div class="sketchy">';
                tabla += '<p> Promocion '+respuesta[0][i].name_promo+'</p>';
                tabla += '<p> Sellos : '+respuesta[0][i].stamp_max+'</p>';
                tabla += '</br>';

                tabla +='<button class="btn" onclick="generar_qr('+respuesta[0][i].id_promotion+','+respuesta[1][0].id_user+')">Generar QR</button>';
                tabla += '</div>';  
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

function closeModal2() {
    modal_qr.style.display = "none";
    closeModal();
}
window.onclick = function(event) {
    if (event.target == modal_qr) {
        modal_qr.style.display = "none";
    }
}

function generar_qr(id_promotion,id_camarero){
    var random= Math.random() * (1 - 1000) + 1;
    var random2= Math.random() * (1 - 1000) + 1;
      //alert(random);

    var now = new Date();
    var year=now.getFullYear();
    var month=now.getMonth()+1;
    var day=now.getDate();
    var hour=now.getHours();
    var minute=now.getMinutes();

    document.getElementById('content').value=random+'.'+random2+'.'+id_promotion+'.'+id_camarero+'.'+year+'.'+month+'.'+day+'.'+hour+'.'+minute;
    //console.log(document.getElementById('content').value)

    // return false;
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
    modal_qr.style.display = "block";
}