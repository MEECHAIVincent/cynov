<?php include "inc\header.php" ?>


<body>
<?php



if (isset($_POST['login'])){
	$login = stripslashes($_REQUEST['login']);
	$login = mysqli_real_escape_string($conn, $login);
	$mdp = stripslashes($_REQUEST['mdp']);
	$mdp = mysqli_real_escape_string($conn, $mdp);
    $query = "SELECT * FROM `user` WHERE login='$login' and mdp='".hash('sha256', $mdp)."'";
	$result = mysqli_query($conn,$query) or die (mysqli_connect_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
		$_SESSION['login'] = $login;
		$_SESSION['id'] = $id;
		
	    header("Location: index.php");
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}

?>
	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">User access</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Connexion</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Connectez vous à votre compte</h3>
							<p class="text-center text-muted"> Seul l'administrateur de cette page peut se connecter. </p>
							<hr>
							
							<form action="" method="post" name="login">
								<div class="top-margin">
									<label>login <span class="text-danger">*</span></label>
									<input type="text" name="login" class="form-control">
								</div>
								<div class="top-margin">
									<label>Mot de passe  <span class="text-danger">*</span></label>
									<input type="password" name="mdp" class="form-control">
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<b><a href="">Mot de passe oublié?</a></b>
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit" value="Connexion " name="submit">Connexion</button>
									</div>
								</div>

								<?php if (! empty($message)) { ?>
    								<p class="errorMessage"><?php echo $message; ?></p>
								<?php } ?>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

	
		





</body>



<?php include "inc\jooter.php" ?>
