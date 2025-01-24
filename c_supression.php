<?php

// Connexion au serveur

require_once('connexion.php');

 

// Suppression de données

try {

  // On envoie la requête

  $requete = "DELETE FROM utilisateur WHERE nom ='Verse'";

  $nombreDeSuppression = $connexion->exec($requete);

  // On affiche le nombre d'enregistrements supprimés

  echo $nombreDeSuppression, " enregistrement(s) a(ont) été supprimé(s)."; 

} catch (Exception $e) {

  echo "Une erreur est survenue lors de la suppression";

}

?>