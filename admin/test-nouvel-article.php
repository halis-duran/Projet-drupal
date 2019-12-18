<?php

// 1. Etablir la connexion à la base de données

$hote = "localhost";
$utilisateur = "root";
$motdepasse = "root";
$base = "blog";

$connexion = mysqli_connect($hote , $utilisateur , $motdepasse , $base); // hote , utilisateur , mot de passe, base

// 2. Préparer une requête

$nouvelle_date = "2015-11-22";
$nouveau_titre = "Titre ajouté par PHP";
$nouveau_contenu = "Contenu ajouté par PHP";

$requete = "INSERT INTO `les_articles` (`date_article`, `titre`, `contenu` , `image`) VALUES ('".$nouvelle_date."', '".$nouveau_titre."', '".$nouveau_contenu."', '');";

//echo $requete;

//$connexion->query($requete); // 3. Exécution de la requête (méthode query() de notre "objet" connexion)

// Affichage de la liste des articles

$requete2 = "SELECT * FROM `les_articles` ORDER BY `date_article` DESC";

$resultat = $connexion->query($requete2); // liste, ligne par ligne, que l'on devra "décortiquer".

while ($ligne = mysqli_fetch_array($resultat)) {
    // tant que l'on peut attribuer à une variable ($ligne) le résultat de mysqli_fetch_array() appliqué à notre liste, on re-execute le code suivant.
    
    //echo $ligne; ATTENTION : C'est un tableau, donc echo retournera une erreur (et affichera "Array", sans plus de précision).
    
    //var_dump($ligne);
    
    $id_article = $ligne["id"]; // ou $ligne[0]
    $date_article = $ligne["date_article"]; // ou $ligne[1]
    $titre_article = $ligne["titre"]; // ou $ligne[2]
    $contenu_article = $ligne["contenu"]; // ou $ligne[3]
    
    echo "Article ".$id_article." : ".$titre_article." (".$date_article.")<br/>";
    
    
}

?>