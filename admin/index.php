<?php include("scripts/verif-session.php"); ?>

<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<title>Admin</title>
</head>

<body>

    <h1>Blog - Interface d'administration</h1>
    
    <p>Vous êtes connecté(e) en tant que <?php echo $_SESSION["utilisateur"]; ?></p>
    
    <p><a href = "editeur-article.php">Editeur d'article</a></p>
    
    <p><a href = "scripts/logout.php">Se déconnecter</a></p>

</body>

</html>