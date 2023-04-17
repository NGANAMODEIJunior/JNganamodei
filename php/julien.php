
ù
Chargement Class User ﻿
<?php
echo "Chargement Class User";
class User{

    //Propriété (Private )
    //Membres
    private $id_;
    private $login_;
    private $pdo_;

    //Méthode ( Public )
    public function __construct($id,$pdo){
        $this->id_ = $id;
        $this->pdo_ = $pdo;

    }
    public function getNom(){
        return $this->login_;
    }
       public function getId(){
        return $this->id_;
    }
    public function seConnecter($Login,$pass){
        
        $sql = "SELECT * FROM `User` 
        WHERE `login` = '".$Login."' 
        AND `mdp` ='".$pass."'
        ";
        $resultat = $this->pdo_->query($sql);
        if ($tab = $resultat->fetch()){
            $this->login_ = $tab['login'];
            $this->id_ = $tab['id'];
            // si j'ai un resultat je suis connecté
            // je sauvegarde cela en session
            $_SESSION['idUser']=$tab['id'];
            return true;
        }else{
            session_unset();
            session_destroy();
            return false;
        }

    }
    public function getUserById($id){
        $sql = "SELECT * FROM `User` 
        WHERE `id` = '".$id."'";
        $resultat = $this->pdo_->query($sql);
        if ($tab = $resultat->fetch()){
            $this->login_ = $tab['login'];
            $this->id_ = $tab['id'];
        }
    }
    public function isConnect(){
        if( isset( $_SESSION['idUser'])){
            $sql = "SELECT * FROM `User` 
            WHERE `id` = '".$_SESSION['idUser']."'";
            $resultat = $this->pdo_->query($sql);
            if ($tab = $resultat->fetch()){
                $this->login_ = $tab['login'];
                $this->id_ = $tab['id'];
                return true;
            }
        }else{
            return false;
        }
    }


    //methode de l'exo1 qui affiche un echo
    public function afficheUser(){
        echo "je Suis le User ".$this->login_;
        ?>
        <?php
    }
}
highlight_file(__FILE__);
?>
Menu Exo

    ExoJS
    TestAPI
    CRUD Objet Read Personnage
    CRUD Objet Create Personnage
    CRUD Objet Update Personnage
    CRUD Objet Delete Personnage
    Exo DTL
    Page De Connexion

﻿<?php include ("Classes/User.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    
<?php echo "<h1>Menu Exo</h1>"; ?>
<ul>    
   
    <li><a href="ExoJS.php">ExoJS</a></li>
    <li><a href="testAPI.php">TestAPI</a></li>
    
    <li><a href="CRUD/Personnage/CRUD_Read.php">CRUD Objet Read Personnage</a></li>
    <li><a href="CRUD/Personnage/CRUD_Create.php">CRUD Objet Create Personnage</a></li>
    <li><a href="CRUD/Personnage/CRUD_Update.php">CRUD Objet Update Personnage</a></li>
    <li><a href="CRUD/Personnage/CRUD_Delete.php">CRUD Objet Delete Personnage</a></li>
    <li><a href="exoDTL.php">Exo DTL</a></li>
    <li><a href="Connexion.php">Page De Connexion</a></li>
   
</ul>


        <?php
        highlight_file(__FILE__);
        ?>
  
</body>
</html>
