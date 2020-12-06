

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
									WHERE a.statut = 1 
									ORDER BY a.date_publication DESC
									LIMIT 10");
                                        while ($data = $result->fetch(PDO::FETCH_OBJ)) {

                                        

			
			
			
			?>
			
				<div class="col-12 col-md-6 mb-4 highlight">
					<div class="h-body text-center">
						<p><h2><?php echo $data->film; ?></h2>
						<h3> Sorti le : <?php echo date("d/m/Y",strtotime($data->date_sortie)); ?><br>
						Publié le : <?php echo date("d/m/Y",strtotime($data->date_publication)); ?></h3> 
						<img src="<?php echo $data->affiche ?>" alt="img_bdd" class="img-responsive">
						<article>
						<?php echo $data->contenu; ?>
						</article>
						<h4>Note : <?php echo $data->note; ?>/10 </h4>
						</p>
					</div>
				</div>


			<?php

			}

			?>

			
		<!--	 /row  -->
		
		</div>
	</div>
<!-- /Highlights -->

	<!-- container -->
	<!--	<div class="container">

		<h2 class="text-center top-space">Frequently Asked Questions</h2>
		<br>

		<div class="row">
			<div class="col-sm-6">
				<h3>Which code editor would you recommend?</h3>
				<p>I'd highly recommend you <a href="http://www.sublimetext.com/">Sublime Text</a> - a free to try text editor which I'm using daily. Awesome tool!</p>
			</div>
			<div class="col-sm-6">
				<h3>Nice header. Where do I find more images like that one?</h3>
				<p>
					Well, there are thousands of stock art galleries, but personally, 
					I prefer to use photos from these sites: <a href="http://unsplash.com">Unsplash.com</a> 
					and <a href="http://www.flickr.com/creativecommons/by-2.0/tags/">Flickr - Creative Commons</a></p>
			</div>
		</div> /row -->

	 <!--	<div class="row">
			<div class="col-sm-6">
				<h3>Can I use it to build a site for my client?</h3>
				<p>
					Yes, you can. You may use this template for any purpose, just don't forget about the <a href="http://creativecommons.org/licenses/by/3.0/">license</a>, 
					which says: "You must give appropriate credit", i.e. you must provide the name of the creator and a link to the original template in your work. 
				</p>
			</div>
			<div class="col-sm-6">
				<h3>Can you customize this template for me?</h3>
				<p>Yes, I can. Please drop me a line to sergey-at-pozhilov.com and describe your needs in details. Please note, my services are not cheap.</p>
			</div>
		</div>  /row -->

<!--		<div class="jumbotron top-space">
			<h4>Dicta, nostrum nemo soluta sapiente sit dolor quae voluptas quidem doloribus recusandae facere magni ullam suscipit sunt atque rerum eaque iusto facilis esse nam veniam incidunt officia perspiciatis at voluptatibus. Libero, aliquid illum possimus numquam fuga.</h4>
     		<p class="text-right"><a class="btn btn-primary btn-large">Learn more »</a></p>
  		</div> -->

<!--</div>	 /container -->
	
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