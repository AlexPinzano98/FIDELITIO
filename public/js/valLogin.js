function validarForm() {
    var email = document.getElementById("email").value;
    var pswd = document.getElementById("contrasenya").value;
    var errors = "";
    document.getElementById("message").style.color = "red";
    document.getElementById("message").style.width = "100%";
    document.getElementById("message").style.marginTop = "20%";
    document.getElementById("message").style.marginBottom = "-12%";
    document.getElementById("message").style.fontSize = "120%";

    if (email === "") {
        errors = "-Usuario-"
        document.getElementById('email').style.border = "1px solid red";
    }
    if (pswd === "") {
        errors = errors + "-Contraseña-"
        document.getElementById('contrasenya').style.border = "1px solid red";
    }
    if (email != "") {
        document.getElementById('email').style.border = "2px solid black";
    }
    if (pswd != "") {
        document.getElementById('contrasenya').style.border = "2px solid black";
    }
    if (errors === "") {
        return true;
    } else {
        document.getElementById("submit").style.color = "red";
        document.getElementById("submit").style.backgroundColor = "#FFB0AE";
        errors = "Campos obligatorios: <br>" + errors;
        document.getElementById("message").innerHTML = (errors);
        return false;
    }
}