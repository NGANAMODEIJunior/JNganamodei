<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>BASE DE DONNEE</title>
</head>

<body>
    <div class="fond">
        <?php



        try {

            $ipserver = "192.168.65.204";
            $nomBase = "Match_de_tennis";
            $loginPrivilege = "root";
            $passPrivilege = "root";


            $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);

            $requete = "select * from Joueurs";
            $resultat = $GLOBALS["pdo"]->query($requete);

            //resultat est du coup un objet de type PDOStatement
            $tabJoueurs = $resultat->fetchALL();
            if (isset($_POST["saisiMatch"])) {

                $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);


                $Joueur1 = $_POST['idJoueur1'];
                $Joueur2 = $_POST['idJoueur2'];
                $DateHeure = $_POST['datetime'];
                $requete1 = "INSERT INTO `Match`(`DateHeure`, `idJoueur1`, `idJoueur2`) VALUES ('" . $DateHeure . "','" . $Joueur1 . "','" . $Joueur2 . "')";
                echo $requete1;
                $resultat = $GLOBALS["pdo"]->query($requete1);
                if ($GLOBALS["pdo"]->lastInsertId() > 0) {
                    echo "nouveau match enregistré";
                } else {
                    echo "Ce joueur semble avoir un match déjà";
                }
            
              
          
        }

        ?>

          <?php
            $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);

            $requete2 ="SELECT `id`, `DateHeure`, `idJoueur1`, `idJoueur2` FROM `Match`";
            echo $requete2;
            $resultat = $GLOBALS["pdo"]->query($requete2);
           
            foreach($resultat as $row){

                echo "ID du match:" .$row["id"]. "<br>";
                
                echo "Date et heure:" .$row["DateHeure"]. "<br>";
                
                echo "ID du joueur1:" .$row["idJoueur1"]. "<br>";
                
                echo "ID du joueur2:" .$row["idJoueur2"]. "<br><br>";
            }
          
          ?>

            <!-- Saisie du joueur 1 !-->
            <form action="" method="post">
                <select name="idJoueur1">
                    <?php
                    foreach ($tabJoueurs as $Joueurs) {
                    ?>
                        <option value="<?= $Joueurs["id"] ?>"><?= $Joueurs["nom"] . " " . $Joueurs["prenom"] ?></option>
                    <?php
                    }
                    ?>
                </select>


                <!-- Saisie du joueur 2 !-->

                <select name="idJoueur2">
                    <?php
                    foreach ($tabJoueurs as $Joueurs) {
                    ?>
                        <option value="<?= $Joueurs["id"] ?>"><?= $Joueurs["nom"] . " " . $Joueurs["prenom"] ?></option>
                    <?php
                    }
                    ?>
                </select>



                <label for="datetime">Date et heure:</label>
                <input type="datetime-local" id="datetime" name="datetime">
                <br><br>
                <input type="submit" value="Saisir le match" name="saisiMatch">
            </form>




        <?php
        } catch (Exception  $error) {
            echo "error est : " . $error->getMessage();
        }
        ?>

    </div>
</body>

</html>