window.onload = function() {
    showCard();
};
var semaforo = 0;
var listado=0;

function showCard(){
    var pagina = document.getElementById('pagina').value;
    if(pagina == "viewCliente"){
        semaforo=0;
    }else if(pagina == "viewListLocal"){
        semaforo=2;
    }
    if(listado==1){
        //mostrar cartas de un restaurante
    }else if(semaforo==2){
        //mostrar lista restaurantes
    }else{
        //mostrar todas las cartas
   }
}