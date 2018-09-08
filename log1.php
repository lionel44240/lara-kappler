<?php
//session_start();

// Connexion
if  (isset($_POST['password'])) {

    $password = $_POST['password'];
    $login = $_POST['pseudo'];

    try {
        $dbh = new PDO("mysql:host=localhost;dbname=lara","root","");

        $dbh->exec("SET NAMES UTF8");


    //recuperation des element qui pourront etre modifier
        $query = $dbh->prepare(
            'SELECT *
            FROM user
            WHERE (Login = ? AND Password = MD5(?))
            ');

        $query->execute(array($login, $password));



        $post = $query->fetch(PDO::FETCH_ASSOC);
        var_dump($post['Login']);
        if ($post['Login'] == ($login)) {

          if ($post['Password'] == (md5($password))) {
            session_start();
            $_SESSION = $_POST; 
            header('Location: index.phtml');    
        }
        else {
            echo "probleme de mot de passe ,  ressayez";
            exit();
        }
    }
     $dbh = null; // ferme la connection à la base de donnée
 } 
 catch (PDOException $e) {
    print "Erreur de connection! Message: " . $e->getMessage() . "<br/>";
}
}
if (isset($_GET["action"]) && $_GET["action"] == "deconnexion" && isset($_SESSION['pseudo'])) {
    $_SESSION['pseudo'] = null;
    $_SESSION['password'] = null;
} 
include "log1.phtml";