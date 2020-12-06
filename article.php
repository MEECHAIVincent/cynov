<?php include "inc\header.php" ;?>

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
    <div class="article">
    <article class="col-sm-8 mainarticle">

		

			<!-- Article main article -->

                            
            <!-- Récuppérer l'id de l'article de la page précédente -->
            <?php
                    if(isset($_POST["id"]) && !empty($_POST["id"])) {   
                        $id = $_POST["id"];   
            //            echo "id: ".$id."<br/>";  
                    } 
                    else {
                        echo"Pas de id <br/>";
                    }

            
            // <!-- récupérations des valeurs -->
            $bdd = getBdd();

            $requete2 = mysqli_query($bdd, "SELECT distinct affiche,id_article,film,realisateur, nom_categorie,note,contenu, DATE_FORMAT(date_sortie,'%d/%m/%Y')as sortie,login, DATE_FORMAT(date_publication,'%d/%m/%Y')as publication FROM user, article, categorie where id_article='$id' ");
            $article = mysqli_fetch_assoc($requete2);

            echo '            
            <header class="page-header">
            <h1 class="page-title">'.$article['film']. '</h1>
            </header>';


            // <!-- affichage des valeurs  -->
            echo '
                <div>                        
                    <img style="width: 100px, float:right"  src="'.$article['affiche'].'"/>
                    <p> Réalisateur: '.$article['realisateur'].'</p> 
                    <p> Catégorie:'.$article['nom_categorie'].'</p> 
                    <p> Date de sortie:'.$article['sortie'].'</p>
                    <p> Auteur de larticle: '.$article['note']. '</p> 
                    <p> Auteur de larticle: '.$article['contenu']. '</p> 
                    <p> Auteur de larticle: '.$article['login']. '</p> 
                    <p> Date de publication: '.$article['publication']. '</p>
                </div>';
            ?>

        </div>
    </div>
</body>

<?php include "inc\jooter.php" ?> 