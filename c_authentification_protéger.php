<!DOCTYPE html>
<html>
<body>
<?php
if (!isset($_POST['btnSeConnecter'])) { /* L'entrée btnSeConnecter est vide = le formulaire n'a pas été posté, on affiche le formulaire */
    // GENERATION FORMULAIRE //
    echo '
    <form action="" method="post">
        Mel: <input name="mel" type="text" size="30">
        Mot de passe: <input name="mot_de_passe" type="text" size="30">
        <input type="submit" name="btnSeConnecter" value="Se connecter">
    </form>';
} else
/* L'utilisateur a cliqué sur Se connecter, l'entrée btnSeConnecter <> vide, on traite le formulaire */

{

// TRAITEMENT FORMULAIRE //
// On se connecte
    require_once 'connexion.php';

    $mel = addslashes(($_POST['mel']));
    $mot_de_passe = addslashes(($_POST['mot_de_passe']));

    $requete = "SELECT numero FROM utilisateur WHERE mel='$mel' AND mot_de_passe='$mot_de_passe'";
    $stmt = $connexion->prepare($requete);

    // Préparation de la requête
    
    // Exécution de la requête
    $stmt->execute();
    echo "Requête générée : ".$requete . "</BR>"; // affichage requête générée, pour information

    // Traitement d'un seul résultat
    $enregistrement = $stmt->fetch(PDO::FETCH_OBJ);

    if ($enregistrement) { // si $enregistrement n'est pas vide = on a trouvé quelque chose -> on est connecté
        echo '<h1>Connexion réussie !</h1>';
    } else { // La requête n'a pas retournée de résultat, on a pas trouvé de ligne correspondant au mel et mot de passe
        echo "<h1>Echec à la connexion.</h1>";
    }
}
?>
</body>
</html>