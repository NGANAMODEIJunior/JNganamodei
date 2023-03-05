
<?php
// Génère : <body text='black'>
$bodytag = str_replace("%body%", "black", "<body text='%body%'>");

// Génère : Hll Wrld f PHP
$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$onlyconsonants = str_replace($vowels, "", "Hello World of PHP");

// Génère : You should eat pizza, beer, and ice cream every day
$phrase  = "You should eat fruits, vegetables, and fiber every day.";
$healthy = array("fruits", "vegetables", "fiber");
$yummy   = array("pizza", "beer", "ice cream");

$newphrase = str_replace($healthy, $yummy, $phrase);

// Génère : good goy miss moy
$str = str_replace("ll", "", "good golly miss molly!", $count);
echo $count;

?>

Exemple #2 Exemple 2 avec str_replace()
<?php
// Ordre des remplacements
$str     = "Line 1\nLine 2\rLine 3\r\nLine 4\n";
$order   = array("\r\n", "\n", "\r");
$replace = '<br />';

// Traitement du premier \r\n, ils ne seront pas convertis deux fois.
$newstr = str_replace($order, $replace, $str);

// Affiche F car A est remplacé par B, puis B est remplacé par C, et ainsi de suite...
// Finalement, E est remplacé par F
$search  = array('A', 'B', 'C', 'D', 'E');
$replace = array('B', 'C', 'D', 'E', 'F');
$subject = 'A';
echo str_replace($search, $replace, $subject);

// Affiche : apearpearle pear
// Pour les mêmes raisons que plus haut
$letters = array('a', 'p');
$fruit   = array('apple', 'pear');
$text    = 'a p';
$output  = str_replace($letters, $fruit, $text);
echo $output;
?>
