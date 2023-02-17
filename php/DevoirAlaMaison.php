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

            class User
           {
                 public $nom;
                 public $prenom;

                  public function afficheUser()
                   {

                       echo "Je suis un user.";
                   }
            }
        ?>

      <?php
                require 'User.php'; // importer la classe User

                $user = new User(); // creer un nouvel objet
                $user->nom = "NGANAMODEI";
                $user->prenom = "Junior";
                $user->afficheUser(); // Appeler la methode afficheUser
        ?>        

       <table>
           <tr>
            <th>User</th>
           </tr>
           <tr>
             <br class = "nom">Nom: </br>
             <br class = "prenom">Prenom: </br>
           </tr>
           <tr>
             <a href = "#" onclick = "afficheUser();">+afficheUser: void</a>
           </tr>
       </table>
      <script>
        function afficheUser(){
            alert("je suis un user.");
        }
     </script>


</body>
</html>               