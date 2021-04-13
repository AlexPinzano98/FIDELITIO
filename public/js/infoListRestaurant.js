window.onload = function() {
    showRestaurant();
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

function showRestaurant() {
    var containRestaurant = document.getElementById("list");
    var ajax = new objetoAjax();

    ajax.open("GET", "recogerCard", true);
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
                    <h5>Restaurante 1</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto deserunt adipisci natus
                    </p>
                </div>
                <div class="play">
                    <a href="">
                        <img src="img/caret-right.svg" alt="play">
                    </a>
                </div>
            </div>
              `;
            }
            containRestaurant.innerHTML = tabla;

        }
    };
    ajax.send();
}
