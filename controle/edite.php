<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
} 
require_once('../include/config.php');

if(isset($_SESSION['id']))
{
      $requser= $bdd->prepare("SELECT * FROM users where id = ?");
      $requser->execute(array($_SESSION['id']));
      $user = $requser->fetch();
      if(isset($_POST['newUsername']) AND !empty($_POST['newUsername']) AND $_POST['newUsername'] != $user['username']){
        $newpseudo= htmlspecialchars($_POST['newUsername']);  
        $insertpseudo = $bdd->prepare("UPDATE users SET username = ? where id = ? ");
        $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
      }

      if(isset($_POST['newpassword1']) AND !empty($_POST['newpassword1']) AND $_POST['newpassword1'] != $user['mdp'])
      {
            if(isset($_POST['newpassword2']) AND !empty($_POST['newpassword2']))
                {
                    $mdp1= sha1($_POST['newpassword1']);
                    $mdp2= sha1($_POST['newpassword2']);
                    if($mdp1 == $mdp2){
                        $insertmdp = $bdd->prepare("UPDATE users  SET mdp = ? where id = ? ");
                        $insertmdp->execute(array($mdp1,$_SESSION['id']));
                        // header('Location: user.php?id= ?');
                    }else{
                        $msg="Les deux mots de passes ne sont pas identique ";
                    }
                }
        }
      if(isset($_POST['newUsername']) AND $_POST['newUsername'] ==$user['username'] ){
            header('Location: ../controle/user.php?id= ?');
      }   

?>
<div>
    

            <header class="masthead">
            <div class="container">
            
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">  Editer votre Profil ! </h2>
                </div>
           </div>
   <div>
   <link href="../modéle/css/formulaire_style.css" rel="stylesheet" /> 
   <form action="" method="POST">
        <div class="form-group " >
        <label for="mdpConf">Nouveau Pseudo </label>
        <input type="text" name="newUsername" class="form-control" placeholder="pseudo"  required value="<?php $user['username']; ?>" /> <br>
        </div>
        <br>
        <div class="form-group" >
        <label for="">Nouveau Nom : </label>
        <input type="text" name="newSurname" palceholder="nom" value="<?php echo $user['Nom'];?>"/> <br>
        </div>   
        <br>     
        <label for="">Nouveau Prenom : </label>
        <input type="text" name="newname" palceholder="Prenom" value="<?php echo $user['Prenom'];?>"/> <br>
        </div>
        <br>
        <div class="form-group">
        <label for="">Email : </label>
        <input type="email" name="newmail" /> <br>
        </div>
        <br>
        <div class="form-group">
        <label for="">Nouveau Mot de passe : </label>
        <input type="password" name="newpassword1" /> <br>
        </div>
        <br>
        <div class="form-group">
        <label for="">Confirmer avec un Mot de passe : </label>
        <input type="password" name="newpassword2" /> <br>
        </div>
        <br>
        <div class="form-btn-container ">
        <input type="button"  class="btn btn-secondary" onclick="javascript:if(confirm('voulez vous quitter la page ?')) location.href = '../index.html';" value="Annuler">
        <input type="submit" value="Editer" /> <br>
        </div>
    </form>
   <?php if(isset($msg)) {echo $msg;}?>
</div>
<?php
} 
else{
    header("Location : ../controle/login.php ");
}       
?>
</div>
</header>
          
      
          <!-- Bootstrap core JS-->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
                  <!-- Third party plugin JS-->
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>