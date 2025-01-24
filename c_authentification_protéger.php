<!DOCTYPE html>

<html>

<body>

<?php

if (!isset($_POST['btnSeConnecter'])) { /* L'entrée btnSeConnecter est vide = le formulaire n'a pas été posté, on affiche le formulaire */

    // GENERATION FORMULAIRE //

    echo '

    <form action="" method = "post" ">

        Mel: <input name="mel" type="text" size ="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"">

        Mot de passe: <input name="mot_de_passe" type="text" size ="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" ">

        <input type="submit" name="btnSeConnecter"  value="Se connecter">

    </form>';

} else
/* L'utilisateur a cliqué sur Se connecter, l'entrée btnSeConnecter <> vide, on traite le formulaire */

{

    // TRAITEMENT FORMULAIRE //

// On se connecte

    require_once 'connexion.php';

    $mel = $_POST['mel'];

    $mot_de_passe = $_POST['mot_de_passe'];

 

    $requete = "SELECT numero FROM utilisateur WHERE mel='" . $mel . "' AND mot_de_passe = '" . $mot_de_passe . "'";

    echo "Requête générée : ".$requete . "</BR>"; // affichage requête générée, pour information

 

// Envoi de la requête vers MySQL

    $select = $connexion->query($requete);

// Les résultats retournés par la requête seront traités en 'mode' objet

    $select->setFetchMode(PDO::FETCH_OBJ);

// Traitement d'un seul résultat

    $enregistrement = $select->fetch();

    if ($enregistrement) { // si $enregistrement n'est pas vide = on a trouvé quelque chose -> on est connecté

        echo '<h1>Connexion réussie !</h1>';

    } else { // La requête n'a pas retournée de résultat, on a pas trouvé de ligne correspondant au mel et mot de passe

        echo "<h1>Echec à la connexion.</h1>";

    }

}

?>

</body>

</html>