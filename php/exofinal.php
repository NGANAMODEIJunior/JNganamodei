<?php
function loginForm($password)
{
    if($_SERVER['REQUEST_METHOD'] =='POST'){
       if(isset($_POST['password']) && $_POST['password'] == $password){ return 'ok';
    }
    else
    {
        echo 'Mot de passe incorrect...';
    }
}

echo '<form method="post">Mot de passe: <input type="password" name="password" /> 
<input type= "submit" value="Se connecter"/></form>';
}
$password ='root';
if(loginForm($password)=='ok'){
    echo 'mot de passe correct.. <a
    href="https://wwww.youtube.com/watch?v=h-guAoE19E8&ab_channel=MonsieurRapidecho"> Lien secret!</a>';

}?>

