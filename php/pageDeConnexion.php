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
?> <?php
//---------------------------- CLASS PERSONNAGE---------------------------------------

highlight_file(__FILE__);
echo "Chargement Class Personnage";
class Personnage{
    private $id_;
    private $image_;
    private $pseudo_;
    private $vie_;
    private $forceAttaque_;
    private $tabPersoAllies_ = array();
    private $PDO_ ;
    //permet de faire la relation 1-N
    //entre un User qui peut avoir N Personnage
    private $idUser_;

    //pour faire une liason NN je rajoute un tableau d'objet
    private $tabArmes_ = array();

    public function __construct($id,$pseudo,$vie,$forceAttaque,$pdo,$image,$idUser){
        $this->id_=$id;
        $this->vie_=$vie;
        $this->pseudo_ = $pseudo;
        $this->forceAttaque_ = $forceAttaque;
        $this->PDO_ = $pdo;
        $this->image_ = $image;
        $this->idUser_ = $idUser;
    }
    public function getAllPersonnage(){
        
        $sql = "select * from Personnage";
        $reponses = $this->PDO_->query($sql);
        $TableauPersonnage = array();
        while ($donnees = $reponses->fetch())
        {
            //ORM je met les infos du tuple ( issu de la bdd)
            //dans un nouvel objet Personnage que je stock dans un tableau de PErso
            $Perso = new Personnage($donnees['id'],$donnees['pseudo'],$donnees['vie'],$donnees['forceAttaque'],$this->PDO_,$donnees['image'],$donnees['idUser']);

            //ON Stock tous les personnages dans un tableau pour l'utiliser dans notre page
            array_push($TableauPersonnage,$Perso);
        } 

        return $TableauPersonnage;
    }
    public function setAllies(){
        //ici on va récupérer ses allies.
        $sql = "select Personnage.id,Personnage.pseudo,Personnage.vie,Personnage.forceAttaque
        from Personnage,Alliance
        WHERE
        (
            Personnage.id = Alliance.idPersonnage1
            AND
            Alliance.idPersonnage2 = ".$this->id_.")
        
        OR
        (   
            Personnage.id = Alliance.idPersonnage2
            AND
            Alliance.idPersonnage1 = ".$this->id_."
        );";

        $reponses =$this->PDO_->query( $sql);
        while ($donnees = $reponses->fetch())
        {
            //ORM je met les infos du tuple ( issu de la bdd)
            //dans un nouvel objet Personnage que je stock dans un tableau de PErso
            array_push($this->tabPersoAllies_,new Personnage($donnees['id'],$donnees['pseudo'],$donnees['vie'],$donnees['forceAttaque'],$this->PDO_,''));
        } 
    }
    public function getId(){
        return $this->id_;
    }
    public function getAllies(){
        return $this->tabPersoAllies_;
    }
    public function getVie(){
        return $this->vie_;
    }
    public function getForceAttaque(){
        return $this->forceAttaque_;
    }
    public function getPseudo(){
        return $this->pseudo_;
    }
    public function getImage(){
        return $this->image_;
    }
    public function getPersonnageById($id){
        $sql = "select * from Personnage where id ='".$id."'";
        //echo $sql ;
        $reponses = $this->PDO_->query($sql);
        $donnees = $reponses->fetch();
        $this->id_ =  $donnees['id'];
        $this->image_ = $donnees['image'];
        $this->pseudo_ = $donnees['pseudo'];
        $this->vie_= $donnees['vie'];
        $this->forceAttaque_ = $donnees['forceAttaque'];

    }
    public function attaque($UnAutrePerso){
        $UnAutrePerso->defendre($this->forceAttaque_);
    }
    public function defendre($ForcedAttaque){
        $this->vie_-= $ForcedAttaque;
    }
    public function afficherPersonnage(){
        echo "je suis ".$this->pseudo_." ";
        ?>
            <div id="divPerso<?php echo $this->id_;?>">
                Attaque moi !
            </div>
        <?php
    }
    public function saveInBdd(){
        //1 cas INSERT si id = null
        if(is_null($this->id_) ){
            $sql = "INSERT INTO `Personnage` 
            (`id`, `image`, `pseudo`, `vie`, `forceAttaque`, `idUser`)
            VALUES 
            (NULL, '".$this->image_."', '".$this->pseudo_."', '".$this->vie_."', '".$this->forceAttaque_."', '".$this->idUser_."');";
            //echo $sql ;
            $reponses = $this->PDO_->query($sql);
            //attention il faut protéger son code dans un transaction pour ne pas récupére l'id dans autre visiteur
            $this->id_ = $this->PDO_->lastInsertId();
        }else{
            $sql = "UPDATE `Personnage` SET 
            `image`='".$this->image_."',
            `pseudo`='".$this->pseudo_."',
            `vie`='".$this->vie_."',
            `forceAttaque`='".$this->forceAttaque_."',
            `idUser`='".$this->idUser_."'
            WHERE
            `id` = '".$this->id_."'";
            //echo $sql ;
            $reponses = $this->PDO_->query($sql);
        }
        
       

        //2 cas UDPATE si id > 0

    }
    public function delete(){
        //1 cas INSERT si id = null
        if(!is_null($this->id_) ){
            $sql = "DELETE FROM `Personnage` 
            WHERE
            `id` = '". $this->id_."'
            ";
            //echo $sql ;
            $reponses = $this->PDO_->query($sql);
            $this->id_ = null;
        }
    }
    public function addArme($Arme){
        array_push($this->tabArmes_,$Arme);
        //faire en SQL pour saver cette en BDD
        $sql = "INSERT INTO `Equipement`
        ( `idArme`, `idPersonnage`) 
        VALUES ('".$Arme->getId()."','".$this->id_."')";
        $this->PDO_->query($sql);
        if(!$this->PDO_->lastInsertId()>0){
            echo "erreur d'inserion equipent";
        }
        
    }
    //permet d'aller chercher les Armes du perso
    public function loadArmes(){
        $sql = "SELECT * FROM `Equipement`
         WHERE `idPersonnage` = '".$this->id_."'";
        $reponses = $this->PDO_->query($sql);
        $this->tabArmes_ = array();
        while ($donnees = $reponses->fetch())
        {
            $Arme1 = new Arme($donnees['idArme'],'','','',$this->PDO_,'');
            $Arme1->getArmeById($donnees['idArme']);
            //ON Stock tous les personnages dans un tableau pour l'utiliser dans notre page
            array_push($this->tabArmes_,$Arme1);
        } 

        return $this->tabArmes_;
        
    }
    public function AfficheArmes(){
        echo "<ul>";
        foreach ($this->tabArmes_ as $TheArme) {
            echo "<li>";
            echo $TheArme->getnom();
            echo '<img width="100px" src="'.$TheArme->getImage().'" alt="'.$TheArme->getnom().'">';
            echo "</li>";
        }
        echo "</ul>";
        
    }
}
//----------------------------FIN CLASS PERSONNAGE---------------------------------------

