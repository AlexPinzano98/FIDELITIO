//por defecto

let fields = document.getElementsByTagName("input");
let phone = document.getElementById('phone');
let message = document.getElementById("message");
let borderRed = "1px solid red";


document.getElementById("sub").addEventListener("submit", (e) => {
    // vacio el div message de informe de errores siempre que se le da el boton de enviar los datos del form
    message.innerHTML = "";

    for (let i = 3; i < fields.length; i++) {
        console.log(fields[i]);
        if (fields[i].value == "") {
            e.preventDefault();
            effectForm(fields[i], borderRed);
        } else {
            effectFormInit(fields[i]);
        }
    }
    if(fields[6].value != ""){
        validateEmail(fields[6].value,e);
    }
});



const validateEmail = (value,e)=>{

    if (!(/^[9|6]{1}([\d]{2}[-]*){3}[\d]{2}$/.test(value))) {

        phone.style.border = borderRed;
        message.innerHTML += `<ul class="list-group">
        <li class="list-group-item list-group-item-danger mt-4">Formato ${value} incorrecto, rellena con formato movil o telefono</li>
    </ul>`;

        e.preventDefault();
    }

};


const effectForm = (input, borderRed) => {
    console.log(input);

    input.style.border = borderRed;
    message.innerHTML = `<ul class="list-group">
    <li class="list-group-item list-group-item-danger mt-4">Rellene los campos marcados en color rojo</li>
</ul>`;

    message.style.textAlign = "center";


};

const effectFormInit = (input) => {
    input.style.border = '1px solid black';
}
