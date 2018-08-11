<?php
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=colyseum', 'root', 'Axelamour1');
        
    }catch (PDOException $e) {
        print "Erreur!:".$e->getMEssage()."<br/>";
        die();
    }
?>