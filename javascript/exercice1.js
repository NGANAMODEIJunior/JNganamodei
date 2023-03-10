function quadrilatere()
{
    var Longueur = prompt("entrez la longueur: ");
    var Largeur = prompt("entrez la largeur: ")

var perimetre = Longueur*2 + Largeur*2;
var surface = Longueur*Largeur;

alert("le perimetre du quadrilatere est de " +perimetre+ " m et sa surface est de "+surface+" m²");
}
var jun = document.getElementById("JUN");

    jun.addEventListener("click", quadrilatere);
    quadrilatere();

   
   
