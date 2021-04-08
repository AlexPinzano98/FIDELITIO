window.onload = function() {
    document.getElementById('dni').addEventListener('focusout', validardni);
    document.getElementById('sexo').addEventListener('focusout', formCategoria);
    document.getElementById('edad').addEventListener('focusout', formCategoria);
}

function validacionForm() {

    var nombre = document.getElementById('nombre').value;
    var papellido = document.getElementById('papellido').value;

    if (nombre == '' && papellido == '' && sapellido == '' && email == '' && edad == '') {
        document.getElementById("message").innerHTML = "Inténtalo de nuevo.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "red";
    } else if (nombre == '' && papellido == '' && sapellido == '' && email == '') {
        document.getElementById("message").innerHTML = "Nombre, email, primer y segundo apellido del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "black";
    } else if (nombre == '' && papellido == '' && edad == '' && email == '') {
        document.getElementById("message").innerHTML = "Nombre, email, edad y primer apellido del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "red";
    } else if (nombre == '' && edad == '' && sapellido == '' && email == '') {
        document.getElementById("message").innerHTML = "Nombre, email, edad y segundo apellido del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "red";
    } else if (papellido == '' && edad == '' && sapellido == '' && email == '') {
        document.getElementById("message").innerHTML = "Edad, email, primer y segundo apellido del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "red";
    } else if (papellido == '' && edad == '' && sapellido == '' && nombre == '') {
        document.getElementById("message").innerHTML = "Nombre, edad, primer y segundo apellido del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "red";
    } else if (nombre == '' && papellido == '' && email == '') {
        document.getElementById("message").innerHTML = "Nombre, primer apellido y email del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "black";
    } else if (nombre == '' && papellido == '' && edad == '') {
        document.getElementById("message").innerHTML = "Nombre, primer apellido y edad del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "red";
    } else if (nombre == '' && papellido == '' && sapellido == '') {
        document.getElementById("message").innerHTML = "Nombre, primer y segundo apellido del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "black";
    } else if (nombre == '' && email == '' && sapellido == '') {
        document.getElementById("message").innerHTML = "Nombre, segundo apellido y email del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "black";
    } else if (nombre == '' && edad == '' && sapellido == '') {
        document.getElementById("message").innerHTML = "Nombre, segundo apellido y edad del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "red";
    } else if (nombre == '' && edad == '' && email == '') {
        document.getElementById("message").innerHTML = "Nombre, edad y email del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "red";
    } else if (papellido == '' && edad == '' && email == '') {
        document.getElementById("message").innerHTML = "Primer apellido, edad y email del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "red";
    } else if (papellido == '' && sapellido == '' && email == '') {
        document.getElementById("message").innerHTML = "Email, primer y segundo apellido del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "black";
    } else if (papellido == '' && sapellido == '' && edad == '') {
        document.getElementById("message").innerHTML = "Edad, primer y segundo apellido del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "red";
    } else if (email == '' && sapellido == '' && edad == '') {
        document.getElementById("message").innerHTML = "Edad, segundo apellido y email del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "red";
    } else if (nombre == '' && sapellido == '') {
        document.getElementById("message").innerHTML = "Nombre y segundo apellido del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "black";
    } else if (nombre == '' && papellido == '') {
        document.getElementById("message").innerHTML = "Nombre y primer apellido del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "black";
    } else if (nombre == '' && email == '') {
        document.getElementById("message").innerHTML = "Nombre y email del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "black";
    } else if (nombre == '' && edad == '') {
        document.getElementById("message").innerHTML = "Nombre y edad del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "red";
    } else if (sapellido == '' && papellido == '') {
        document.getElementById("message").innerHTML = "Primer y segundo apellido del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "black";
    } else if (sapellido == '' && email == '') {
        document.getElementById("message").innerHTML = "Segundo apellido y email del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "black";
    } else if (sapellido == '' && edad == '') {
        document.getElementById("message").innerHTML = "Segundo apellido y edad del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "red";
    } else if (email == '' && papellido == '') {
        document.getElementById("message").innerHTML = "Primer apellido y email del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "black";
    } else if (email == '' && edad == '') {
        document.getElementById("message").innerHTML = "Edad y email del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "red";
    } else if (edad == '' && papellido == '') {
        document.getElementById("message").innerHTML = "Primer apellido y edad del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "red";
    } else if (nombre == '') {
        document.getElementById("message").innerHTML = "Nombre del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "red";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "black";
    } else if (papellido == '') {
        document.getElementById("message").innerHTML = "Primer apellido del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "red";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "black";
    } else if (sapellido == '') {
        document.getElementById("message").innerHTML = "Segundo apellido del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "red";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "black";
    } else if (email == '') {
        document.getElementById("message").innerHTML = "Email del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("edad").style.borderColor = "black";
    } else if (edad == '') {
        document.getElementById("message").innerHTML = "Edad del participante.";
        document.getElementsByTagName("input")[0].style.color = "red";
        document.getElementById("nombre").style.borderColor = "black";
        document.getElementById("papellido").style.borderColor = "black";
        document.getElementById("sapellido").style.borderColor = "black";
        document.getElementById("email").style.borderColor = "black";
        document.getElementById("edad").style.borderColor = "red";
    } else {
        return true;
    }

    document.getElementById("submit").style.color = "red";
    document.getElementById("submit").style.backgroundColor = "#FFB0AE";

    return false;
}