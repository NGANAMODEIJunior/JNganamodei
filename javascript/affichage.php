<?php

require_once 'config.php';

$stmt = $GLOBALS['pdo']->query('SELECT * FROM tache');
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
</head>
<body>
    <h1>Todo List</h1>

    <table>
        <tr>
            <th>nomtache</th>

        </tr>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?php echo htmlspecialchars($task['nomtache']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['nomtache'];
    

    $stmt = $GLOBALS['pdo']->prepare('INSERT INTO tache (nomtache) VALUES (:nomtache)');
    $stmt->bindParam(':nomtache', $title);
    $stmt->execute();
}

$stmt = $GLOBALS['pdo']->query('SELECT * FROM tache');
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
</head>
<body>
    <h1>liste des taches</h1>

    <table>
        <tr>
            <th>Title</th>
       </tr>
   </table>
</body>
</html>
