window.onload = function() {
    showCard();
    modal_qr = document.getElementById("modal");
};
mySwiper = "";
listado = 0;
cartas = 0;
//
function controladores(num) {
    listado = num;
    showCard();
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

function showCard(recojoData) {
    filtroActivo = document.getElementById("soloactivas").checked;
    document.getElementById("camara").style.color = "white";
    cardLocal = recojoData;
    //alert(listado)
    var containCards = document.getElementsByClassName("swiper-wrapper")[0];
    if (listado == 1 && cartas == 0) {
        document.getElementById("listCartas").style.display = "none";
        document.getElementById("checkboxFiltro").style.display = "none";
        document.getElementById("listLocales").style.display = "block";
        verLocales();
    } else if (listado == 0) {
        document.getElementById("listLocales").style.display = "none";
        document.getElementById("checkboxFiltro").style.display = "block";
        document.getElementById("listCartas").style.display = "block";
        // var section = document.getElementById('cards');
        var ajax = new objetoAjax();
        // var token = document.getElementById('token').getAttribute('content');
        ajax.open("GET", "showCard", true);
        // var datasend = new FormData();
        // datasend.append('_token', token);
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                var response = JSON.parse(ajax.responseText);
                console.log(response);
                tabla0 = "";
                if (filtroActivo == true) {
                    for (let i = 0; i < response.length; i++) {
                        if (response[i].status == "open") {
                            tabla0 += `
                            <div class="swiper-slide">
                            <div class="card">
                            <div class="card-body">
                                <img src="img/restaurantes/` + response[i].image + `" class="card-img-top" alt="perfil">
                            </div>
                            <div class="card-stamp">
                            <h5 class="card-title">${response[i].name_promo}</h5>
                            <h5 class="card-title">${response[i].name}</h5>
                            <p class="card-text">Premio: ${response[i].reward}</p>
                            <h5 class="stamp-title">Sellos de la promoción: ${response[i].stamp_now} / ${response[i].stamp_max}</h5>
                            <div class="card-stamp_grid">`;

                            for (var x = 0; x < response[i].stamp_now; x++) {
                                tabla0 += `<img src="img/iconos/` + response[i].on + `" class="img-thumbnail" alt="sello">`;
                            }

                            for (
                                var x = 0; x < response[i].stamp_max - response[i].stamp_now; x++
                            ) {
                                tabla0 += `<img src="img/iconos/` + response[i].off + `" class="img-thumbnail" alt="sello">`;
                            }
                            tabla0 += "</div>";
                            tabla0 += "</div></div></div>"
                            containCards.innerHTML = tabla0;
                        }
                    }
                } else {
                    for (let i = 0; i < response.length; i++) {
                        tabla0 += `
                    <div class="swiper-slide">`;
                        if ((response[i].status == "open") && (response[i].status_card == "Activado")) {
                            tabla0 += `<div class="card">
                        <div class="card-body">
                            <img src="img/restaurantes/` + response[i].image + `" class="card-img-top" alt="perfil">
                        </div>
                        <div class="card-stamp">
                            <h5 class="card-title">${response[i].name_promo}</h5>
                            <h5 class="card-title">${response[i].name}</h5>
                            <p class="card-text">Premio: ${response[i].reward}</p>
                            <h5 class="stamp-title">Sellos de la promoción: ${response[i].stamp_now} / ${response[i].stamp_max}</h5>
                            <div class="card-stamp_grid">`;

                            for (var x = 0; x < response[i].stamp_now; x++) {
                                tabla0 += `<img src="img/iconos/` + response[i].on + `" class="img-thumbnail" alt="sello">`;
                            }

                            for (
                                var x = 0; x < response[i].stamp_max - response[i].stamp_now; x++
                            ) {
                                tabla0 += `<img src="img/iconos/` + response[i].off + `" class="img-thumbnail" alt="sello">`;
                            }
                            tabla0 += "</div>";
                            if (response[i].stamp_now == response[i].stamp_max) {
                                tabla0 += '<div class="Cbutton">';
                                tabla0 +=
                                    '<button class="button" onclick="generar_qr(' +
                                    response[i].id_card +
                                    "," +
                                    response[i].id_promotion +
                                    ')">CANJEAR</button>';
                                tabla0 += "</div>";
                            }
                            tabla0 += "</div></div>";
                        } else if ((response[i].status == "close") && (response[i].status_card == "Canjeado")) {
                            tabla0 += `<div class="cardclose">
                            <img src="img/complete.png" class="completeIMG">
                            <div class="card-body">
                                <img src="img/restaurantes/` + response[i].image + `" class="card-img-top" alt="perfil">
                            </div>
                            <div class="card-stamp">
                            <h5 class="card-title">${response[i].name_promo}</h5>
                            <h5 class="card-title">${response[i].name}</h5>
                            <p class="card-text">Premio: ${response[i].reward}</p>
                            <h5 class="stamp-title">Sellos de la promoción: ${response[i].stamp_now} / ${response[i].stamp_max}</h5>
                            <div class="card-stamp_grid">`;

                            for (var x = 0; x < response[i].stamp_now; x++) {
                                tabla0 += `<img src="img/iconos/` + response[i].on + `" class="img-thumbnail" alt="sello">`;
                            }
                            for (
                                var x = 0; x < response[i].stamp_max - response[i].stamp_now; x++
                            ) {
                                tabla0 += `<img src="img/iconos/` + response[i].off + `" class="img-thumbnail" alt="sello">`;
                            }
                            tabla0 += "</div>";
                            tabla0 += "</div></div>";
                        } else if ((response[i].status == "close") && (response[i].status_card == "Caducado")) {
                            tabla0 += `<div class="cardclose">
                            <img src="img/expired.png" class="completeIMG">
                            <div class="card-body">
                                <img src="img/restaurantes/` + response[i].image + `" class="card-img-top" alt="perfil">
                            </div>
                            <div class="card-stamp">
                                <h5 class="card-title">${response[i].name_promo}</h5>
                                <h5 class="card-title">${response[i].name}</h5>
                                <p class="card-text">Premio: ${response[i].reward}</p>
                                <h5 class="stamp-title">Sellos de la promoción: ${response[i].stamp_now} / ${response[i].stamp_max}</h5>
                                <div class="card-stamp_grid">`;

                            for (var x = 0; x < response[i].stamp_now; x++) {
                                tabla0 += `<img src="img/iconos/` + response[i].on + `" class="img-thumbnail" alt="sello">`;
                            }

                            for (
                                var x = 0; x < response[i].stamp_max - response[i].stamp_now; x++
                            ) {
                                tabla0 += `<img src="img/iconos/` + response[i].off + `" class="img-thumbnail" alt="sello">`;
                            }
                            tabla0 += "</div>";
                            tabla0 += "</div></div>";
                        } else {
                            console.log("error");
                        }

                        //DIV QUE CIERRA EL SWIPER
                        tabla0 += "</div>";
                        containCards.innerHTML = tabla0;
                    }
                }
            }
        };
        ajax.send();
    } else if (cartas == 1) {
        cartas = 0;
        tabla1 = "";
        document.getElementById("listLocales").style.display = "none";
        document.getElementById("checkboxFiltro").style.display = "none";
        document.getElementById("listCartas").style.display = "block";
        for (let i = 0; i < cardLocal.length; i++) {
            tabla1 += `
      <div class="swiper-slide">
            <div class="card">
                <div class="card-body">
                    <img src="img/restaurantes/` + response[i].image + `" class="card-img-top" alt="perfil">
                </div>
                <div class="card-stamp">
                    <h5 class="card-title">${cardLocal[i].name_promo}</h5>
                    <h5 class="card-title">${cardLocal[i].name}</h5>
                    <p class="card-text">Premio: ${cardLocal[i].reward}</p>
                    <h5 class="stamp-title">Sellos de la promoción: ${cardLocal[i].stamp_now} / ${cardLocal[i].stamp_max}</h5>
                    <div class="card-stamp_grid">`;

            for (var x = 0; x < cardLocal[i].stamp_now; x++) {
                tabla1 += `<img src="img/iconos/` + response[i].image + `" class="img-thumbnail" alt="sello">`;
            }

            for (
                var x = 0; x < cardLocal[i].stamp_max - cardLocal[i].stamp_now; x++
            ) {
                tabla1 += `<img src="img/iconos/` + response[i].off + `" class="img-thumbnail" alt="sello">`;
            }
            tabla1 += "</div>";
            if (cardLocal[i].stamp_now == cardLocal[i].stamp_max) {
                //alert('tomatelaaaa');
                tabla1 += '<div class="Cbutton">';
                tabla1 += '<button class="button" onclick="generar_qr(' + cardLocal[i].id_card + ',' + cardLocal[i].id_promotion + ')"> CANJEAR </button>'
                tabla1 += '</div>';
            }
            tabla1 += "</div></div></div>";
            containCards.innerHTML = tabla1;
        }
    } else {
        alert("error");
    }

    console.log(mySwiper);

    if (mySwiper == "") {
        mySwiper = new Swiper(".swiper-container", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            observer: true,
            observeParents: true,
            onSlideChangeEnd: function(swiper) {
                swiper.update();
                mySwiper.startAutoplay();
                mySwiper.reLoop();
                swiper.pagination.init();
                swiper.pagination.render();
            },
        });
    }
}

