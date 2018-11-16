<?php
session_start();
if (isset($_GET["action"]) && $_GET["action"] == "deconnexion" && isset($_SESSION['pseudo'])) {
    $_SESSION['pseudo'] = null;
    $_SESSION['password'] = null;
    session_destroy();
}
header('Location: index.phtml');