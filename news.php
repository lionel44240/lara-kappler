<?php 
session_start();
/*verification que le formulaire n'est pas null*/
if ((isset($_POST["titre"])) && (isset($_POST["text"]))) {
    $titre = $_POST['titre'];
    $text = $_POST['text'];

// Connexion à la base de donnée
    try {
        include "bddconnect.php";

        //insertion de l'article dans la bdd
        $query = $dbh->prepare(
            'INSERT INTO `post`(`titre`, `content`)
            VALUES (?, ?)
            ');

        $query->execute(array($titre, $text));

        $post = $query->fetch(PDO::FETCH_ASSOC);
    
     $dbh = null; // ferme la connection à la base de donnée
    }
    catch (PDOException $e) {
        print "Erreur de connection! Message: " . $e->getMessage() . "<br/>";
    }
}
include "news.phtml";
header("Location: laraPost.php");
