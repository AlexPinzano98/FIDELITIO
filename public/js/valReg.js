function validarForm() {
    var email = document.getElementById("email").value;
    var pswd = document.getElementById("contrasenya").value;
    var nombre = document.getElementById("nombre").value;
    var apellidos = document.getElementById("apellidos").value;
    var sexo = document.getElementById("sexo").value;
    var movil = document.getElementById("movil").value;
    var errors = "";
    document.getElementById("message").style.color = "red";
    document.getElementById("message").style.width = "100%";
    document.getElementById("message").style.marginTop = "5%";
    document.getElementById("message").style.textAlign = "center";

   
    if (nombre === "") {
        errors =  "Nombre- "
        document.getElementById('nombre').style.border = "1px solid red";
    }
    if (apellidos === "") {
        errors = errors + "-Apellidos- "
        document.getElementById('apellidos').style.border = "1px solid red";
    }
    if (movil === "") {
        errors = errors +"-Móvil- "
        document.getElementById('movil').style.border = "1px solid red";
    }else if(isNaN(movil)|| movil.length<=8){
        errors =errors + "-Móvil- "
        document.getElementById('movil').style.border = "1px solid red";
    }else{
        document.getElementById('movil').style.border = "2px solid black";
    }
    if (email === "") {
        errors = errors + "-Correo electrónico- "
        document.getElementById('email').style.border = "1px solid red";
    }
    if (pswd === "") {
        errors = errors + "-Contraseña- "
        document.getElementById('contrasenya').style.border = "1px solid red";
    }
    if (sexo === "") {
        errors = errors + "-Sexo- "
        document.getElementById('sexo').style.border = "1px solid red";
    }
    if (nombre != "") {
        document.getElementById('nombre').style.border = "2px solid black";
    }
    if (apellidos != "") {
        document.getElementById('apellidos').style.border = "2px solid black";
    }
    if (sexo != "") {
        document.getElementById('sexo').style.border = "2px solid black";
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
        errors = "Campos obligatorios o mal escritos: <br>" + errors;
        document.getElementById("message").innerHTML = (errors);
        return false;
    }
}