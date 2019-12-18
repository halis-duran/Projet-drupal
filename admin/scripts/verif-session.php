<?php

/*
Ce script, lorsqu'il est inclus au début d'une page de la section admin, permet de vérifier si l'utilisateur est identifié.
Si non, il est redirigé vers la page d'authentification.
*/

session_start();

$authentification_ok = true;

if (isset($_SESSION["utilisateur"])) {

    $utilisateur = $_SESSION["utilisateur"];
    
    $connexion = mysqli_connect("localhost", "root", "root", "blog"); // À modifier selon config serveur
    
    $sql = "SELECT * FROM sessions WHERE `login` = '$utilisateur'";
    $res = $connexion->query($sql);
    
    if (mysqli_num_rows($res) == 0) {
        
        $authentification_ok = false;
        
    }
    
    mysqli_close($connexion);
    
} else {
    
    $authentification_ok = false;
    
}

if (!$authentification_ok) { // On n'est pas authentifié
    header("location:formulaire-login.php");
}

// Si on arrive à ce point-là (sans avoir été redirigé), c'est qu'on a le droit de rester sur la page dans laquelle on a inclus ce script de vérification.

?>