<?php

if (!isset($_GET["id"])) {
    // ce qui est testé : il manque l'identifiant de l'article. on ne peut pas continuer sur ce script : on redirige.
   
    header("location:editeur-article.php");
}

$id_article = $_GET["id"];

include("../inc/functions.php");

    $connexion = connexion_BDD();

$requete = "DELETE FROM `les_articles` WHERE `id` = ".$id_article;

$connexion->query($requete);

mysqli_close($connexion);

header("location:editeur-article.php");

?>