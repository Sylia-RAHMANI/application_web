<?php

require_once('../include/config.php');
        if(isset($_POST['questRempli']))
        {
            $NomT = htmlspecialchars($_POST['NomT']);
            $non_pays = htmlspecialchars($_POST['nom_pays']);
            $non_continent = htmlspecialchars($_POST['nom_continent']);
            $flag = htmlspecialchars($_POST['flag']);
            $url_pays = htmlspecialchars($_POST['url_pays']);
            $capitale = htmlspecialchars($_POST['capitale']);
            $image = htmlspecialchars($_POST['image']);
            $surface = htmlspecialchars($_POST['surface']);

            if(!empty($_POST['NomT']) AND !empty($_POST['nom_pays']) AND !empty($_POST['nom_continent']) AND !empty($_POST['flag']) AND !empty($_POST['url_pays']) AND !empty($_POST['capitale']) AND !empty($_POST['image']) AND !empty($_POST['surface']))
            {
                $reqtable = $bdd->prepare("SHOW TABLES FROM countries LIKE ?");
				$reqtable->execute(array($NomT));
				$tablexist = $reqtable->rowCount();
				if($tablexist == 0)
				{
                    $cree= $bdd->prepare("CREATE TABLE $NomT 
                    CREATE TABLE `countries` (
                            id_pays int(11) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            nom_pays varchar(25) NOT NULL,
                            nom_continent varchar(25) NOT NULL,
                            flag mediumtext NOT NULL,
                            url_pays mediumtext NOT NULL,
                            capitale mediumtext NOT NULL,
                            image mediumtext NOT NULL,
                            surface int(11) NOT NULL)");  
                             $cree->execute();
                            $erreur = "Table créée";

				}
                       
                 
                    $reqNomM = $bdd->prepare("SELECT * FROM $NomT WHERE nom_pays= ?");
                    $reqNomM->execute(array($nom_pays));
                    $pseudoexist = $reqNomM->rowCount();
                    if($pseudoexist == 0)
                    {
                        $insert = $bdd->prepare("INSERT INTO $NomT(nom_pays,nom_continent,flag,url_pays,capitale,image,surface) VALUES(?,?,?,?,?,?,?)");
                        $insert->execute(array($nom_pays,$nom_continent,$flag,$url_pays,$capitale,$image,$surface));
                    }
                    else{
                        $erreur= "Cette question existe déjà !";
                    }
            }
            else
            {
                    $erreur = "Tous les champs doivent etre remplis";
            }
        }
    ?>
