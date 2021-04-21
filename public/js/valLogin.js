function validarForm() {
    var email = document.getElementById("email").value;
    var pswd = document.getElementById("contrasenya").value;
    var errors = "";
    document.getElementById("message").style.color = "red";
    document.getElementById("message").style.width = "100%";
    document.getElementById("message").style.marginTop = "5%";
    document.getElementById("message").style.textAlign = "center";

    if (email === "") {
        errors = "-Usuario- "
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
        document.getElementById("submit").style.border = "1px solid red";
        document.getElementById("submit").style.backgroundColor = "#FFB0AE";
        errors = "Campos obligatorios: <br>" + errors;
        document.getElementById("message").innerHTML = (errors);
        return false;
    }
}