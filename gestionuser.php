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
    
    <script type="text/javascript" src="JQUERY/jquery-3.1.1.js"></script>
    
</head


	<!-- container -->
	<div class="container">


		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">Gestion utilisateur</h1>
                </header>
                            <form method="POST" action="modifuser.php" enctype="multipart/form-data"> 
                    <div class="form-group">
                        <h3>Utilisateur</h3>
                       <?php
                      
                // Affichage des sites sur liste
                $bdd = getBdd();
                echo '<select name="user">';
                echo '<option value="vide"></option>';
                $sql = mysqli_query($bdd, "SELECT * FROM user order by id_user");
                while ( ($row = mysqli_fetch_assoc($sql)) ) {
                    echo '<option value="'.$row['login'].'">'.$row['login'].'</option>';
                }
                mysqli_close($bdd);
                echo '</select>';

?>

                    </div>

<!--                    <div class="form-group">
                        <h3>Nouveau mdp</h3>
                        <input type="password" class="form-control" id="pwd" name="pwd"  >
                    </div>-->


                    <div class="form-group">
                        <h3>Nouveau statut</h3>
                        <select name="statut" >
                            <option value=""></option>
                            <option value="1">Admin</option>
                            <option value="0">User</option>                          
                        </select>

                        
                    </div>

                    



<button type="submit" class="btn btn-primary">Modifier</button></br></br>
                    <?php

                $bdd = getBdd();
                $requete2 = mysqli_query($bdd, "SELECT * FROM user  order by id_user asc");

    
         
               

                    // Affichage du tableau
                    echo '<table BORDER CELLPADDING=8 CELLSPACING=0>
                    <tr class="entete">
                        <th colspan=2>Utilisateur</th>
                        <th colspan=2>Statut</th>
                     
                        <th colspan=2>Supprimer</th>
                    </tr>';

                      foreach ($requete2  as $row) {
                        if ($row['admin']==1) {
                            echo    '<tr class="debut"> 
                                        <td colspan=2 name="login" value="'.$row['login'].'"> '.$row['login'].'</td> 
                                        <td colspan=2>ADMIN</td> 
                                        
                                        <td align="center" colspan=2> <input type="button" name="deluser"  value="❌"   onclick=Supprimer("'.$row['login'].'")></input> </td>
                                    </tr>';
                        }
                   
                        else {
                            echo    '<tr class="debut"> 
                                        <td colspan=2 name="login"  value="'.$row['login'].'"> '.$row['login'].'</td> 
                                        <td colspan=2>USER</td> 
                                       

                                        <td align="center" colspan=2> <input type="button" name="deluser" value="❌"   onclick=Supprimer("'.$row['login'].'")></input> </td>
                                    </tr>';
                        }
                    }
                    echo '</table>';
                    mysqli_close($bdd);
                  
                    
  ?>                 



                </form>



			</article>
			<!-- /Article -->
			

		</div>
	</div>	<!-- /container -->
<script >

    
    
    function Supprimer($login ){
       
        $.ajax({
            //the url to send the data to
            url: "deleteuser.php",
            //the data to send to
            data: {login : $login},
            //type. for eg: GET, POST
            type: "GET",
            //on success
            success: function(data){
                console.log("***********Success***************"); //You can remove here
                console.log(data); //You can remove here
            },
            //on error
            error: function(){
                    console.log("***********Error***************"); //You can remove here
                    console.log(data); //You can remove here
            }
            
        });

      alert("utilisateur supprimé");
       document.location.reload(true); 
  
    }
</script>

</body>

<?php include "inc\jooter.php" ?>