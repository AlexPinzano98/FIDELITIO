window.onload = function() {
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
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function showCard() {
    var containCards = document.getElementsByClassName('swiper-wrapper')[0];
    var section = document.getElementById('cards');
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    ajax.open("GET", "showCard", true);
    var datasend = new FormData();
    datasend.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var response = JSON.parse(ajax.responseText);
            console.log(response);
            for (let i = 0; i < response.length; i++) {
                section.innerHTML += `
                <div class="swiper-slide">
                <div class="card">
                    <div class="card-body">
                        <img src="img/cafe.png" class="card-img-top" alt="perfil">
                    </div>
                    <div class="card-stamp">
                        <h5 class="card-title">${response[i].name}</h5>
                        <p class="card-text">${response[i].reward}</p>
                        <h5 class="stamp-title">Sellos de la promoción</h5>
                        <div class="card-stamp_grid">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                            <img src="img/coffee.svg" class="img-thumbnail" alt="sello">
                        </div>
                    </div>
                </div>
            </div>`;
            }
        }
    }
    ajax.send(datasend);
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