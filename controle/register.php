<?php 
require_once('../include/config.php');

        if(isset($_POST['formInscrip'])){

                $pseudo= htmlspecialchars($_POST['username']);
                $Prenom= htmlspecialchars($_POST['name']);
                $Nom= htmlspecialchars($_POST['surname']);
                $dateinscrip=$_POST['dateinscrip'];
                $mail=htmlspecialchars($_POST['email']);
                $mdp=sha1($_POST['pwd']);
                $mdp2=sha1($_POST['pwdconf']);
                

                    if(!empty($_POST['username']) AND !empty($_POST['surname']) AND !empty($_POST['name']) AND !empty($_POST['dateinscrip']) AND !empty($_POST['email']) AND !empty($_POST['pwd']) AND !empty($_POST['pwdconf']))
                    {
                            $pseudolenght =  strlen($pseudo);              
                            if( $pseudolenght <=255){ 
                                $reqpseudo = $bdd->prepare("SELECT * FROM users WHERE username= ? ");
                                $reqpseudo->execute(array($pseudo));
                                $pseudoexist = $reqpseudo->rowCount();
                                $reqmail = $bdd->prepare("SELECT * FROM users WHERE email= ? ");
                                $reqmail->execute(array($mail));
                                $mailexist = $reqmail->rowCount();
                                
                                if($pseudoexist == 0){
                                        if ($mailexist == 0){
                                                if($mdp == $mdp2){
                                                        $insertmbr=$bdd->prepare("INSERT INTO users (username, Nom, Prenom,  dateInscrip, email , mdp) VALUES (?, ?, ?, ?, ?, ?)");
                                                        $insertmbr->execute(array($pseudo, $Nom, $Prenom,  $dateinscrip, $mail, $mdp));
                                                        $error="Votre compte à bien été crée ! <a href=\"login.php\"> Me connecter</a>";
                                                        header('Location: login.php');
                                                }else{
                                                    $error= "Vos mots de passe ne correspondent pas !";
                                                }
                                        
                                        }else{
                                            $error= "Cet email est déjà utilisé pour un autre compte";
                                        }
                                }else{
                                    $error= "Ce pseudo est déjà utilisé pour un autre compte";
                                }     
                            }    
                            else{
                                    $error= "Votre pseudo n'est pas valide, ne doit pas dépasser 255 caractères";
                            }
                    }       
                    else{
                        $error = "Tous les Champs doivent etre remplis !";
                    }
        }
                   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montez&family=Montserrat:wght@300;400;700&family=Nosifer&display=swap" rel="stylesheet"> 
    <script
    src="https://kit.fontawesome.com/83f4286022.js"
    crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="../modéle/css/formulaire_style.css">
    <title> C&F |inscription</title>
</head>
<body>
<div class="container"> 

<h1 class="text-center">S'inscrire</h1>
<section>
<form   action="" method="POST">
  
    
        <div class="form-group " >
        <label for="pseudo">Pseudo</label>
        <input type="text" name="username" id="pseudo" class="form-control" placeholder="Lizli_95" value="<?php if(isset($pseudo)) {echo $pseudo; }?>" required/>        
        </div>
        
    <div class="form-group" >
   
        <label for="">Nom</label>
        <input type="text" name="surname" class="form-control"  required/>        
      
    </div>
    <div class="form-group">
       
        <label for="">Prénom</label>
        <input type="text" name="name" class="form-control" required/>        
       
    </div>
    <div class="form-group">
   
        <label for="">Date inscription</label>
        <input type="date"  id="DN" min="2020/05/01" name="dateinscrip" class="form-control" required/>        
        
    </div>
    <div class="form-group">
        
    <label for="mail">Email</label>
    <input type="email" name="email" id="email" class="form-control" placeholder=" lizli_95@gmail.com" value="<?php if(isset($mail)) {echo $mail; }?>" required/>        
       
    </div> 
    <div class="form-group">
      
        <label for="mdp">Mot de passe</label>
        <input type="password" name="pwd" class="form-control"  minlength="8" required placeholder= "(8 characters minimum)" required/>        
       
    </div>
    <div class="form-group ">
     
        <label for="mdpConf">Confirmez Votre Mot de passe</label>
        <input type="password" name="pwdconf" class="form-control" minlength="8" required/>        
        
    </div>
    
       
    <div class="form-btn-container ">
    <input type="button"  class="btn btn-secondary" onclick="javascript:if(confirm('voulez vous quitter la page ?')) location.href = '../index.html';" value="Annuler">   
    <button type="submit" name="formInscrip" type="je m'inscris" class="btn btn-primary"> M'inscrire </button>
    </div>
</form>
</section>
</div>
<?php
        if(isset($error)){
            echo '<font color="red">'.$error."</font>";
        }

?>

</body>
</html>
