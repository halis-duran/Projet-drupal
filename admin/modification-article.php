<?php

if (!isset($_POST["champ_titre"]) || !isset($_GET["id"])) {
    // ce qui est testé : soit il manque les infos du champ titre, soit il manque l'identifiant de l'article. Si l'un des deux cas se vérifié, on ne peut pas continuer sur ce script : on redirige.
   
    header("location:editeur-article.php");
}

$id_article = $_GET["id"];

// Ce script fonctionne à partir des données de editeur-article.php

//echo "Traitement des données pour un nouvel article...";

$titre_a_traiter = addslashes($_POST["champ_titre"]);
// addslashes() sert à échapper les apostrophes et guillemets du contenu, qui peuvent causer un conflit et empecher la requete d'aboutir.

$contenu_a_traiter = addslashes($_POST["champ_contenu"]);

/////

include("../inc/functions.php");

    $connexion = connexion_BDD();

$requete = "UPDATE `les_articles` SET `titre` = '$titre_a_traiter', `contenu` = '$contenu_a_traiter' WHERE `id` = ".$id_article;

$connexion->query($requete);

mysqli_close($connexion); // notation alternative : $connexion->close()

header("location:editeur-article.php");

?>