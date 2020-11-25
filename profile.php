

<?php include "inc\header.php";
require 'connect.php';
        $bdd = getBdd();
?>



<?php


if (empty($_GET['login']) && empty($_SESSION['login'])) {
    header('Location: index.php');
    die;
}

//Cela sélectionne les infos de la base de donnée 
if (!empty($_GET['login'])) {
    $userQuery = $dbh->prepare("SELECT id_user, nom, prenom, login ,inscription FROM user WHERE  login = '" . $_SESSION['login'] . "'");
    $userQuery->bindValue(':id', $_GET['login'], PDO::PARAM_INT);
    $userQuery->execute();
    $sqlUser = $userQuery->fetch();

    if (!$sqlUser) {
        header('Location: index.php');
        die;
    }
}

$user = !isset($sqlUser) ? $_SESSION['login'] : $sqlUser;


?>

<body>
	

	<!-- container -->
	<div class="container">
		
		<ol class="breadcrumb">
			<li><a href="index.html">Accueil</a></li>
			<li class="active">Mes informations</li>
		</ol>

		<div class="row">
			
			<!-- Sidebar -->
			<aside class="col-md-4 sidebar sidebar-left">

				<div class="row widget">
					<div class="col-xs-12">
						<h2>Mes informations personnelles</h2>

                        
					</div>
                </div>
                
                <div class="row widget">
					<div class="col-xs-12">
                        <h4>Nom: <?php $result = $pdo->query("SELECT * FROM user WHERE login = '" . $_SESSION['login'] . "'");
                                        while ($users = $result->fetch(PDO::FETCH_OBJ)) {

                                            echo $users->nom;
                                        } ?>
                        </h4>
						
					</div>
				</div>
				<div class="row widget">
					<div class="col-xs-12">
                        <h4>Prénom: <?php $result = $pdo->query("SELECT * FROM user WHERE login = '" . $_SESSION['login'] . "'");
                                        while ($users = $result->fetch(PDO::FETCH_OBJ)) {

                                            echo $users->prenom;
                                        } ?>



                        </h4>
						
					</div>
				</div>
				<div class="row widget">
					<div class="col-xs-12">
                        <h4>Pseudo: <?php $result = $pdo->query("SELECT * FROM user WHERE login = '" . $_SESSION['login'] . "'");
                                        while ($users = $result->fetch(PDO::FETCH_OBJ)) {

                                            echo $users->login;
                                        } ?></h4> <h4></h4>
					</div>
                </div>
                
                <div class="row widget">
					<div class="col-xs-12">
                        <h4>Inscrit depuis le:
                        <?php $result = $pdo->query("SELECT * FROM user WHERE login = '" . $_SESSION['login'] . "'");
                                        while ($users = $result->fetch(PDO::FETCH_OBJ)) {

                                            echo $users->inscription;
                                        } ?>
                        </h4>
					</div>
				</div>

			</aside>
			<!-- /Sidebar -->

			<!-- Article main content -->
			<article class="col-md-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">Changer mes informations.</h1>
				</header>


				<form action="" method="post">
								<div class="top-margin">
									<label>Pseudo</label>
									<input type="text" name="login" class="form-control">
								</div>
								<div class="top-margin">
									<label>Nom</label>
									<input type="text" name="nom" class="form-control">
								</div>

								<div class="top-margin">
									<label>Prénom</label>
									<input type="text" name="prenom" class="form-control">
								</div>

								<div class="top-margin">
									
										<button class="btn btn-action" type="submit">Changer mes informations</button>
										
								</div>

				</form>

				<?php
//
//						$nom = stripslashes($_POST['nom']);
//						$nom = mysqli_real_escape_string($bdd, $nom);
//
//						$prenom = stripslashes($_POST['prenom']);
//						$prenom = mysqli_real_escape_string($bdd, $prenom);

										



					if ( empty($nom)){

					}
					else{ 
						$insertnom = $pdo->exec("UPDATE user SET nom = '$_POST[nom]' WHERE login = '" . $_SESSION['login'] . "'");
					}

					if ( empty($prenom)){

					}
					else{ 
						$insertprenom = $pdo->exec("UPDATE user SET prenom = '$_POST[prenom]' WHERE login = '" . $_SESSION['login'] . "'");
					}




?>




			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	


</body>

<?php include "inc\jooter.php" ?>