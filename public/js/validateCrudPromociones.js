//por defecto

let fields = document.getElementsByTagName("input");
let message1 = document.getElementById("message1");
let message2 = document.getElementById("message2");
let message3 = document.getElementById("message3");
let borderRed = "1px solid red";

message1.style.color = "red";
message2.style.color = "red";
message3.style.color = "red";

//FUNCION GENERAL
document.getElementById("registerIcon").addEventListener("click", () => {
    // vacio el div message de informe de errores siempre que se le da el boton de enviar los datos del form
    message1.innerHTML = "";
    message2.innerHTML = "";
    message3.innerHTML = "";

    let num = 0;
    console.log(fields.length);
    for (let i = 0; i < fields.length-20; i++) {
        console.log(fields[i]);
        if (fields[i].value == "") {
            effectFormIcon(fields[i], borderRed);
            num = 1;
            console.log(num);
        } else {
            effectFormInit(fields[i]);
        }
    }

    // for (let i = 5; i < fields.length-13; i++) {
    //     console.log(fields[i].getElementsByTagName('option')[0].innerText);

    //     if (fields[i].value == "") {

    //         effectForm(fields[i], fields[i].getElementsByTagName('option')[0].innerText, borderRed);
    //         num ++;
    //         console.log(num);
    //     } else {
    //         effectFormInit(fields[i]);
    //     }
    // }
    if(num === 0){
        registerIcon();
    }

});

// document.getElementById("submita").addEventListener("click", () => {

//     message.innerHTML = "";
//     message2.innerHTML = "";
//     let num = 0;
//     console.log(num);
//     for (let i = 8; i < fields.length-7; i++) {
//         console.log(fields[i]);
//         if (fields[i].value == "") {
//             effectForm(fields[i], fields[i].placeholder, borderRed);
//             num ++;
//             console.log(num);
//         } else {
//             effectFormInit(fields[i]);
//         }
//     }

//     if(num === 0){
//         actualizar_usuario();
//     }

// });


const effectFormIcon = (input,borderRed) => {
    input.style.border = borderRed;
	message1.innerHTML = `<ul class="list-group">
                            <li class="list-group-item list-group-item-danger">Rellena los campos señalados de color rojo</li>
                        </ul>`;

};

// const effectForm = (input, text,borderRed) => {
//     input.style.border = borderRed;
// 	message.innerHTML += `<ul class="list-group">
//                             <li class="list-group-item list-group-item-danger">Rellena el campo ${text}</li>
//                         </ul>`;
// 	message2.innerHTML += `<ul class="list-group">
//                             <li class="list-group-item list-group-item-danger">Rellena el campo ${text}</li>
//                         </ul>`;
// };

const effectFormInit = (input) =>{
    input.style.border = '1px solid black';
}
