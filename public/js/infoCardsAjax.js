window.onload = function() {
    showCard();
};

listado = 0;

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
    var containCards = document.getElementsByClassName("swiper-wrapper")[0];
    alert(listado)
    if (listado == 1) {
        document.getElementById("listLocales").style.display = 'block';
        verLocales()
    } else if (listado == 0) {
        document.getElementById("listCartas").style.display = 'block';
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

                    tabla += `</div>
                        </div>
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
            }
        };
        ajax.send();
    } else if (cartas == 1) {
        document.getElementById("listCartas").style.display = 'block';
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

            tabla += `</div>
                </div>
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
    } else {
        alert('error');
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
                console.log(respuesta)
                cartas = 1;
                showCard(respuesta)
            }

        }
    }
    ajax.send(datos);
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
//                             <img src="img/cafe.png" class="card-img-top" alt="perfil">
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