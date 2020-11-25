<?php 
    session_start();

    if (isset($_SESSION['login'])) {

    	require 'connect.php';
        $bdd = getBdd();
        
        
        
    $login = mysqli_real_escape_string($bdd,$_POST['user']);
    $statut = mysqli_real_escape_string($bdd,$_POST['statut']);     
    
    
    
    if($_POST['user']!="vide"){
       	
           
        
        
        
       	if (isset($_POST['statut']) &&  isset($_POST['user'])&& $_POST['statut']!="" ) {
                $requete1 = mysqli_query($bdd, "SELECT admin FROM user WHERE login='$login' ");
        	$result = mysqli_fetch_assoc($requete1);
        	$admin = $result['admin'];
            
         
            
                if($statut!= $admin){
                    $requete = "UPDATE user set admin=? WHERE login=? ";
        		$resultat = mysqli_prepare($bdd,$requete) or die(mysqli_error($bdd));
            	mysqli_stmt_bind_param($resultat, "ss", $statut,$login);
            	mysqli_stmt_execute($resultat);
				$rentreeOKK = true;
                    
                }else{
                    
                      echo "<p><h2>Saisie incorrecte - Statut actuel saisi </h2></div>";
                
                echo '<p><h3>Redirection en cours</h3></p>';
              
               header("refresh:2;url=gestionuser.php");
                    
                    
                }
            
        }   
            
            
           
         
    }else{
         echo '<div class="title1">';
            echo "<p><h2>Veuillez remplir les champs!!</h2></p>";
            echo '</div>';
            echo '<div class="title3">';
            echo '<p><h3>Redirection en cours</h3></p>';
            echo '</div>';
            echo '<p></p>';
            header("refresh:2;url=gestionuser.php");
        
        
        
    }   
        

        
        
        
           
      if (isset($rentreeOKK)) {
          
             echo "<p><h2>Nouveau statut MAJ</h2></p>";

            echo '<p><h3>Redirection en cours</h3></p>';
           
            echo '<p></p>';
            header("refresh:2;url=gestionuser.php");
        }   
        
        

        
    }

?>