window.onload = function() {
    showCard();
    modal_qr = document.getElementById("modal");
};

var semaforo;
var listado;

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
    cardLocal = recojoData;
    var pagina = document.getElementById('pagina').value;
    var containCards = document.getElementsByClassName("swiper-wrapper")[0];
    if (pagina == "viewCliente") {
        semaforo = 0;
    } else if (pagina == "viewListLocal") {
        semaforo = 1;
    }
    if (listado == 1) {
        //mostrar cartas de un restaurante
        //window.location.href = "./viewCliente";
        var containCards = document.getElementsByClassName("swiper-wrapper")[0];
        alert(cardLocal);
        tabla = '';
        for (let i = 0; i < cardLocal.length; i++) {
            tabla += `
              <div class="swiper-slide">
                    <div class="card">
                        <div class="card-body">
                            <img src="img/cafe.png" class="card-img-top" alt="perfil">
                        </div>
                        <div class="card-stamp">
                            <h5 class="card-title">${cardLocal[i].name_promo}</h5>
                            <h5 class="card-title">${cardLocal[i].name}</h5>
                            <p class="card-text">Premio: ${cardLocal[i].reward}</p>
                            <h5 class="stamp-title">Sellos de la promoción: ${cardLocal[i].stamp_now} / ${cardLocal[i].stamp_max}</h5>
                            <div class="card-stamp_grid">`;


            for (var x = 0; x < cardLocal[i].stamp_now; x++) {
                tabla += `<img src="img/onstamp.svg" class="img-thumbnail" alt="sello">`;
            }

            for (var x = 0; x < cardLocal[i].stamp_max - cardLocal[i].stamp_now; x++) {
                tabla += `<img src="img/offstamp.svg" class="img-thumbnail" alt="sello">`;
            }

            tabla += `</div>`;
            if(cardLocal[i].stamp_max == cardLocal[i].stamp_now){
                tabla+='<button onclick="generar_qr('+cardLocal[i].id_card+','+cardLocal[i].id_promotion+')"></button>'
            }
           
            tabla += `          </div>
                    </div>
                </div>`;
            containCards.innerHTML = tabla;
        }
        var mySwiper = new Swiper(".swiper-container", {

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
            },
        });
        // mySwiper.lazy.loadInSlide (index);
        mySwiper.on('slideChange', function() {
            if (this.activeIndex === 1) {
                console.log("IM ON SECOND SLIDE!");
            }
        });
    } else if (semaforo == 1) {
        verLocales();
    } else {
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
                tabla = '';
                for (let i = 0; i < response.length; i++) {
                    tabla += `
              <div class="swiper-slide">
                    <div class="card">
                        <div class="card-body">
                            <img src="img/cafe.png" class="card-img-top" alt="perfil">
                        </div>
                        <div class="card-stamp">
                            <h5 class="card-title">${response[i].name_promo}</h5>
                            <h5 class="card-title">${response[i].name}</h5>
                            <p class="card-text">Premio: ${response[i].reward}</p>
                            <h5 class="stamp-title">Sellos de la promoción: ${response[i].stamp_now} / ${response[i].stamp_max}</h5>
                            <div class="card-stamp_grid">`;


                    for (var x = 0; x < response[i].stamp_now; x++) {
                        tabla += `<img src="img/onstamp.svg" class="img-thumbnail" alt="sello">`;
                    }

                    for (var x = 0; x < response[i].stamp_max - response[i].stamp_now; x++) {
                        tabla += `<img src="img/offstamp.svg" class="img-thumbnail" alt="sello">`;
                    }
                    tabla += '</div>';
                if (response[i].stamp_now == response[i].stamp_max) {
                    //alert('tomatelaaaa');
                    tabla += '<button onclick="generar_qr(' + response[i].id_card + ',' + response[i].id_promotion + ')">CANJEAR</button>'
                }
                tabla += '</div></div></div>';
                containCards.innerHTML = tabla;
                }
                var mySwiper = new Swiper(".swiper-container", {

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
                    },
                });
                // mySwiper.lazy.loadInSlide (index);
                mySwiper.on('slideChange', function() {
                    if (this.activeIndex === 1) {
                        console.log("IM ON SECOND SLIDE!");
                    }
                });
            }
        };
        ajax.send();
    }
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
                console.log('no datos');
            } else {
                listado = 1;
                console.log(respuesta)
                showCard(respuesta)
            }

        }
    }
    ajax.send(datos);
}
function closeModal() {
    modal_qr.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal_qr) {
        modal_qr.style.display = "none";
    }
}
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

    document.getElementById('content').value = random + ',' + random2 + ',' + id_promotion + ',' + id_card + ',' + year + ',' + month + ',' + day + ',' + hour + ',' + minute;

    $.ajax({
        url: './generate_code.php',
        type: 'POST',
        data: { formData: $("#content").val(), ecc: $("#ecc").val(), size: $("#size").val() },
        success: function(response) {
            $(".showQRCode").html(response);
        },
    });
    modal_qr.style.display = "block";
}