function validarForm() {
    var pass1 = document.getElementById("psswd1").value;
    var pass2 = document.getElementById("psswd2").value;
    var errors = "";
    document.getElementById("message").style.color = "red";
    document.getElementById("message").style.width = "100%";
    document.getElementById("message").style.marginBottom = "5%";
    document.getElementById("message").style.fontSize = "120%";

    if (pass1 === "") {
        errors = "Completa todos los campos"
        document.getElementById('psswd1').style.border = "1px solid red";
    }
    if (pass2 === "") {
        errors ="Completa todos los campos"
        document.getElementById('psswd2').style.border = "1px solid red";
    }
    
    if (pass1 === pass2 && errors==="") {
        //alert('contraseñas iguales')
        return true;
    }else if(errors=== "Completa todos los campos"){
        document.getElementById("submit").style.color = "red";
        document.getElementById("submit").style.backgroundColor = "#FFB0AE";
        document.getElementById("message").innerHTML = (errors);
        return false;
    }else{
        errors ="Las contraseñas no coinciden";
        document.getElementById("submit").style.color = "red";
        document.getElementById("submit").style.backgroundColor = "#FFB0AE";
        document.getElementById("message").innerHTML = (errors);
        return false;
    }
}