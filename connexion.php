<?php

// ------------------------------------------------------------------------------ Connexion à la base de données 'tchat' ------------------------------------------------------------------------------------------------------------

// Test de connexion
try
{
    $bdd = new PDO('mysql:host=mysql-etu.unicaen.fr:3306;dbname=pavy231_5;charset=utf8', 'pavy231', 'co4iavaaFeihu1oo'); // insérez vos paramètres de connexion à la BDD.
}

// Gestion des erreurs
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>
