<?php 
    session_start();
    include "inc\header.php";
    if (isset($_SESSION['login'])) {

        require 'connect.php';
        $bdd = getBdd();

      


          // Sécurisation valeur saisie
        $login = mysqli_real_escape_string($bdd,$_GET['login']);

 
                
            $requete2 = "DELETE from user where login=?";
            $resultat2 = mysqli_prepare($bdd,$requete2);
            mysqli_stmt_bind_param($resultat2,'s',$login);
            mysqli_stmt_execute($resultat2);
            $rentreeOK = true;



    }
?>
