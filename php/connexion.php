<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="tennis.css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
function loginForm($login, $password)
{
    if($_SERVER['REQUEST_METHOD'] =='POST'){
       if(isset($_POST['login']) && $_POST['login'] == $login){ return 'ok';}
        if(isset($_POST['password']) && $_POST['password'] == $password){ return 'ok';}
   else
    {
        echo '<p><b>Mot de passe  ou nom utilisateur incorrect...</b><p>';
    }
}

echo '<form method="post"> utilisateur: <input type="login" name="login"/> 
Mot de passe: <input type="password" name="password" />
<input type= "submit" value="Se connecter"/></form>';
}
$login = 'Admin';
$password ='root';
if(loginForm($login, $password)=='ok'){
    echo ' <p><b>Vous etes connecté en tant que Administrateur </b>
   
     
    <a href="http://192.168.65.204/junior/php/tennis.php"> programmer </a>' ;

}?>

</body>
</html>
