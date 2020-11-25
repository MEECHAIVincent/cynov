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

<head>
    <meta  charset="utf-8" />
    <script type="text/javascript" src="JQUERY/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="assets/js/fonctions.js"></script>
            <script type="text/javascript">
            $
            (
                function()
                {
//                  renvoie à la page fonction.js
//                  fonction qui affiche les informations de l'ordinateur selectionnées dans le menu déroulant
                    $(".article").change(AfficherArticle);
                   
                }
            );
        </script>
    
</head


	<!-- container -->
	<div class="container">


		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">Gestion article</h1>
                </header>

                    <div class="form-group">
                        <h2>Article à modérer</h2>
                       <?php
                      
                // Affichage des sites sur liste
                $bdd = getBdd();
                echo '<select class="article">';
                echo '<option value="vide"></option>';
                $sql = mysqli_query($bdd, "SELECT * FROM article where statut=0 order by id_article");
                while ( ($row = mysqli_fetch_assoc($sql)) ) {
                    echo '<option value="'.$row['id_article'].'">'.$row['film'].'</option>';
                }
                mysqli_close($bdd);
                echo '</select>';

?>
                        <div id="divArticle"></div>

                    </div>


                    



			</article>
			<!-- /Article -->
			

		</div>
	</div>	<!-- /container -->


</body>

<?php include "inc\jooter.php" ?>