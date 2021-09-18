<?php 
// on trouve dans une dn des tables des vues des procédure
// déclarer la base de donné en php
// la methode pdo(url,username,mdp)

try {
	$con=new pdo('mysql:host=localhost;dbname=biblio;charset=utf8','root','');
	echo "Connexion à la base de donné faite avec succés";
	
} catch (Exception $e) {
	echo "Echec de connexion à la base de donné".$e->getMessage();

}

 ?>