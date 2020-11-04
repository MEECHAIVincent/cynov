
<?php include "inc\header.php" ?>


<body> 

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Registration</li>
		</ol>



		<?php //Page d'inscription 

if (isset($_REQUEST['login'], $_REQUEST['nom'], $_REQUEST['mdp'], $_REQUEST['prenom'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$login = stripslashes($_REQUEST['login']);
	$login = mysqli_real_escape_string($conn, $login); 
	// récupérer l'nom et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['nom']);
	$nom = mysqli_real_escape_string($conn, $nom);
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$mdp = stripslashes($_REQUEST['mdp']);
    $mdp = mysqli_real_escape_string($conn, $mdp);
    // récupérer le téléphone et supprimer les antislashes ajoutés par le formulaire
	$prenom = stripslashes($_REQUEST['prenom']);
    $prenom = mysqli_real_escape_string($conn, $prenom);

	//requéte SQL + mot de passe crypté
    $query = "INSERT into `user` (login, nom, mdp, prenom)
              VALUES ('$login', '$nom', '".hash('sha256', $mdp)."', '$prenom')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='signin.php'>connecter</a></p>
			 </div>";
    }
}else{ 
?>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Registration</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Register a new account</h3>
							<p class="text-center text-muted">Lorem ipsum dolor sit amet, <a href="signin.php">Login</a> adipisicing elit. Quo nulla quibusdam cum doloremque incidunt nemo sunt a tenetur omnis odio. </p>
							<hr>

							<form action="" method="post">
								<div class="top-margin">
									<label>login</label>
									<input type="text" name="login" class="form-control">
								</div>
								<div class="top-margin">
									<label>Nom <span class="text-danger">*</span></label>
									<input type="text" name="nom" class="form-control">
								</div>

								<div class="top-margin">
									<label>prenom<span class="text-danger">*</span></label>
									<input type="text" name="prenom" class="form-control">
								</div>

								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Mot de passe <span class="text-danger">*</span></label>
										<input type="password" name="mdp" class="form-control">
									</div>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<label class="checkbox">
											<input type="checkbox"> 
											I've read the <a href="page_terms.html">Terms and Conditions</a>
										</label>                        
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit">Register</button>
										
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->
		</div>

<?php } ?>
	</div>	<!-- /container -->


	

	

</body>


<?php include "inc\jooter.php" ?>

