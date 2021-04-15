window.onload = function() {
    showCard();
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

function showCard() {
    var containCards = document.getElementsByClassName("swiper-wrapper")[0];
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
                if(response[i].stamp_now==response[i].stamp_max){
                    //alert('tomatelaaaa');
                    tabla +='<button onclick="generar_qr('+response[i].id_card+','+response[i].id_promotion+')">CANJEAR</button>'
                }
                tabla +='</div></div></div>';
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
function generar_qr(id_card,id_promotion){
    var random= Math.random() * (1 - 1000) + 1;
    var random2= Math.random() * (1 - 1000) + 1;
      //alert(random);

    var now = new Date();
    var year=now.getFullYear();
    var month=now.getMonth()+1;
    var day=now.getDate();
    var hour=now.getHours();
    var minute=now.getMinutes();

    document.getElementById('content').value=random+','+random2+','+id_promotion+','+id_card+','+year+','+month+','+day+','+hour+','+minute;

            $.ajax({
                url:'./generate_code.php',
                type:'POST',
                data: {formData:$("#content").val(), ecc:$("#ecc").val(), size:$("#size").val()},
                success: function(response) {
                    $(".showQRCode").html(response);
                },
             });
    modal_qr.style.display = "block";
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