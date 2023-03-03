<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

 <script langage = "javascript">
    
    alert("je suis un fichier");
    //chaine de caractere
    var  MAvariableString = "toto";
    // Nombre
    var MAvariableNumerique = 100;
    //des tableau
    var MAvariableTableau = ['Apple', 'Banana']
    //des objets(ici la fenetre du navigateur)
    var MAvariableObjet = window;

    alert(MAvariableString+' '+MAvariableNumerique+' '+MAvariableTableau[0]+' '+MAvariableObjet.location.pathname);

    if(window.innerwidth < 300){
        alert("la fenetre est inferieura 300 pixels de largeur");
    
    }
    window.addEventListener("resize", function(){
        if(window.innerwidth < 300){alert(" la fenetre est inferieure a 300 pixels")}
    });
 </script>




</body>
</html>
