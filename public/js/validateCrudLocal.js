//por defecto

let fields = document.getElementsByClassName("form-control");
let message = document.getElementById("message");
let message2 = document.getElementById("message2");
let borderRed = "1px solid red";

message.style.color = "red";

//FUNCION GENERAL
document.getElementById("submit").addEventListener("click", () => {
    // vacio el div message de informe de errores siempre que se le da el boton de enviar los datos del form

    message.innerHTML = "";
    message2.innerHTML = "";
    let num = 0;
    console.log(num);
    for (let i = 0; i < fields.length-15; i++) {
        console.log(fields[i]);
        if (fields[i].value == "") {
            effectForm(fields[i], fields[i].placeholder, borderRed);
            num ++;
            console.log(num);
        } else {
            effectFormInit(fields[i]);

        }
    }

    for (let i = 5; i < fields.length-13; i++) {
        console.log(fields[i].getElementsByTagName('option')[0].innerText);

        if (fields[i].value == "") {

            effectForm(fields[i], fields[i].getElementsByTagName('option')[0].innerText, borderRed);
            num ++;
            console.log(num);
        } else {
            effectFormInit(fields[i]);
        }
    }
    if(num === 0){
        registrar_usuario();
    }

});

document.getElementById("submita").addEventListener("click", () => {
    // vacio el div message de informe de errores siempre que se le da el boton de enviar los datos del form
    message.innerHTML = "";
    message2.innerHTML = "";
    let num = 0;
    console.log(num);
    for (let i = 8; i < fields.length-7; i++) {
        console.log(fields[i]);
        if (fields[i].value == "") {
            effectForm(fields[i], fields[i].placeholder, borderRed);
            num ++;
            console.log(num);
        } else {
            effectFormInit(fields[i]);
        }
    }

    if(num === 0){
        actualizar_usuario();
    }

});

const effectForm = (input, text,borderRed) => {
    input.style.border = borderRed;
	message.innerHTML += `<ul class="list-group">
                            <li class="list-group-item list-group-item-danger">Rellena el campo ${text}</li>
                        </ul>`;
	message2.innerHTML += `<ul class="list-group">
                            <li class="list-group-item list-group-item-danger">Rellena el campo ${text}</li>
                        </ul>`;
};

const effectFormInit = (input) =>{
    input.style.border = '1px solid black';
}
