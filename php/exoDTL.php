<?php
//---------------------------- CLASS Client dev by langlacé---------------------------------------

highlight_file(__FILE__);

class Client{

        private $nom_;
        private $pdo_;
        private $id_=null;

        public function __construct($nom,$pdo){
            $this->nom_ = $nom;
            $this->pdo_ = $pdo;

        }

        //permet de creer un nouvaeu client si id = null
        public function saveTooBdd(){
            echo "save de l'objet nom = ".$this->nom_;
            $sql = "INSERT INTO Client (Nom)
                    VALUE ('".$this->nom_."')
            ";
            $this->pdo_->query($sql);
        }
}
<?php include ("Classes/Client.php"); 
highlight_file(__FILE__);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Exo1</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <h1>Test Client</h1>
   
    <?php
    try {
        // ---------------Connexion à la BDD et récupération et traitement du formulaire
        $pdo = new PDO('mysql:host=192.168.65.193;dbname=Combat', 'UserWeb', 'UserWeb');
        
        if(isset($_POST['ajouterClient'])){
            $Client1 = new Client($_POST['nom'],$pdo);
            $Client1->saveTooBdd();
    

        }
       

    } catch (Exception  $error) {
        $error->getMessage();
    }
    


    ?>
    <form action="" method="POST">
        nom : <input type="text" name="nom">
        <input type="submit" name="ajouterClient">
    </form>
    
    <script type="text/javascript" src="javascript.js"></script>
    
</body>
</html>
Test Client
nom :
