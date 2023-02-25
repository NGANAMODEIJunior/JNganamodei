<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
      class personnage1
     {
       public $pseudo;
       public $vie;

       public function affiche_personnage1()
                   {

                    echo 'Bienvenue.';
                   }
       
       public function __construct($pseudo){
        $this->vie = 100;
        $this->pseudo= $pseudo;}
         
     }
     
   
     
   
     $personnage1= new personnage1("Julien");
     
     $personnage1->affiche_personnage1();

     echo  "<br>le personnage ".$personnage1->pseudo." a ".$personnage1->vie." vies.</br>"  ;
     
    
     
     
     ?>



















</body>
</html>