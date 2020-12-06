

<?php include "inc\header.php" ?>
<?php  require 'connect.php';
        $bdd = getBdd();
 ?>
<body class="home">


	<!-- Header -->
	<header id="head">
		<div class="container-fluid" style="padding:0">
				<!-- Carousel container -->
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
						<img src="assets/images/bg_header.jpg" alt="img_01" class="img-responsive">
						<div class="carousel-caption">
							<h3>First image du film</h3>
							<p>Note ou contenu de l'article	</p>
						</div>
						</div>

						<div class="item">
						<img src="assets/images/bg_header.jpg" alt="img_02" class="img-responsive">
						<div class="carousel-caption">
							<h3>Second image du film</h3>
							<p>Note ou contenu de l'article</p>
						</div>
						</div>

						<div class="item">
						<img src="assets/images/bg_header.jpg" alt="img_03" class="img-responsive">
						<div class="carousel-caption">
							<h3>Third image du film</h3>
							<p>Note ou contenu de l'article</p>
						</div>
						</div>
					</div>

					<!-- Previous/Next controls -->
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="icon-prev" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="icon-next" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
					</a>

				</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">CYNOV est l'application qui permet de partager sa passion pour le cinéma</h2>
		<p class="text-muted">
			Consultez les articles ou bien rédigez les vôtres afin de pouvoir partager vos avis sur vos films favoris! 
		</p>
	</div>
	<!-- /Intro-->
		
	<!-- Highlights - jumbotron -->
	<div class="jumbotron top-space">
		<div class="container">
			
			<h3 class="text-center thin">Dernier articles</h3>

			<?php
			$result = $pdo->query("SELECT `id_article`,`film`,`date_sortie`,date_publication,c.nom_categorie, affiche, contenu, note
									FROM `article` as a JOIN categorie as c on c.id_categorie = a.categorie
									WHERE statut = 1									 
									ORDER BY a.date_publication DESC
									LIMIT 10");
                                        while ($data = $result->fetch(PDO::FETCH_OBJ)) {

                                        

			
			
			
			?>
			
				<div class="col-12 col-md-6 mb-4 highlight">
					<div class="h-body text-center">
						<p><h4><b><?php echo $data->film; ?></b></h4>
						Sorti le : <?php echo date("d/m/Y",strtotime($data->date_sortie)); ?><br>
						Publié le : <?php echo date("d/m/Y",strtotime($data->date_publication)); ?>
						<img src="<?php echo $data->affiche ?>" alt="img_bdd" class="img-responsive">
						<article>
						<?php echo substr($data->contenu, 0,220). "..."; ?>
						</article>					
						Note : <?php echo $data->note; ?>/10 <a href="#"><button class="btn btn-primary">Regarder l'article</button></a> 	
						</p>
					</div>
				</div>


			<?php

			}

			?>

		
		</div>
	</div>
	
	<!-- Social links. @TODO: replace by link/instructions in template -->
	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
	<!-- /social links -->


	
		




	
</body>

<?php include "inc\jooter.php" ?>