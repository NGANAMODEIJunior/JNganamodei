<!DOCTYPE html>
<html>
<head>
    <title>Vote pour le meilleur rappeur</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
include 'Processus_vote.php'; // Inclut le contenu du fichier header.php
?>
    <h1>Vote pour ton rappeur préféré</h1>
    
    <div class="rapper">
        <img src="rappeur1.jpg" alt="Rappeur 1">
        <h2>Rappeur 1</h2>
        <p>Description du rappeur 1...</p>
        <a href="process_vote.php?rapper_id=1">Vote pour Rappeur 1</a>
    </div>
    
    <div class="rapper">
        <img src="rappeur2.jpg" alt="Rappeur 2">
        <h2>Rappeur 2</h2>
        <p>Description du rappeur 2...</p>
        <a href="process_vote.php?rapper_id=2">Vote pour Rappeur 2</a>
    </div>
</body>
</html>