function verLocales() {
    var containLocal = document.getElementById("listLocal");
    document.getElementById("camara").style.color = "#58D68D";
    var ajax = new objetoAjax();

    ajax.open("GET", "verLocales", true);
    // var datasend = new FormData();
    // datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var response = JSON.parse(ajax.responseText);
            console.log(response);
            tabla2 = "";
            for (let i = 0; i < response.length; i++) {
                tabla2 += `
                <div class="item">
                <div id="tmI">
                    <img src="img/restaurantes/` + response[i].image + `" alt="perfilRestaurant">
                </div>
                <div id="tmT">
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
            containLocal.innerHTML = tabla2;
        }
    };
    ajax.send();
}

function verCardLocal(id_local) {
    var ajax = new objetoAjax();
    var token = document.getElementById("token").getAttribute("content");
    ajax.open("POST", "verCardLocal", true);
    var datos = new FormData();
    datos.append("id_local", id_local);
    datos.append("_token", token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);

            if (respuesta.resultado == "NOK") {
                console.log("no datos");
            } else {
                console.log(respuesta);
                cartas = 1;
                showCard(respuesta);
            }
        }
    };
    ajax.send(datos);
}

function closeModal2() {
    modal_qr.style.display = "none";
    closeModal();
}
// window.onclick = function(event) {
//     if (event.target == modal_qr) {
//         modal_qr.style.display = "none";
//     }
// }
function generar_qr(id_card, id_promotion) {
    var random = Math.random() * (1 - 1000) + 1;
    var random2 = Math.random() * (1 - 1000) + 1;
    //alert(random);

    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var day = now.getDate();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var seconds = now.getSeconds() + 45;

    document.getElementById("content").value =
        random +
        "," +
        random2 +
        "," +
        id_promotion +
        "," +
        id_card +
        "," +
        year +
        "," +
        month +
        "," +
        day +
        "," +
        hour +
        "," +
        minute +
        ',' +
        seconds;

    $.ajax({
        url: "./generate_code.php",
        type: "POST",
        data: {
            formData: $("#content").val(),
            ecc: $("#ecc").val(),
            size: $("#size").val(),
        },
        success: function(response) {
            $(".showQRCode").html(response);
        },
    });
    modal_qr.style.display = "block";
    //setTimeout(() => {  alert("World!"); }, 2000);
}
// const showCart = () => {
//     fetch("showCarts")
//         .then((order) => order.text())
//         .then((orderJson) => JSON.parse(orderJson))
//         .then((response) => {

//                 for (let i = 0; i < response.length; i++) {
//                     containCards[i].innerHTML = "";
//                     containCards[i].innerHTML = `
//                     <div class="swiper-slide">
//                     <div class="card">
//                         <div class="card-body">
//                             <img src="img/restaurantes/`+ response[i].image + `" class="card-img-top" alt="perfil">
//                         </div>
//                         <div class="card-stamp">
//                             <h5 class="card-title">Descripción</h5>
//                             <p class="card-text">promoción café</p>
//                             <h5 class="stamp-title">Sellos de la promoción</h5>
//                             <div class="card-stamp_grid">
//                                 <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
//                                 <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
//                                 <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
//                                 <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
//                                 <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
//                                 <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
//                                 <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
//                                 <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
//                                 <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
//                                 <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
//                             </div>
//                         </div>
//                     </div>
//                 </div>`;
//                 }

//         });
// };