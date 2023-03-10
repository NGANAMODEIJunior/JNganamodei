var a=3; 
var b=2;
function multiplie(X=8)
{
   return X;
}
function affiche()
{
    UN = a*multiplie();
    DEUX = b*multiplie();
    alert("le resulat de la fonction donne "+UN+);
}

var jun = document.getElementById("JUN");

    jun.addEventListener("click", affiche);
    affiche();

   