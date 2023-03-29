<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
</head>
<body>
    <?php "<p>coucou je suis ton premier site</p>"; 
    try{
        // connexion a la BDD, recuperation et traitement du formulaire
        $ipserver = "192.168.65.204";
        $nomBase = "premierSite";
        $loginPrivilege = "root";
        $passPrivilege = "root";
        $pdo = new PDO('msql:host='.$ipserver.';dbame='.$nomBase.'',' '.$loginPrivilege.'','  '.$passPrivilege.'');
      
    }catch (Exception $error){ 
        $error->getMessage();}
    
    if(isset($_POST['connexion']))
    {   
        //traitement formulaire
          // on va verifier  base que le login et le pass sont sont en BDD
          $requetSql="SELECT * FROM `user` WHERE `login`='".$_POST['login']."' AND `pass`='".$_POST['pass']." ";
          $resutat = $pdo->query($requetSql);// resultat sera de pe pdoStatement
          if($resutat->rowcount()>0){
              echo "on a trouver le bon login";
          }else{
              echo "le login ".$_POST['login']." rt le assword".$_POST['pass']." 'est pas bon";
          }
          
      
        }
    
    
    
    
    ?>
   

    <form action="" method="post">
        login: <input type="tex" name="login"/>
        pass: <input type="password" name="pass"/>
        <input type="submit" name="connexion"/>

    </form>
</body>
</html>