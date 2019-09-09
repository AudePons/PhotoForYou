<?php
//Utilisateur
DEFINE('DB_USER', 'root');

//Mot de passe
DEFINE('DB_PASSWORD', '');

//Serveur
DEFINE('DB_HOST', 'localhost');

//Nom de la base de donnée
DEFINE('DB_NAME', 'photoforyoupons');

$bdd=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
mysqli_set_charset($bdd, 'utf8');
?>