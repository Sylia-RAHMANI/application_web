<h1>Bonjour</h1>
if(!empty($_POST)){
        // gerer les erreurs avec un tableau 
        $errors = array();
        require_once './include/config.php';
        if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]*$/',$_POST['username'])){
            $errors['username'] ="Votre pseudo n'est pas valide ! ";
        } else{
            $req= $bdd->prepare('SELECT id FROM users WHERE username= ?');
            $req->execute([$_POST['username']]);
            $user = $req->fetch();
            if($user){
                $errors['username'] = 'Ce pseudo est déjà pris';
            }
        }

        if(empty($_POST['surname']) || !preg_match('/^[a-zA-Z0-9_]*$/',$_POST['surname'])){
            $errors['surname'] ="Votre nom n'est pas valide ! ";
        }

        if(empty($_POST['name']) || !preg_match('/^[a-zA-Z0-9_]*$/',$_POST['name'])){
            $errors['name'] ="Votre prénom n'est pas valide ! ";
        }

        if(empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            $errors['email'] ="le Format de Votre email n'est pas valide ! ";
        }else{
            $req= $bdd->prepare('SELECT id FROM users WHERE email= ?');
            $req->execute([$_POST['email']]);
            $user = $req->fetch();
            if($user){
                $errors['email'] = 'Cet email est déjà utilisé pour un autre compte';
            }
        }

        if(empty($_POST['pwd'])||  $_POST['pwd'] != $_POST['pwdconf'] ){
            $errors['pwd'] ="Vous devez rentrer un mot de passe valide ! ";
        
        }
        // Enregister le joueur dans la base de données une fois que tout les erreurs sont debuger
        if(empty($errors)){
            
            $req=$bdd->prepare("INSERT INTO users SET username = ?, Nom = ?, Prenom = ?, dateBirth = ?, dateInscrip = ?, email =?, mdp= ?");
            $password= password_hash($_POST['pwd'], PASSWORD_BCRYPT );
            //$token= str_random(60);
            // debug($token);
            // die();
            $req->execute([$_POST['username'],$_POST['surname'],$_POST['name'],$_POST['datebirth'],$_POST['dateinscrip'],$_POST['email'],$password,]);
            $user_id = $bdd->lastInsertId();
           // mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost/QuiFlag/confirm.php?id=$user_id$token=$token");
           // header('Location: login.php');
           $_SESSION['flash']['success'] = 'creation de compte avec succes !';
            
            die("Votre compte à bien été crée !");
        }
        
    // vérifier si les données sont remplis 
  
       
  // debug($errors);


  // var_dump($errors);
}
?>
<?php  if(!empty($errors)): ?>

  <div class ="alert alert-danger">

      <p> Vous n'avez pas remli le formulaire correctement : </p>
      <ul>
      <?php  foreach($errors as $error): ?>
          <li><?= $error; ?></li>
      
      <?php  endforeach; ?>
      </ul>
  </div>

<?php  endif;?>