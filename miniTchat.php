<?php

// Connexion à la base de données

require_once 'connexion.php';

// Démarrage de session

//session_start();

// Vérification de l'abscence du pseudo en session et affectation d'une valeur vide
if (!isset($_SESSION['pseudo'])) {

    $_SESSION['pseudo'] = '';
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mini Tchat</title>
    </head>
    <body>
        <form action="traitementTchat.php" method="POST">
            <label for="nom">Nom (32 caractères max) : </label>
            <input type="text" name="nom" placeholder="saisir votre nom" maxlength="32" value="<?php echo $_SESSION['pseudo']?>" onClick="this.value=\'\'" required>
            
            <label for="message">Message (50 caractères max) : </label>
            <input type="text" name="message" placeholder="saisir votre message" maxlength="50" required>

            <button type="submit">Valider</button>
        </form>
    
        <?php
            // Récupération des 5 derniers messages

            $reponse = $bdd->query('SELECT Envoyeur,DATE_FORMAT(DateM, \'%d/%m/%Y\') AS date,DATE_FORMAT(DateM, \'%Hh%imin%ss\') AS heure,MessageM FROM tchat ORDER BY DateM DESC LIMIT 0, 5'); 
        ?>

            <p class="info"> Liste des 5 derniers messages </p>
            <div id="messages">
                        
            <!-- Affichage des 5 derniers messages
            $test = $reponse->fetchAll();
            var_dump($test); -->
            <?php while ($donnees = $reponse->fetch()){ ?>
                
                <p> Le <span class="date"><?php echo $donnees['date'] ?></span> à <span class="heure"><?php echo $donnees['heure'] ?></span> - <strong><?php echo $donnees['Envoyeur'] ?></strong> a posté : <?php echo $donnees['MessageM'] ?></p>
                <?php }

                    // Fin de tâche de la requête
                    $reponse->closeCursor(); 
                ?>    
        
    </body>
</html>