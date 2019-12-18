<?php

function connexion_BDD() {
    
    $hote = "localhost";
    $utilisateur = "root";
    $motdepasse = "root"; // Peut varier selon config serveur
    $base = "blog"; // Peut varier selon config serveur

    return mysqli_connect($hote , $utilisateur , $motdepasse , $base);
    
}

function formatage_date($date_sql) {
    
    $timestamp = strtotime($date_sql);
    
    $date_formatee = date("d/m/Y", $timestamp);
    
    return $date_formatee;

}

?>