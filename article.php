<?php 

/* Pour exemple  - Requete SQL pour créer la table des articles :

CREATE TABLE `blog`.`les_articles` (
`id` INT(255) NOT NULL AUTO_INCREMENT ,
`date_article` DATETIME NOT NULL ,
`titre` TEXT NOT NULL ,
`contenu` TEXT NOT NULL ,
`image` TEXT,
PRIMARY KEY (`id`)) ENGINE = InnoDB;


Requete SQL pour ajouter un élément dans cette table :

INSERT INTO `les_articles` (`date_article`, `titre`, `contenu` , `image`) VALUES ('YYYY-MM-DD', 'Valeur pour titre', 'Nom de fichier de l'image');

*/

if (isset($_GET["id"])) {
    $id_article = $_GET["id"];
} else {
    header("location:index.php");
}
// pour récupérer le paramètre "id" passé dans l'url (sous la forme article.php?id=valeur)

// Scripts pour récupérer des infos dans la BDD

include("inc/functions.php");

$connexion = connexion_BDD();

$requete = "SELECT * FROM `les_articles` WHERE id = ".$id_article;
    // On ne va s'intéresser qu'a la ligne dont l'id correspond à celui passé en url

    $resultat = $connexion->query($requete);
    
    if (mysqli_num_rows($resultat) == 0) { // Résultat vide, il n'existe pas d'article correspondant à l'id demandé.
        header("location:index.php"); // Redirection
        
    }

    $ligne = mysqli_fetch_array($resultat); 
    
    //$id_article = $ligne["id"]; // ou $ligne[0]
    $date_article = $ligne["date_article"]; // ou $ligne[1]
    $titre_article = $ligne["titre"]; // ou $ligne[2]
    $contenu_article = $ligne["contenu"]; // ou $ligne[3]
    
    


$titre_page = $titre_article;

include("inc/header.php");

?>
            
<?php



?>

            <!--------- ZONE CONTENU ----------------------------->
            
        <article>
            
            <h2><?php echo $titre_article; ?></h2>
            
            <p><?php echo formatage_date($date_article); ?></p>
            
            <p><?php echo nl2br($contenu_article); ?></p>
            
            <a href = "">Article précédent</a>
            
        </article>
            
            <!--------------------------------------------------->
            
 <?php include("inc/footer.php"); ?>       