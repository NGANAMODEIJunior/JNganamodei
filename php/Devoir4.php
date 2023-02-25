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
       private $pseudo;
       private $vie;

       public function affiche_personnage1()
                   {

                    echo 'Bienvenue.';
                   }

       public function __construct($pseudo){
        $this->vie = 100;
        $this->pseudo= $pseudo;}

        public function get_pseudo(){
            return $this->pseudo;
        }

        public function get_vie(){
            return $this->vie;
        }

        public function attaquer(personnage1 $cible){

           echo $this->pseudo." attaque ".$cible->get_pseudo()."<br>";

            //infliger 50 points de dégats à la cible
             $cible->defense(50);
             
            // echo $cible->get_pseudo()." a maintenant ".$cible->get_vie()." vies.<br>";

            

        }

        public function defense($valeurdattaque){

            // reduir la vie de 10 points
            $valeurdattaque -= 10;

            echo $this->pseudo." se defend contre l'attaque<br>";

            // reduire la vie du personnage de la valeur d'attaque

            $this->vie -= $valeurdattaque;

            echo $this->pseudo." a maintenant ".$this->vie." vies.<br>";
        

        }

     
      
        
         
     }
     
        // creer deux instances de personnages

      $Julien = new personnage1("Julien");
      $Langlace = new personnage1("Langlace");

    
       // Julien attaque Langlace
       $Julien->attaquer($Langlace);
        
      
    ?>

















</body>
</html>