window.onload = function() {
    verLocales();
};

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

function verLocales() {
    var containLocal = document.getElementById("list");
    var ajax = new objetoAjax();

    ajax.open("GET", "verLocales", true);
    // var datasend = new FormData();
    // datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var response = JSON.parse(ajax.responseText);
            console.log(response);
            tabla = '';
            for (let i = 0; i < response.length; i++) {
                tabla += `
                <div class="item">
                <div>
                    <img src="img/imgPerfilNull.png" alt="perfilRestaurant">
                </div>
                <div>
                    <h5>${response[i].name}</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto deserunt adipisci natus
                    </p>
                </div>
                <div class="play">
                    <a onclick = "verCardLocal(${response[i].id_local})">
                        <img src="img/caret-right.svg" alt="play">
                    </a>
                </div>
            </div>
              `;
            }
            containLocal.innerHTML = tabla;

        }
    }
    ajax.send();



}

function verCardLocal(id_local) {
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    ajax.open('POST', 'verCardLocal', true);
    var datos = new FormData();
    datos.append('id_local', id_local);
    datos.append('_token', token)
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);

            if (respuesta.resultado == 'NOK') {
                alert('no datos');
            } else {
                alert(ajax.responseText)
            }

        }
    }
    ajax.send(datos);
}