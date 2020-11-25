<?php

/**
 * Nettoie une valeur insérée dans une page HTML
 * Doit être utilisée à chaque insertion de données dynamique dans une page HTML
 * Permet d'éviter les problèmes d'exécution de code indésirable (XSS)
 * @param string $valeur Valeur à nettoyer
 * @return string Valeur nettoyée
 */

/**
 * Gère la connexion à la base de données
 * @return mysqli Objet de connexion à la BD
 */

function getBdd() {
	$hote='localhost';
	$user='root';
	$mdp='';
	$nombdd='cynov';
    $bdd = mysqli_connect($hote,$user,$mdp,$nombdd);
        if (!$bdd) {
        	echo 'Erreur de connexion (' . mysqli_connect_errno() . ') ' . mysqli_connect_error();
		}
        return $bdd;
}


function getLogin(){
    $bdd=getBdd();
    
    
    
    
    
}