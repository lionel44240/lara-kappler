<?php
try {
    include "bddconnect.php";

    //recuperation des articles
    $query = $dbh->prepare(
        'SELECT * FROM `post` 
        ');

    $query->execute();

    $post = $query->fetchAll(PDO::FETCH_ASSOC);   
     $dbh = null; // ferme la connection à la base de donnée
 }

 catch (PDOException $e) {
    print "Erreur de connection! Message: " . $e->getMessage() . "<br/>";
}
include "newslater.phtml";