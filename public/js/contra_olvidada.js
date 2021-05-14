function validarForm() {
    var email = document.getElementById("email").value;
    var errors = "";
    document.getElementById("message").style.color = "red";
    document.getElementById("message").style.width = "100%";
    document.getElementById("message").style.marginBottom = "5%";
    document.getElementById("message").style.fontSize = "120%";

    
    if (email === "") {
        errors ="Completa el campo"
        document.getElementById('email').style.border = "1px solid red";
    }
    
    if(errors=== "Completa el campo"){
        document.getElementById("submit").style.color = "red";
        document.getElementById("submit").style.backgroundColor = "#FFB0AE";
        document.getElementById("message").innerHTML = (errors);
        return false;
    }else{
      return true;
    }
}