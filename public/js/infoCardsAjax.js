let containCards = document.getElementsByClassName('swiper-slide');

const showCart = () => {
    fetch("showCarts")
        .then((order) => order.text())
        .then((orderJson) => JSON.parse(orderJson))
        .then((response) => {

            for (let i = 0; i < response.length; i++) {
                containCards[i].innerHTML = "";
                containCards[i].innerHTML = `
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="img/bocadillo.png" class="card-img-top" alt="perfil">
                                                </div>
                                                <div class="card-stamp">
                                                    <h5 class="card-title">Descripción</h5>
                                                    <p class="card-text">${response[i].name}</p>
                                                    <h5 class="stamp-title">Sellos de la promoción</h5>
                                                    <div class="card-stamp_grid">
                                                        <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                                                        <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                                                        <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                                                        <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                                                        <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                                                        <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                                                        <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                                                        <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                                                        <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                                                        <img src="img/hotdog.svg" class="img-thumbnail" alt="sello">
                                                    </div>
                                                </div>
                                            </div>`;
            }

        });
};

showCart();