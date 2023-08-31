<?php
class Database {
    private $pdo;

    public function __construct($ipserver, $nomBase, $loginPrivilege, $passPrivilege) {
        try {
            $this->pdo = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase, $loginPrivilege, $passPrivilege);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }

    public function executeQuery($query, $params = []) {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
}

class Rappeur {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getRandomRappeurs() {
        $query = "SELECT id, nom, photo, description FROM rappeurs WHERE disqualifie = 0 ORDER BY RAND() LIMIT 2";
        return $this->db->executeQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function vote($rapper_id) {
        $query = "INSERT INTO votes (id_rappeur) VALUES (?)";
        $this->db->executeQuery($query, [$rapper_id]);
    }

    public function disqualifyRappeur($rapper_id) {
        $query = "UPDATE rappeurs SET disqualifie = 1 WHERE id = ?";
        $this->db->executeQuery($query, [$rapper_id]);
    }

    public function getWinner() {
        $query = "SELECT * FROM rappeurs WHERE disqualifie = 0 LIMIT 1";
        return $this->db->executeQuery($query)->fetch(PDO::FETCH_ASSOC);
    }
}

try {
    $ipserver = "localhost";
    $nomBase = "rappeurs_vote";
    $loginPrivilege = "junior";
    $passPrivilege = "junior";

    $db = new Database($ipserver, $nomBase, $loginPrivilege, $passPrivilege);
    $rappeurManager = new Rappeur($db);

    $rappeurs = $rappeurManager->getRandomRappeurs();

    foreach ($rappeurs as $rappeur) {
        echo '<div class="rapper">';
        echo '<img src="' . $rappeur["photo"] . '" alt="' . $rappeur["nom"] . '">';
        echo '<h2>' . $rappeur["nom"] . '</h2>';
        echo '<p>' . $rappeur["description"] . '</p>';
        echo '<a href="vote.php?rapper_id=' . $rappeur["id"] . '">Vote pour ' . $rappeur["nom"] . '</a>';
        echo '</div>';
    }

    if (isset($_GET['rapper_id'])) {
        $rapper_id = $_GET['rapper_id'];
        // Vérification pour empêcher les votes multiples
        // ...

        $rappeurManager->vote($rapper_id);
    }

    while (true) {
        $pair = $rappeurManager->getRandomRappeurs();
        if (count($pair) < 2) {
            break;
        }

        // Logique pour déterminer le perdant
        // ...

        $rappeurManager->disqualifyRappeur($perdant_id);
    }

    $winner = $rappeurManager->getWinner();
    if ($winner) {
        echo "Le rappeur gagnant est : " . $winner["nom"];
    }

} catch (Exception $error) {
    echo "Une erreur s'est produite: " . $error->getMessage();
}
?>
