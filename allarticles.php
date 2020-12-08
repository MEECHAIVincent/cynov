<?php include "inc\header.php" ;
       

?>
<?php  require 'connect.php';
        $bdd = getBdd();
 ?>
<body>

<?php


if (empty($_GET['login']) && empty($_SESSION['login'])) {
    header('Location: signin.php');
    die;
}?>




	<!-- container -->
	<div class="container">


		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">Liste des articles publiés</h1>
                </header>
                            <form method="POST" action="allarticles.php" enctype="multipart/form-data"> 
                    <div class="form-group">
                        <h3>Option de recherche:</h3>
                    </div>
                       
                      
   
           
                <label>catégorie</label>

<?php
		// Affichage des sites sur liste
                $bdd = getBdd();
                echo '<select name="categorie">';
                echo '<option value="vide"></option>';
                $sql = mysqli_query($bdd, "SELECT distinct id_categorie, nom_categorie FROM categorie, article where categorie.id_categorie=article.categorie  order by id_categorie");
                while ( ($row = mysqli_fetch_array($sql)) ) {
                    echo '<option value="'.$row['id_categorie'].'">'.$row['nom_categorie'].'</option>';
                }
                mysqli_close($bdd);
                echo '</select>';  

?>
        
                
                
                <label>réalisateur :</label>

<?php
		// Affichage des services sur liste
                $bdd = getBdd();
                echo '<select name="realisateur">';
                echo '<option value="vide"></option>';
                $sql = mysqli_query($bdd, "SELECT distinct realisateur FROM article ");
                while ( ($row = mysqli_fetch_array($sql)) ) {
                    echo '<option value="'.$row['realisateur'].'">'.$row['realisateur'].'</option>';
                }
                mysqli_close($bdd);
                echo '</select>';  

?>



