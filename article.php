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
            <h1 class="page-title"><b>'.$article['film']. '</b></h1>
            </header>';


            // <!-- affichage des valeurs  -->
            echo '
                <div style="font-size: large; display: inline-flex" >                        
                    <div>    
                        <img style="width: 300px; float:left; padding-right: 15px; clear:left"  src="'.$article['affiche'].'"/>
                    </div>
                    <div>
                        <p> <b> Réalisateur: </b>'.$article['realisateur'].'</p> 
                        <p> <b>Catégorie: </b>'.$article['nom_categorie'].'</p> 
                        <p> <b>Date de sortie: </b>'.$article['sortie'].'</p>
                        <p> <b>Note: </b> '.$article['note']. '/10</p>
                    </div>
                </div>
                <section>
                <h2><b>Synopsis et détails</b></h2>
                <div>
                <p> '.$article['contenu']. '</p>

                </div>
                </section>
                <div style="font-size:x-large">

                    <p> <b>Auteur de larticle: '.$article['login'].' plubliée le '.$article['publication']. '</b></p> 
                </div>';

                // Espace Coemmentaire
                echo '<div >
                    <h2><b>Commentaire</b></h2>


                </div>'
            ?>


        </div>
    </div>
</body>


<?php include "inc\jooter.php" ?> 