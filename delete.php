<?php
session_start();
// Connexion
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=lara","root","");

        $dbh->exec("SET NAMES UTF8"); 

    //recuperation des articles
        $query = $dbh->prepare(
            'DELETE FROM `post` 
            WHERE ( id=? )
            ');

        $query->execute(array($_GET["id"]));

        $post = $query->fetch(PDO::FETCH_ASSOC);      
     $dbh = null; // ferme la connection à la base de donnée
    }

 catch (PDOException $e) {
    print " Erreur de connection! Message: " . $e->getMessage() . "<br/>";
 }
header('Location: laraPost.php');
exit();