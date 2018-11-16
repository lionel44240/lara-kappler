<?php


$bddconnect['location'] = "mysql:host=localhost;dbname=lara" ;
$bddconnect['ident'] = "root";
$bddconnect['password'] = "";

$dbh = new PDO($bddconnect['location'],$bddconnect['ident'],$bddconnect['password']);

$dbh->exec("SET NAMES UTF8");
