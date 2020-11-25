<?php 
    session_start();
    if (isset($_SESSION['login'])) {

        require 'connect.php';
        $bdd = getBdd();

?>


<?php
        
        // Sécurisation des valeurs saisies
        $article = mysqli_real_escape_string($bdd,$_GET['article']);
        $film = mysqli_real_escape_string($bdd,$_GET['film']);
        $realisateur = mysqli_real_escape_string($bdd,$_GET['realisateur']);
        $categorie = mysqli_real_escape_string($bdd,$_GET['categorie']);
        $sortie= mysqli_real_escape_string($bdd,$_GET['sortie']);
        $contenu = mysqli_real_escape_string($bdd,$_GET['contenu']);
      
        
                                    
            $requete1 = "UPDATE article SET film=?, realisateur=?, categorie=?, date_sortie=?, contenu=?, statut=1 WHERE id_article=? ";
            $resultat1 = mysqli_prepare($bdd,$requete1) or die(mysqli_error($bdd));
            mysqli_stmt_bind_param($resultat1, "ssssss",$film,$realisateur, $categorie, $sortie,$contenu, $article);
            mysqli_stmt_execute($resultat1);
            $rentreeOK=true;
                
          
        
          if (isset($rentreeOK)) {
       
      
               
            
            echo "<p><h2>Publication de l'article</h2></p>";
            
            
            echo '<p><h3>Redirection en cours</h3></p>';
            
            echo '<p></p>';
  
            header("refresh:2;url=gestionarticle.php");
        }
    }     
 ?>  