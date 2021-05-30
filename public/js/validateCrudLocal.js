//por defecto

let fields = document.getElementsByClassName("form-control");
let message = document.getElementById("message");
let message1 = document.getElementById("message1");
let message2 = document.getElementById("message2");
let message3 = document.getElementById("message3");
let borderRed = "1px solid red";

message.style.color = "red";

//FUNCION GENERAL
document.getElementById("submit").addEventListener("click", () => {
    // vacio el div message de informe de errores siempre que se le da el boton de enviar los datos del form

    message.innerHTML = "";
    message1.innerHTML = "";

    let num = 0;

    for (let i = 0; i < fields.length-15; i++) {
        console.log(fields[2].value);
        if (fields[i].value == "") {
            console.log(fields[i]);
            effectForm(fields[i], fields[i].placeholder, borderRed);
            num = 1;
            console.log(num);
        } else {
            effectFormInit(fields[i]);
            if(fields[2].value != ""){
                num = validateEmail(fields[2].value);
            }
        }
    }

    for (let i = 5; i < fields.length-(13); i++) {
        console.log(fields[i].getElementsByTagName('option')[0].innerText);
        console.log(fields[i].value);

        if (fields[i].value == "" || fields[i].value == "0") {

            effectForm(fields[i], fields[i].getElementsByTagName('option')[0].innerText, borderRed);
            num = 1;
            console.log(num);
        } else {
            effectFormInit(fields[i]);
        }
    }

    if(fields[6].value == "2"){
        console.log(fields[6].value);
        if(fields[7].value == "0"){
            console.log()
            effectForm(fields[7], fields[7].getElementsByTagName('option')[0].innerText, borderRed);
            num = 1;
            console.log(num);
        }else{
            effectFormInit(fields[7]);
        }
    }

    console.log(num);
    if(num === 0){
        registrar_usuario();
    }

});


document.getElementById("submita").addEventListener("click", () => {
    // vacio el div message de informe de errores siempre que se le da el boton de enviar los datos del form
    message2.innerHTML = "";
    message3.innerHTML = "";
    let num = 0;
    console.log(num);
    for (let i = 8; i < fields.length-7; i++) {
        console.log(fields[i]);
        if (fields[i].value == "") {
            effectForm(fields[i], fields[i].placeholder, borderRed);
            num = 1;
            console.log(num);
        } else {
            effectFormInit(fields[i]);
            console.log(fields[10]);
            if(fields[10].value != ""){
                num = validateEmail(fields[10].value);
            }
        }
    }

    if(num === 0){
        actualizar_usuario();
    }

});

const validateEmail = (value) => {

    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(value))) {

        console.log(document.getElementById("email"));
        document.getElementById("email").style.border = borderRed;
        document.getElementById("emaila").style.border = borderRed;
        console.log(`La dirección de email ${value} es incorrecta.`);
        let alert =  `<ul class="list-group">
        <li class="list-group-item list-group-item-danger">${value} es un formato de correo electrónico incorrecto, el formato tiene que tener un @, ejemplo: nombre@gmail.com.</li>
     </ul>`;
        message1.innerHTML = alert;
        message3.innerHTML = alert;
        return 1;
    }else{
        return 0;
    }

};

const effectForm = (input, text,borderRed) => {
    console.log(input);
    console.log(text);
    input.style.border = borderRed;
    let alert =  `<ul class="list-group">
    <li class="list-group-item list-group-item-danger">Rellena el campo ${text}</li>
</ul>`;
    console.log(alert);
	message.innerHTML += alert;
	message2.innerHTML += alert;
};

const effectFormInit = (input) =>{
    input.style.border = '1px solid black';
}
