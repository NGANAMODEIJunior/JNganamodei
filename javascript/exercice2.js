function cercle()
{
    var Longueur = prompt("entrez la longueur: ");
    

var perimetre = Longueur*Math.PI;
var surface = 2*Longueur*Longueur*Math.PI;

alert("le perimetre du quadrilatere est de " +perimetre+ " m et sa surface est de "+surface+" m²");
}
var jun = document.getElementById("JUN");

    jun.addEventListener("click", cercle);
    cercle();

   
   