?> Chargement Class Personnage <?php
//---------------------------- CLASS Arme---------------------------------------

highlight_file(__FILE__);

class Arme{
    private $id_;
    private $image_;
    private $nom_;
    private $vie_;
    private $forceAttaque_;
    private $tabPersoAllies_ = array();
    private $PDO_ ;
    //permet de faire la relation 1-N
    //entre un User qui peut avoir N Arme


    public function __construct($id,$nom,$vie,$forceAttaque,$pdo,$image){
        $this->id_=$id;
        $this->vie_=$vie;
        $this->nom_ = $nom;
        $this->forceAttaque_ = $forceAttaque;
        $this->PDO_ = $pdo;
        $this->image_ = $image;
       
    }
    public function getAllArme(){
        
        $sql = "select * from Arme";
        $reponses = $this->PDO_->query($sql);
        $TableauArme = array();
        while ($donnees = $reponses->fetch())
        {
            //ORM je met les infos du tuple ( issu de la bdd)
            //dans un nouvel objet Arme que je stock dans un tableau de PErso
            $Perso = new Arme($donnees['id'],$donnees['nom'],$donnees['vie'],$donnees['forceAttaque'],$this->PDO_,$donnees['image']);

            //ON Stock tous les Armes dans un tableau pour l'utiliser dans notre page
            array_push($TableauArme,$Perso);
        } 

        return $TableauArme;
    }
    
