<?php
session_start();

if ((isset($_POST["titre"])) && (isset($_POST["article"]))) {

try {
    include "bddconnect.php";

     $query = $dbh ->prepare('
     	INSERT INTO  Post (`Author_Id`, `Title`, `Contents`, `Category_Id`, CreationTimestamp) 
     	VALUES (?,?,?,?,?)');
        	

     $query->execute(array($_POST["Author_Id"], $_POST["titre"],$_POST["article"], $_POST["Categorie_Id"], $date));


  	 $dbh = null; // ferme la connection à la base de donnée
     header('location: index.php');
     exit();

} 
catch (PDOException $e) {
    print "Erreur de connection! Message: " . $e->getMessage() . "<br/>";
}
}
include 'post.phtml';