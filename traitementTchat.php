<?php

// Connexion à la base de données

session_start();
require_once 'connexion.php';


// Mise en session du pseudo de l'utilisateur (je ne veux pas utiliser de cookie)

$_SESSION['pseudo']=strip_tags($_POST['nom']); // on en profite pour supprimer les éventuelles balises.

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO tchat(DateM, Envoyeur, MessageM) VALUES(NOW(),?,?)');
$req->execute(array($_SESSION['pseudo'], strip_tags($_POST['message']))); // idem pour la suppression des balises éventuelles du message

// Redirection du visiteur vers la page du minichat
header('Location: miniTchat.php');

?>