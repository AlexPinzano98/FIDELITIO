//por defecto

let inputRestaurant = document.getElementById("local");
let email = document.getElementById("email");
let message = document.getElementById("message");
let borderRed = "1px solid red";

message.style.color = "red";

//FUNCION GENERAL
document.getElementById("submit").addEventListener("click", () => {
    // vacio el div message de informe de errores siempre que se le da el boton de enviar los datos del form
    message.innerHTML = "";
    let num = 0;
    console.log(num);

        if (inputRestaurant.value == "") {
            effectForm(inputRestaurant, inputRestaurant.getElementsByTagName('option')[0].innerText, borderRed);
            num = 1;
            console.log(num);
        } else{
            effectFormInit(inputRestaurant);
        }

        if(email.value == ""){
            effectForm(email, email.placeholder, borderRed);
            num = 1;
            console.log(num);
        }else{
            effectFormInit(email);
        }

    if(num === 0){
        registrar_tarjeta();
    }

});

const effectForm = (input, text,borderRed) => {
    input.style.border = borderRed;
	message.innerHTML += `<ul class="list-group">
                            <li class="list-group-item list-group-item-danger">Rellena el campo ${text}</li>
                        </ul>`;
};

const effectFormInit = (input) =>{
    input.style.border = '1px solid black';
}