<input type="submit" class="btn btn-primary" value="Rechercher" name="valider" /></br></br>
</form>
<?php
  if (isset($_POST['categorie'])&& isset($_POST['realisateur'])&& $_POST['categorie']!="vide" && $_POST['realisateur']!="vide") {
      $bdd = getBdd();
      $realisateur = $_POST['realisateur'];
      $categorie = $_POST['categorie'];




                // Récupérations valeurs des champs pour affichage du tableau
                $requete2 = mysqli_query($bdd, "SELECT distinct id_article,film,realisateur, nom_categorie, DATE_FORMAT(date_sortie,'%d/%m/%Y')as sortie,login, DATE_FORMAT(date_publication,'%d/%m/%Y')as publication FROM user, article, categorie where categorie=$categorie and realisateur='$realisateur' and article.statut=1 and user.id_user=article.auteur and article.categorie=categorie.id_categorie order by publication desc");
                //affiche le nombre d'élément de la requète

                    // Affichage du tableau
                    echo '<table BORDER CELLPADDING=8 CELLSPACING=0>
                    <tr class="entete">
                        
                        <th colspan=2>Film</th>
                        <th colspan=2>Réalisateur</th>
                        <th colspan=2>Catégorie</th>
                        <th colspan=2>Sortie</th>
                        <th colspan=2>Auteur </th>
                        <th colspan=2>date publication</th>
                        
                       
                    </tr>';
                    while ( ($row = mysqli_fetch_assoc($requete2)) ) {
                        echo '
                        <form method="POST" action="article.php" enctype="multipart/form-data">

                        <input type="hidden" name="id" value='.$row['id_article'].'>
                            <tr class="debut">
                                <td colspan=2> <img src="'.$row['affiche'].'"/></td> 
                                <td colspan=2> '.$row['film']. '</td> 
                                <td colspan=2> '.$row['realisateur'].'</td> 
                                <td colspan=2> '.$row['nom_categorie'].'</td> 
                                <td colspan=2> '.$row['sortie'].'</td>
                                <td colspan=2> '.$row['login']. '</td>
                                <td colspan=2> '.$row['publication']. '</td> 
                                <td colspan=2> <input type="submit"  value="consulter"></input></td> 
                            </tr>
                            </form>';  
                    }
                    echo '</table>';
                    mysqli_close($bdd);

                
                
     }else if (isset($_POST['categorie'])&& $_POST['categorie']!="vide") {
      $bdd = getBdd();
      
      $categorie = $_POST['categorie'];




                // Récupérations valeurs des champs pour affichage du tableau
                $requete2 = mysqli_query($bdd, "SELECT distinct id_article,film,realisateur, nom_categorie, DATE_FORMAT(date_sortie,'%d/%m/%Y')as sortie,login, DATE_FORMAT(date_publication,'%d/%m/%Y')as publication FROM user, article, categorie where  categorie=$categorie and article.statut=1 and user.id_user=article.auteur and article.categorie=categorie.id_categorie order by publication desc");
                //affiche le nombre d'élément de la requète

                    // Affichage du tableau
                    echo '<table BORDER CELLPADDING=8 CELLSPACING=0>
                    <tr class="entete">
                        
                        <th colspan=2>Film</th>
                        <th colspan=2>Réalisateur</th>
                        <th colspan=2>Catégorie</th>
                        <th colspan=2>Sortie</th>
                        <th colspan=2>Auteur </th>
                        <th colspan=2>date publication</th>
                        
                       
                    </tr>';
                    while ( ($row = mysqli_fetch_assoc($requete2)) ) {
                        echo '
                        <form method="POST" action="article.php" enctype="multipart/form-data">

                        <input type="hidden" name="id" value='.$row['id_article'].'>
                            <tr class="debut">
                                <td colspan=2> <img src="'.$row['affiche'].'"/></td> 
                                <td colspan=2> '.$row['film']. '</td> 
                                <td colspan=2> '.$row['realisateur'].'</td> 
                                <td colspan=2> '.$row['nom_categorie'].'</td> 
                                <td colspan=2> '.$row['sortie'].'</td>
                                <td colspan=2> '.$row['login']. '</td>
                                <td colspan=2> '.$row['publication']. '</td> 
                                <td colspan=2> <input type="submit"  value="consulter"></input></td> 
                            </tr>
                            </form>';  
                    }
                    echo '</table>';
                    mysqli_close($bdd);

                
     }else if (isset($_POST['realisateur'])&& $_POST['realisateur']!="vide") {
      $bdd = getBdd();
      
      $realisateur = $_POST['realisateur'];




                // Récupérations valeurs des champs pour affichage du tableau
                $requete2 = mysqli_query($bdd, "SELECT distinct id_article,film,realisateur, nom_categorie, DATE_FORMAT(date_sortie,'%d/%m/%Y')as sortie,login, DATE_FORMAT(date_publication,'%d/%m/%Y')as publication FROM user, article, categorie where  realisateur='$realisateur' and article.statut=1 and user.id_user=article.auteur and article.categorie=categorie.id_categorie order by publication desc");
                //affiche le nombre d'élément de la requète

                    // Affichage du tableau
                    echo '<table BORDER CELLPADDING=8 CELLSPACING=0>
                    <tr class="entete">
                        
                        <th colspan=2>Film</th>
                        <th colspan=2>Réalisateur</th>
                        <th colspan=2>Catégorie</th>
                        <th colspan=2>Sortie</th>
                        <th colspan=2>Auteur </th>
                        <th colspan=2>date publication</th>
                        
                       
                    </tr>';
                    while ( ($row = mysqli_fetch_assoc($requete2)) ) {
                        echo '
                        <form method="POST" action="article.php" enctype="multipart/form-data">

                        <input type="hidden" name="id" value='.$row['id_article'].'>
                            <tr class="debut">
                                <td colspan=2> <img src="'.$row['affiche'].'"/></td> 
                                <td colspan=2> '.$row['film']. '</td> 
                                <td colspan=2> '.$row['realisateur'].'</td> 
                                <td colspan=2> '.$row['nom_categorie'].'</td> 
                                <td colspan=2> '.$row['sortie'].'</td>
                                <td colspan=2> '.$row['login']. '</td>
                                <td colspan=2> '.$row['publication']. '</td> 
                                <td colspan=2> <input type="submit"  value="consulter"></input></td> 
                            </tr>
                            </form>';  
                    }
                    echo '</table>';
                    mysqli_close($bdd);

                
     
     
     }else{
                    
                    
                    
          $bdd = getBdd();




                // Récupérations valeurs des champs pour affichage du tableau
                $requete2 = mysqli_query($bdd, "SELECT distinct affiche,id_article,film,realisateur, nom_categorie, DATE_FORMAT(date_sortie,'%d/%m/%Y')as sortie,login, DATE_FORMAT(date_publication,'%d/%m/%Y')as publication FROM user, article, categorie where article.statut=1 and user.id_user=article.auteur and article.categorie=categorie.id_categorie order by publication desc");
                //affiche le nombre d'élément de la requète

                    // Affichage du tableau
                    echo '<table BORDER CELLPADDING=8 CELLSPACING=0>
                    <tr class="entete">
                        <th colspan=2>Affiche</th>
                        <th colspan=2>Film</th>
                        <th colspan=2>Réalisateur</th>
                        <th colspan=2>Catégorie</th>
                        <th colspan=2>Sortie</th>
                        <th colspan=2>Auteur </th>
                        <th colspan=2>date publication</th>
                        
                       
                    </tr>';
                    while ( ($row = mysqli_fetch_assoc($requete2)) ) {
                        
                        echo '
                        <form method="POST" action="article.php" enctype="multipart/form-data">

                        <input type="hidden" name="id" value='.$row['id_article'].'>
                            <tr class="debut">
                                <td colspan=2> <img src="'.$row['affiche'].'"/></td> 
                                <td colspan=2> '.$row['film']. '</td> 
                                <td colspan=2> '.$row['realisateur'].'</td> 
                                <td colspan=2> '.$row['nom_categorie'].'</td> 
                                <td colspan=2> '.$row['sortie'].'</td>
                                <td colspan=2> '.$row['login']. '</td>
                                <td colspan=2> '.$row['publication']. '</td> 
                                <td colspan=2> <input type="submit"  value="consulter"></input></td> 
                            </tr>
                            </form>';  
                                              
                    }

                    echo '</table>';
                    mysqli_close($bdd);          
        



       }


?>
   <!--</form>-->
                                
                                </div>
        </div>
</body>
<script>
    function id {

    }


</script>
<?php include "inc\jooter.php" ?>