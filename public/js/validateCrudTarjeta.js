//por defecto

let promo = document.getElementById("promo");
let email = document.getElementById("email");
let message1 = document.getElementById("message1");
let message2 = document.getElementById("message2");
let borderRed = "1px solid red";

message.style.color = "red";

//FUNCION GENERAL
document.getElementById("submit").addEventListener("click", () => {
    // vacio el div message de informe de errores siempre que se le da el boton de enviar los datos del form
    message1.innerHTML = "";
    message2.innerHTML = "";
    let num = 0;
    console.log(num);

        if (promo.value == "0") {
            effectForm(promo, promo.getElementsByTagName('option')[0].innerText, borderRed);
            num = 1;
            console.log(num);
        } else{
            effectFormInit(promo);
        }

        if(email.value == ""){
            effectForm(email, email.placeholder, borderRed);
            num = 1;
            console.log(num);
        }else{
            effectFormInit(email);
            if(email.value != ""){
                num = validateEmail(email.value);
            }
        }

    if(num === 0){
        registrar_tarjeta();
    }

});

const validateEmail = (value) => {

    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(value))) {

        email.style.border = borderRed;
        message2.innerHTML = `<ul class="list-group">
        <li class="list-group-item list-group-item-danger">${value} es un formato de correo electrónico incorrecto, el formato tiene que tener un @, ejemplo: nombre@gmail.com.</li>
     </ul>`;

        return 1;
    }else{
        return 0;
    }

};

const effectForm = (input, text,borderRed) => {
    input.style.border = borderRed;
	message1.innerHTML += `<ul class="list-group">
                            <li class="list-group-item list-group-item-danger">Rellena el campo ${text}</li>
                        </ul>`;
};

const effectFormInit = (input) =>{
    input.style.border = '1px solid black';
}
