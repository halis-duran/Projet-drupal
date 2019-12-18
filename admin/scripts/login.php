<?php

session_start();

if (isset($_POST["champ_identifiant"]) && isset($_POST["champ_motdepasse"])) {
    
    $login = $_POST["champ_identifiant"];
    $mdp = $_POST["champ_motdepasse"];
    
    $connexion = mysqli_connect("localhost", "root", "root", "blog"); // À modifier selon config serveur
    
    $sql = "SELECT * FROM sessions WHERE `login` = '$login' AND `motdepasse` = PASSWORD('$mdp')";
    $res = $connexion->query($sql);
    
    if (mysqli_num_rows($res) > 0) {
        
        $_SESSION["utilisateur"] = $login; // À partir de là, la session est en place
        
    }
    
    mysqli_close($connexion);
    
}

header("location:../index.php"); //redirection vers accueil admin dans tous les cas

// Une fois sur l'accueil admin, si l'utilisateur n'est pas authentifié, il sera redirigé à nouveau, vers la page d'authentification.

?>

