<?php
include("scripts/verif-session.php");

// En premier lieu, on sait qu'il nous faudra de toute façon un accès à la BDD

include("../inc/functions.php");

    $connexion = connexion_BDD();
    // L'objet "connexion" est prêt, on le réutilisera plus bas dans la page



$titre_article = "";
$contenu_article = "";

if (isset($_GET["id"])) {
    
    $id_article = $_GET["id"];
    $titre_formulaire = "Edition d'un article";
    $script = "modification-article.php?id=".$id_article;
    
    // Comme on veut éditer un article, il faut commencer par en retrouver les contenus dans les champs de l'éditeur.
    
    $requete = "SELECT * FROM `les_articles` WHERE id = ".$id_article;
    // On ne va s'intéresser qu'a la ligne dont l'id correspond à celui passé en url

    $resultat = $connexion->query($requete);
    
    if (mysqli_num_rows($resultat) == 0) { // Résultat vide, il n'existe pas d'article correspondant à l'id demandé.
        header("location:editeur-article.php"); // Redirection, retour au mode "nouvel article".
        
    }

    while ($ligne = mysqli_fetch_array($resultat)) {
    
    //$id_article = $ligne["id"]; // ou $ligne[0]
    //$date_article = $ligne["date_article"]; // ou $ligne[1]
    $titre_article = $ligne["titre"]; // ou $ligne[2]
    $contenu_article = $ligne["contenu"]; // ou $ligne[3]
    
    }
    
} else {
    $titre_formulaire = "Ajouter un article";
    $script = "traitement-nouvel-article.php";
}

?>

<html>
    
    <head>
        <meta charset = "utf-8"/>
        <title>Editeur d'articles</title>
    </head>

    <body>
        
        <h1><?php echo $titre_formulaire; ?></h1>
    
        <form action = "<?php echo $script; ?>" method="post">
        <!-- action = le script de traitement des données, vers lequel on sera redirigé lors de l'envoi du formulaire -->
            <input required type = "text" name = "champ_titre" value = "<?php echo $titre_article; ?>" />
            <br/>
            <textarea required name = "champ_contenu"><?php echo $contenu_article; ?></textarea>
            <br/>
            <input type = "submit" value = "OK" />
            <!-- input type = "submit" : enverra le formulaire lors d'un clic -->
            
        </form>
        
        <div>
            <h2>Liste des articles</h2>
        
            <?php 
            
            $requete2 = "SELECT * FROM `les_articles` ORDER BY `id` DESC";

            $resultat = $connexion->query($requete2);

            while ($ligne = mysqli_fetch_array($resultat)) {
            
            $id_article = $ligne["id"]; // ou $ligne[0]
            $titre_article = $ligne["titre"]; // ou $ligne[2]
            
            echo "<a href = 'editeur-article.php?id=$id_article'>$titre_article</a>";
            echo " ";
            echo "<a onclick = 'if (!window.confirm(\"Supprimer cet article ?\")){return false;}' href = 'supprimer-article.php?id=$id_article'>&times;</a>";
            echo "<br>";
    
            }
            
            ?>
            
            <a href = 'editeur-article.php'>Nouvel Article</a>
            
        </div>
        
    </body>

</html>