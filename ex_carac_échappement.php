<?php
// on regarde d'alembert et on ajoute un caractère d'échappement pour le rendre sûre a la base de donnée
$nom = "d'Alembert";
echo $nom. " L'insertion de ce nom n'est pas sûre. <br>";
echo addslashes($nom). " L'ajout du caractère d'échappement rend l'insertion sûre.";
?>