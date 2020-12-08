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
                    $comment = null;

            
            // <!-- récupérations des valeurs -->
            

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
                </div>
            ';
            
                //Espace Commentaire
            echo '<div ><h2><b>Commentaire</b></h2></div>';

                //Ajouter un commentaire
                
                    //Text Area pour le commentaire
                    //Après avoirs cliqué sur le bouton submit on revient sur la meme page
            echo'
            <form action="article.php" method="POST"enctype=" multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="id" value='.$_POST["id"].'>
                <textarea class="form-control" name="comment" required></textarea>
            <input class="btn btn-warning" type="submit" action="article.php" value="Ajouter un commentaire" >
            
            </div>
            </form>';

            

            //récup de l'id de l'user courrant
            $login = $_SESSION['login'];
            $requete = mysqli_query($bdd,"SELECT id_user from user  where login='$login'");;
            $data = mysqli_fetch_assoc($requete);
            $aut = $data['id_user'];

            //récup du nom de l'user courrant
            
            $requete2 = mysqli_query($bdd,"SELECT nom from user  where login='$login'");;
            $data2 = mysqli_fetch_assoc($requete2);
            $autnom = $data2['nom'];
            
            //récupére le commentaire de la texte area
            if(isset($_POST["comment"]) && !empty($_POST["comment"])) {   
                $comment = $_POST["comment"] ;
                $comment = addslashes($comment);

                // requete pour exécuter la commande insert 
                $req = $pdo->exec("INSERT into commentaire (user, user_nom, article, commentaire, date_publication ) values ('$aut', '$autnom', '$id','$comment',CURRENT_TIMESTAMP)");
            } 






            
            


            //$com_insert = "INSERT into commentaire(user, article, commentaire, date_publication, ) values(?,?,?,CURRENT_TIMESTAMP)";  
            //$com_resultat = mysqli_prepare($bdd, $com_insert);

            //mysqli_stmt_bind_param($com_resultat,$aut,$comment);
            //mysqli_stmt_execute($com_resultat);
            
            //echo $com_resultat;






                // Affichage des commentaires BLOQUE ???
            
//            $com_req = mysqli_query($bdd, "SELECT distinct user,article,commentaire, (date_publication,'%d/%m/%Y')as publication FROM commentaire where id_article='$id' order by publication desc ");





            $result = $pdo->query("SELECT * FROM commentaire where article='$id' order by date_publication desc ");

            while  ($com = $result->fetch(PDO::FETCH_OBJ)) {

                echo '
                <div style="border: 1px solid ; margin: 10px 0 10px 0; ">
                <p>'.$com->user_nom. '</p>
                <p>'.$com->date_publication. '</p>
                <p>'.$com->commentaire. '</p>
                </div>
                ';
            }






            $com_req = mysqli_query($bdd, "SELECT all FROM commentaire where id_article='$id' order by publication desc ");

            
            
            
            mysqli_close($bdd);          
            ?>
            
        </div>
    </div>
</body>


<?php include "inc\jooter.php" ?> 