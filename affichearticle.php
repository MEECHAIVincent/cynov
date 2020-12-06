<?php
    session_start();
    if (isset($_SESSION['login'])) {
        require 'connect.php';
        header("Refresh: 1440; url=index.php");
  ?>   

<fieldset>     
<legend><h2>Validation :</h2></legend> 
<form method='get' action='validerarticle.php'>
</br>
  
  <?php
  $bdd = getBdd(); 

  $requete1 = mysqli_query($bdd,'SELECT id_categorie, id_article, realisateur, date_sortie, film, nom_categorie, login, note, contenu, date_publication from user natural join article natural join categorie where id_article="'.$_GET['article'].'"');
  $data = mysqli_fetch_assoc($requete1);
            
         
  ?>

  
                    <div class="form-group">
                        <h3>Film</h3>
                        <?php echo'<input type="text" class="form-control" name="film" id="film" value="'.$data['film'].'" />';?>
                    </div>
   
                      <div class="form-group">
                        <h3>Realisateur</h3>
                        <?php echo'<input type="text" class="form-control" name="realisateur" id="realisateur" value="'.$data['realisateur'].'" />';?>
                    </div>
   
                    <div class="form-group">
                        <h3>Date sortie</h3>
                        <?php echo'<input type="date" class="form-control" name="sortie" id="sortie" value="'.$data['date_sortie'].'" />';?>
                    </div>
   
                     <div class="form-group">
                        <h3>Categorie</h3>
<?php
                
                $bdd = getBdd();
                echo '<select name="categorie">';

                echo '<option value="'.$data['id_categorie'].'">'.$data['nom_categorie'].'</option>';
                $sql = mysqli_query($bdd, "SELECT * FROM categorie order by nom_categorie asc");
                while ( ($row = mysqli_fetch_assoc($sql)) ) {
                    echo '<option value="'.$row['id_categorie'].'">'.$row['nom_categorie'].'</option>';
                }
                mysqli_close($bdd);
                echo '</select>';

?>
                    </div> 
   
                

                <div class="form-group">            
    
               <h3>Contenu</h3>
                  <?php echo'<TEXTAREA class="form-control" name="contenu" id="contenu" rows="5" cols="100" >'.$data['contenu'].'</TEXTAREA>';?>
                </div>
                    
              <?php echo'publié par <strong>'.$data['login'].'</strong> le: '.$data['date_publication'].'' ?>
      
           

<?php    echo'<input name="article" type="hidden" value="'.$data['id_article'].'">';?>
               

   


<?php                             
echo'<br><br>';
echo' <input type="submit" value="Valider" class="btn btn-primary"" />';
                
echo "</form>";              
echo'</fieldset>';             
    }else {
//redirection en cas de non connexion
include("redirection.php");

    }
?>