    public function getId(){
        return $this->id_;
    }
    
    public function getVie(){
        return $this->vie_;
    }
    public function getForceAttaque(){
        return $this->forceAttaque_;
    }
    public function getnom(){
        return $this->nom_;
    }
    public function getImage(){
        return $this->image_;
    }
    public function getArmeById($id){
        $sql = "select * from Arme where id ='".$id."'";
        //echo $sql ;
        $reponses = $this->PDO_->query($sql);
        $donnees = $reponses->fetch();
        $this->id_ =  $donnees['id'];
        $this->image_ = $donnees['image'];
        $this->nom_ = $donnees['nom'];
        $this->vie_= $donnees['vie'];
        $this->forceAttaque_ = $donnees['forceAttaque'];

    }
    public function attaque($UnAutrePerso){
        $UnAutrePerso->defendre($this->forceAttaque_);
    }
    public function defendre($ForcedAttaque){
        $this->vie_-= $ForcedAttaque;
    }
    public function afficherArme(){
        echo "je suis ".$this->nom_." ";
        ?>
            <div id="divPerso<?php echo $this->id_;?>">
                Attaque moi !
            </div>
        <?php
    }
    public function saveInBdd(){
        //1 cas INSERT si id = null
        if(is_null($this->id_) ){
            $sql = "INSERT INTO `Arme` 
            (`id`, `image`, `nom`, `vie`, `forceAttaque`)
            VALUES 
            (NULL, '".$this->image_."', '".$this->nom_."', '".$this->vie_."', '".$this->forceAttaque_."');";
            //echo $sql ;
            $reponses = $this->PDO_->query($sql);
            //attention il faut protéger son code dans un transaction pour ne pas récupére l'id dans autre visiteur
            $this->id_ = $this->PDO_->lastInsertId();
        }else{
            $sql = "UPDATE `Arme` SET 
            `image`='".$this->image_."',
            `nom`='".$this->nom_."',
            `vie`='".$this->vie_."',
            `forceAttaque`='".$this->forceAttaque_."',
            WHERE
            `id` = '".$this->id_."'";
            //echo $sql ;
            $reponses = $this->PDO_->query($sql);
        }
        
       

        //2 cas UDPATE si id > 0

    }
    public function delete(){
        //1 cas INSERT si id = null
        if(!is_null($this->id_) ){
            $sql = "DELETE FROM `Arme` 
            WHERE
            `id` = '". $this->id_."'
            ";
            //echo $sql ;
            $reponses = $this->PDO_->query($sql);
            $this->id_ = null;
        }
    }
}
//----------------------------FIN CLASS Arme---------------------------------------

?> <?php
session_start();
include ("Classes/User.php");
include ("Classes/Personnage.php");
include ("Classes/Arme.php");
highlight_file(__FILE__);
try {
    // ---------------Connexion à la BDD et récupération et traitement du formulaire
    $pdo = new PDO('mysql:host=192.168.65.193;dbname=Combat', 'UserWeb', 'UserWeb');
} catch (Exception  $error) {
    $error->getMessage();
}

//pour éviter les redirections vers cette page 
//je ferais un include là ou j'en ai besoin
$User1 = new User(null,$pdo);

if(isset($_POST["btnConnexion"])){
    $User1->seConnecter($_POST["login"],$_POST["mdp"]);
}
if(!$User1->isConnect()){
    ?>
    <form action="" method="post" >    
        <label for="login">login: </label>
        <input type="text" name="login" id="login" required value="Julien">

        <label for="vie">mdp: </label>
        <input type="password" name="mdp" id="mdp" required value="1234">

        <input type="submit" name="btnConnexion" value="Connect toi">
    </form>
<?php 
$User1 = null;
}else{
    $User1->getUserByID($_SESSION['idUser']);
    $User1->afficheUser();
    ?>
     <li><a href="CRUD/Personnage/CRUD_Create.php">Creer un Personnage</a></li>
    <?php
}
?>
login: mdp: 