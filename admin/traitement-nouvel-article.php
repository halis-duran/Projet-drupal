<?php

if (!isset($_POST["champ_titre"])) { // ou if (isset($_POST["champ_titre"]) == false)
    // Ce qui voudrait dire qu'il n'y a pas de valeur titre disponible
    header("location:editeur-article.php"); // Redirection
}

// Ce script fonctionne à partir des données de editeur-article.php

//echo "Traitement des données pour un nouvel article...";

$titre_a_traiter = addslashes($_POST["champ_titre"]);
// addslashes() sert à échapper les apostrophes et guillemets du contenu, qui peuvent causer un conflit et empecher la requete d'aboutir.

$contenu_a_traiter = addslashes($_POST["champ_contenu"]);


/////

include("../inc/functions.php");

    $connexion = connexion_BDD();

$requete = "INSERT INTO `les_articles` (`date_article`, `titre`, `contenu` , `image`) VALUES (NOW(), '".$titre_a_traiter."', '".$contenu_a_traiter."', '');";

$connexion->query($requete);

mysqli_close($connexion);

header("location:editeur-article.php");

?>