<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Devoir1.css"/>
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
                
                $user = new User(); // creer un nouvel objet
                $user->nom = "NGANAMODEI";
                $user->prenom = "Junior";
                $user->afficheUser(); // Appeler la methode afficheUser
        ?>        

       <table >
           
            <th>User</th>
            <tr>
             <td><p > Nom: NGANAMODEI</p>
             <p > Prenom: Junior </p></td>
           </tr>
           <tr>
            <td> <a href = "#" onclick = "afficheUser();">+afficheUser: void</a></td>
           </tr>
       </table>
      







</body>
</html>               