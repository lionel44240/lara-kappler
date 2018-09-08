<?php 
session_start();

if ((isset($_POST["titre"])) && (isset($_POST["text"]))) {
// Connexion à la base de donnée
$titre = "";
if (isset($_POST['titre'])) {
	$titre = $_POST['titre'];
}
$text = "";
if (isset($_POST['text'])) {
	$text = $_POST['text'];
}
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=lara","root","");

        $dbh->exec("SET NAMES UTF8"); 

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
header("laraPost.php");
