<?php 
session_start(); 
require_once('../include/config.php');

// $bdd = new PDO('mysql:host=localhost;dbname=jeu;charset=utf8', 'root', '');
if(isset($_POST['connect'])){
    $pseudo = htmlspecialchars($_POST['username']);
    $mdp=sha1($_POST['pwd']);
    if(!empty($pseudo) AND !empty($mdp)){
        $req = $bdd->prepare("SELECT  * FROM users WHERE username = ? AND mdp = ? ");
        $req->execute(array($pseudo, $mdp));
        $userexist = $req->rowCount();
        if($userexist == 1){
                $userinfo = $req->fetch();
                $_SESSION['id']=$userinfo['id'];
                $_SESSION['username'] = $userinfo['username'];
                $_SESSION['pwd'] =$userinfo['pwd'];
                header("Location: user.php?id=".$_SESSION['id']);
        }else{
            echo '<script type="text/javascript"> var msg = "Ce joueur n existe pas ! " ; alert(msg);</script>' ;
        }
    }
    else{
        echo '<script type="text/javascript"> var msg = "Veuillez remplir tous les champs !" ; alert(msg);</script>' ;
    }
}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="../modéle/css/formulaire_style.css">
<h1 class="text-left"> Se connecter </h1>

<form action="" method="POST">

<div class="form-group col-md-7">
    <label for="">Pseudo</label>
    <input type="text" name="username" class="form-control" placeholder="Lizli_95" required/>        
</div>

<div class="form-group col-md-7">
    <label for="">Mot de passe</label>
    <input type="password" name="pwd" class="form-control"  minlength="8" required/>        
</div>

    
        <div class="form-btn-container col-md-7">
       <input type="button"  class="btn btn-secondary" onclick="javascript:if(confirm('voulez vous quitte cette page ?')) location.href = '../index.php';" value="Annuler">
        <button type="submit" name="connect" class="btn btn-primary">Se connecter</button>
    </div>

</form>