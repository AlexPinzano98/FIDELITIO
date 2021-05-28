//por defecto

let fields = document.getElementsByTagName("input");
let fieldsActualizarPromos = document.getElementsByClassName("form-control");
let message1 = document.getElementById("message1");
let message2 = document.getElementById("message2");
let message3 = document.getElementById("message3");
let borderRed = "1px solid red";

message1.style.color = "red";
message2.style.color = "red";
message3.style.color = "red";

// form registro icono
document.getElementById("registerIcon").addEventListener("click", () => {
    // vacio el div message de informe de errores siempre que se le da el boton de enviar los datos del form
    message1.innerHTML = "";

    let num = 0;
    console.log(fields.length);
    for (let i = 0; i < fields.length - 20; i++) {
        console.log(fields[i]);
        if (fields[i].value == "") {
            effectFormIcon(fields[i], borderRed);
            num = 1;
            console.log(num);
        } else {
            effectFormInit(fields[i]);
        }
    }

    if (num === 0) {
        registerIcon();
    }
});
//form registro promociones
document.getElementById("submit").addEventListener("click", () => {
    message2.innerHTML = "";

    let iconsSelect = document.getElementById("iconos");
    console.log(iconsSelect.value);
    let restaurantsSelect = document.getElementById("restaurante");

    let num = 0;
    console.log(num);

    if (iconsSelect.value === "0") {
        effectForm(
            iconsSelect,
            iconsSelect.getElementsByTagName("option")[0].innerText,
            borderRed
        );
        num = 1;
        console.log(num);
    } else {
        effectFormInit(iconsSelect);
    }

    for (let i = 3; i < fields.length - 17; i++) {
        console.log(fields[i]);
        if (fields[i].value == "") {
            effectForm(fields[i], fields[i].placeholder, borderRed);
            num = 1;
            console.log(num);
        } else {
            effectFormInit(fields[i]);
        }
    }

    if (restaurantsSelect.value == "") {
        effectForm(
            restaurantsSelect,
            restaurantsSelect.getElementsByTagName("option")[0].innerText,
            borderRed
        );
        num = 1;
        console.log(num);
    } else {
        effectFormInit(restaurantsSelect);
    }

    if (num === 0) {
        registrar_promo();
    }
});

const effectFormValidateDate = () =>{
    let today = new Date();
    let dd = today.getDate();
    let mm = today.getMonth() + 1; //January is 0!
    let yyyy = today.getFullYear();
    if (dd < 10) {
        dd = "0" + dd;
    }
    if (mm < 10) {
        mm = "0" + mm;
    }
    today = `${yyyy}-${mm}-${dd}` ;
    document.getElementById("fecha").setAttribute("min", today);
    document.getElementById("fechaa").setAttribute("min", today);
 }

 effectFormValidateDate();


//form actualizar promociones

document.getElementById("submita").addEventListener("click", () => {
    message3.innerHTML = "";

    let nombrePromo = document.getElementById("nombrea");
    let premio = document.getElementById("premioa");

    let num = 0;
    console.log(num);

    if (nombrePromo.value === "") {
        effectFormIcon(nombrePromo, borderRed);
        num = 1;
        console.log(num);
    } else {
        effectFormInit(nombrePromo);
    }

    if (premio.value == "") {
        effectFormIcon(premio, borderRed);
        num = 1;
        console.log(num);
    } else {
        effectFormInit(premio);
    }

    if (num === 0) {
        actualizar_promo();
    }
});


const effectFormIcon = (input, borderRed) => {
    input.style.border = borderRed;
    message1.innerHTML = `<ul class="list-group">
                            <li class="list-group-item list-group-item-danger">Rellena los campos señalados de color rojo</li>
                        </ul>`;
    message3.innerHTML = `<ul class="list-group">
                            <li class="list-group-item list-group-item-danger">Rellena los campos señalados de color rojo</li>
                        </ul>`;
};

const effectForm = (input, text, borderRed) => {
    input.style.border = borderRed;
    message2.innerHTML += `<ul class="list-group">
                            <li class="list-group-item list-group-item-danger">Rellena el campo ${text}</li>
                        </ul>`;
};

const effectFormInit = (input) => {
    input.style.border = "1px solid black";
};
