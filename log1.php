<?php
// Connexion
if  (isset($_POST['password'])) {

    $password = $_POST[htmlspecialchars('password')];
    $login = $_POST[htmlspecialchars('pseudo')];

    try {
        include "bddconnect.php";

    //recuperation des element qui pourront etre modifier
        $query = $dbh->prepare(
            'SELECT *
            FROM user
            WHERE (Login = ? AND Password = MD5(?))
            ');
        
        $query->execute(array($login, $password));
        
        $post = $query->fetch(PDO::FETCH_ASSOC);
        if ($post['Login'] == ($login)) {
        }
        if ($post['Password'] == (md5($password))) {
            session_start();
            $_SESSION = $_POST;
            header('Location: index.phtml');
        }
        else {
            alert: "probleme de mot de passe ,  ressayez";
        }
        $dbh = null; // ferme la connection à la base de donnée
     }
 catch (PDOException $e) {
    print "Erreur de connection! Message: " . $e->getMessage() . "<br/>";
    }
}
include "log1.phtml";