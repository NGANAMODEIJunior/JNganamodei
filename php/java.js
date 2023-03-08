function toto()
{
    // la variable MaDiv contient la balise qui a un id
    var MaDiv = document.getElementById("MaDivNum1");
    // on change le contenu se la variable
    MaDiv.innerHTML = "toto";

    // la variable JUNI contient les balise a name
     var JUNI = document.getElementsByName("lesDivs");

     //pour chaque div trouvé, on execute la fonction suivante
   JUNI.forEach(function(JUNI)
   {
    // on modifie le contenue de la  balise div pour  qu'il affiche "junior"
    JUNI.innerHTML = "junior";
   })
}

toto();