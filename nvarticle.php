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


    
<?php 




if (!empty($_POST) && !empty($_FILES)) {
    
    
   

    $_POST['film'] = htmlentities($_POST['film']);
    $tre = $_POST["film"] ;
    $tre = addslashes($tre); //pour ajouter des slashes pour prendre en compte les apostrophes

    $_POST['realisateur'] = htmlentities($_POST['realisateur']);
    $real = $_POST["realisateur"] ;
    $real = addslashes($real); //pour ajouter des slashes pour prendre en compte les apostrophes

    $_POST['date_sortie'] = htmlentities($_POST['date_sortie']);
    $date = $_POST["date_sortie"] ;
    $date = addslashes($date); //pour ajouter des slashes pour prendre en compte les apostrophes

    $_POST['categorie'] = htmlentities($_POST['categorie']);
    $cat = $_POST["categorie"] ;
    $cat = addslashes($cat); //pour ajouter des slashes pour prendre en compte les apostrophes

    $_POST['note'] = htmlentities($_POST['note']);
    $nt = $_POST["note"] ;
    $nt = addslashes($nt); //pour ajouter des slashes pour prendre en compte les apostrophes

    $_POST['contenu'] = htmlentities($_POST['contenu']);
    $ctn = $_POST["contenu"] ;
    $ctn = addslashes($ctn); //pour ajouter des slashes pour prendre en compte les apostrophes
    
    $login = $_SESSION['login'];
    $requete = mysqli_query($bdd,"SELECT id_user from user  where login='$login'");;
    $data = mysqli_fetch_assoc($requete);
    $aut = $data['id_user'];

    $file_name = $_FILES['affiche']['name'];
    $file_extension = strchr($file_name, ".");

    

    $file_tmp_name = $_FILES['affiche']['tmp_name'];
    $file_dest ="assets/affiche_film/".$file_name;

    

    $extensions_autorisees = array('.jpg', '.jpeg', '.gif', '.png' );

    if(in_array($file_extension, $extensions_autorisees)){
        if(move_uploaded_file($file_tmp_name, $file_dest )){
            
           
             $requete2 = "INSERT into article(id_article, film, realisateur,date_sortie, categorie, note, contenu, auteur, affiche, date_publication, statut) values(NULL,?,?,?,?,?,?,?,?,CURRENT_TIMESTAMP, 0)";  
                $resultat2 = mysqli_prepare($bdd, $requete2);
                mysqli_stmt_bind_param($resultat2, "ssssssss",$tre,$real, $date, $cat, $nt, $ctn, $aut, $file_dest);
                mysqli_stmt_execute($resultat2);



            
?>
            <div class="alert alert-success">
                <b>Votre article sera publié après modération!</b> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>


            
            
         <?php 
        }
        else{
            echo "Une erreur est survenue";
        }
    }
    else{ 
          echo "Votre photo doit être au format jpg, jpeg, gif ou png ";

    }





   

    
}











?>


	<!-- container -->
	<div class="container">


		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">Nouvel article</h1>
                </header>
                <form method="POST" action="" enctype="multipart/form-data">


                    <div class="form-group">
                        <h3>Film</h3>
                        <input type="text" class="form-control" id="film" name="film" required >
                    </div>

                    <div class="form-group">
                        <h3>Réalisateur</h3>
                        <input type="text" class="form-control" id="realisateur" name="realisateur" required >
                    </div>

                    <div class="form-group">
                        <h3>Date de sortie</h3>
                        <input type="date" class="form-control" id="date_sortie" name="date_sortie" required >
                    </div>

                    <div class="form-group">
                        <h3>Categorie</h3>
                       <?php
                       
                // Affichage des sites sur liste
                $bdd = getBdd();
                echo '<select name="categorie">';
                echo '<option value="vide"></option>';
                $sql = mysqli_query($bdd, "SELECT * FROM categorie order by id_categorie");
                while ( ($row = mysqli_fetch_assoc($sql)) ) {
                    echo '<option value="'.$row['id_categorie'].'">'.$row['nom_categorie'].'</option>';
                }
                mysqli_close($bdd);
                echo '</select>';

?>

                    </div>

                    <div class="form-group">
                        <h3>Note</h3>
                        <input type="text" class="form-control" id="note" name="note" required >
                    </div>


                    <div class="form-group">
                        <h3>Avis</h3>
                        <textarea class="form-control" id="contenu" name="contenu" rows="5" cols="100" required>
                            
                        </textarea>
                        
                    </div>

                    

                    <div class="form-group">
                        <h3>Affiche:</h3>
                        <label for="myfile">Selectionnez une première photo:</label>
                        <input type="file" id="affiche" name="affiche" required><br><br>

                    </div>

                    <button type="submit" class="btn btn-primary">Enregister</button>
                    


                </form>



			</article>
			<!-- /Article -->
			

		</div>
	</div>	<!-- /container -->

</body>

<?php include "inc\jooter.php" ?>