<?php

// On se connecte

require_once('connexion.php');

// Envoi de la requête vers MySQL

$select = $connexion->query("SELECT * FROM utilisateur WHERE numero = 2");

// Les résultats retournés par la requête seront traités en 'mode' objet

$select->setFetchMode(PDO::FETCH_OBJ);

// Traitement d'un seul résultat

$enregistrement = $select->fetch();

if ($enregistrement) {// si $enregistrement n'est pas vide

  echo '<h1>', $enregistrement->nom,' ', $enregistrement->prenom, '</h1>';

}

else {// La requête n'a pas retournée de résultat

  echo "Aucun résultat";

}

?>