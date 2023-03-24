<?php

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $password = $_POST['mdp'];

    $stmt = $GLOBALS['pdo']->prepare('SELECT id FROM utilisateur WHERE nom = :nom AND password = :password');
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':mdp', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        session_start();
        $_SESSION['iduser'] = $user['id'];
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post">
        <div>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="mdp">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">connexion</button>
    </form>
</body>
</html>
