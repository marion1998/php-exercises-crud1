<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>  

    <?php
        //Exercice 1
        //Afficher tous les clients.
        
        require 'sqlconnect.php';
        
        echo '<h3> Afficher tous les clients. </h3> <hr>';
        
        foreach($dbh->query('SELECT * from colyseum.clients')as $client){
            print_r($client['firstName'] . " " . $client['lastName']);
            echo ', ' . '<br>' ;  
        }
        echo '<hr>'
        ?>

    <?php
        // Exercice 2
        // Afficher tous les types de spectacles possibles.
        
        echo '<h3> Afficher tous les types de spectacles possibles. </h3> <hr>';
        
        foreach($dbh->query('SELECT * from colyseum.genres')as $genre){
            print_r($genre['genre']);
            echo ', ' . '<br>';
        }
        echo '<hr>'
        ?>
    
    <?php
        // Exercice 3
        // Afficher les 20 premiers clients.

        echo'<h3> Afficher les 20 premiers clients. </h3> <hr>';

        foreach($dbh->query('SELECT * from colyseum.clients WHERE id <= 20')as $client){
            print_r($client['id'] . '. ' . $client['firstName'] . " " . $client['lastName']);
            echo ', ' . '<br>';
        }
        echo '<hr>'
    ?>

    <?php
        // Exercice 4
        // N'afficher que les clients possédant une carte de fidélité.

        echo "<h3> N'afficher que les clients possédant une carte de fidélité </h3> <hr>";

        foreach($dbh->query('SELECT * from colyseum.clients WHERE card = 1')as $client){
            print_r($client['id'] . '. ' . $client['firstName'] . " " . $client['lastName']);
            echo ', ' . '<br>';
        }
        echo '<hr>'
    ?>

    <?php
        // Exercice 5
        // Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".
        // Les afficher comme ceci :
        // Nom : *Nom du client*
        // Prénom : *Prénom du client*
        // Trier les noms par ordre alphabétique.

        echo '<h3> Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M". Trier les noms par ordre alphabéthique </h3> <hr>';

        foreach($dbh->query('SELECT * from  colyseum.clients WHERE lastName LIKE "M%" ORDER BY lastName ASC')as $client) {
            print_r("<p>" . "Nom : " . $client['lastName'] . "," . "<br>" . "Prénom : " . $client['firstName'] . '. ' . "</p>");
        }
        echo '<hr>'
    ?>

    <?php
        // Exercice 6
        // Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : *Spectacle* par *artiste*, le *date* à *heure*.
        
        echo "<h3> Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. </h3> <hr>";

          foreach($dbh->query('SELECT * from colyseum.shows ORDER BY title ASC')as $show) {
            print_r("<p>" . "Titre : " .  $show['title'] . "<br>" . "Date : " . $show['date'] . "<br>" . "Heure de début : " . $show['startTime']);
        }
        echo '<hr>'
    ?>

    <?php 
        // Exercice 7
        // Afficher tous les clients comme ceci :
        // Nom : *Nom de famille du client*
        // Prénom : *Prénom du client*
        // Date de naissance : *Date de naissance du client*
        // Carte de fidélité : *Oui (Si le client en possède une) ou Non (s'il n'en possède pas)*
        // Numéro de carte : *Numéro de la carte fidélité du client s'il en possède une.*

        echo "<h3> Afficher tous les clients comme ceci -> Classe : propriétée </h3> <hr>";

            foreach($dbh->query('SELECT * from colyseum.clients')as $client) {
                
                $reponse;

                if ($client['card'] == 1 ) {
                    $reponse = "Oui" . "<br>" . "Numéro de carte : " . $client['cardNumber'] ;
                } elseif ($client['card'] != 1) {
                    $reponse =  "Non";
                } 
                print_r("<p>" . "Nom : " . $client['lastName'] . "<br>" . "Prénom : " . $client['firstName'] . "<br>" . "Date de naissance : " . $client['birthDate'] . "<br>" . "Carte de fidelité : " . $reponse . "<br>" . "</p>");
            }
        
    ?>
        </body>
        </html>