<?php echo "C'est toujours Junior"?>
<?php function Mafonction($colonne1, $colonne2,$colonne3){
  
  echo"<table border>
     <th>$colonne1 </th><th>$colonne2 </th> <th>$colonne3</th>
     <tr><td>Orange </td><td>Banane </td><td>sachet </td></tr>
     <tr><td>Ananas </td><td>Avocat </td><td>Bonbon </td></tr>
     <tr><td>Pommme</td><td>Papaye </td><td> Air Force</td></tr>
  </table>";

}?>
<?php
$A="Emmanuel";
$B="Alexandre";
$C="Junior";
Mafonction($A, $B, $C); ?>