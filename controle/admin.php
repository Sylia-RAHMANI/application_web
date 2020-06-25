<?php
        session_start();
        require_once('../include/config.php');
        require_once('creation.php');?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="author" content="AKKOUCHE & BENSAAD">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../modéle/css/formulaire_style.css">
    <title> Création de questionnaire </title>
</head>

<body>
        <div class="container">
          <div class="text-center page-header">
            <h1>C&F jeu de pays et de drapeaux</h1>
          </div>
        </div>

        <div class="container">
              <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                  <div class="center-block">
                      <form class="f" id="f3" autocomplete="on" method="POST">
                        <h2>Creation d'un nouveau Questionnaire</h2>
                                <div for="NomT" class="form-group ">
                                <input class="control-label" type="text" name="NomT" id="NomT" placeholder="Nom de Table" autofocus value=<?php if(isset($NomT)) { echo $NomT; }?>>
                                </div>

                                <div for="nom_pays" class="form-group">
                                    <input class="control-label" type="text" name="nom_pays" id="nom_pays" placeholder="nom_pays" value=<?php if(isset($nom_pays)) {echo $nom_pays;} ?>>
                                </div>

                                <div for="nom_continent" class="form-group ">
                                    <input class="control-label" type="text" name="nom_continent" id="non_continent" placeholder="nom du continent" value=<?php if(isset($nom_continent)) {echo $nom_continent;} ?>>
                                </div>

                                <div for="flag" class="form-group">
                                <input class="control-label" type="text" name="flag" id="flag" placeholder="l'url du drapeaux" value=<?php if(isset($flag)) {echo $flag;} ?>>
                                </div>

                                <div for="url_pays" class="form-group ">
                                    <input class="control-label" type="text" name="url_pays" id="url_pays" placeholder="les coordonnees du pays" value=<?php if(isset($url_pays)) {echo $url_pays;} ?>>
                                </div>

                                <div for="capitale" class="form-group ">
                                    <input class="control-label" type="text" name="capitale" id="capitale" placeholder="capitale" value=<?php if(isset($capitale)) {echo $capitale;} ?>>
                                </div>

                                <div for="image" class="form-group ">
                                    <input class="control-label" type="text" name="image" id="image" placeholder="l'url de l'image" value=<?php if(isset($image)) {echo $Ville;} ?>>
                                </div>

                                <div for="surface" class="form-group ">
                                    <input class="control-label" type="number" name="surface" id="surface" placeholder="surface du pays" value=<?php if(isset($surface)) {echo $surface;} ?>>
                                </div>
                                <div class="form-btn-container ">
                                    <input type="button"  class="btn btn-secondary" onclick="javascript:if(confirm('Voulez vous annuler cette action ?')) location.href = '../index.html';" value="Annuler">   
                                    <button type="submit" name="questRempli" type="remplir_questionnaire" class="btn btn-primary"> Creer </button>
                                </div>
                    </form>
                    </section>
                        <br>
                        <?php if(isset($erreur)){echo $erreur;}?>
                  </form>
                </div>
              </div>
            </div>
</body>
</html>
