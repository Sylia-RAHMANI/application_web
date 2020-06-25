<?php
session_start();
require_once('../include/config.php');

if(isset($_SESSION['id']))
{
        $getid = intval($_SESSION['id']);
        $requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
        json_encode($getid);
?>

        <?php
            if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
            {
            ?>  
            
            <?php    
            }
            ?>
            <link href="../css/styles.css" rel="stylesheet" />
            <header class="masthead">
            <div id="page-top">  
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"> <h2 class="vp-logo">
                    <i class="fas fa-globe-americas"></i><a href="#"> C&F | Profil <br>
                        <button class="nav-item"><a class="nav-link js-scroll-trigger" href="../aide.php"><i class="fa fa-file-text-o" aria-hidden="true"></i></a></button>
                        <button class="nav-item"><a class="nav-link js-scroll-trigger" href="edite.php"> <i class="fas fa-user-edit"></i></a></button>
                        <button class="nav-item"><a class="nav-link js-scroll-trigger" href="../index.html"><i class="fas fa-sign-out-alt"></i></a></button>
             </div>
            </nav>
            </div>    
            
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"> Welcome <?php echo $userinfo['username']?> To our Game ! </h2>
                    <h3 class="section-subheading text-muted"> Choisissez votre continent préfèrer.</h3>
                </div>
           </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1"
                                ><div class="portfolio-hover">
                                    <div class="portfolio-hover-content"></div>
                                </div>
                                <button type="button" class="btn btn-outline-light btn-lg"> <a href="../jeu/ameriqueNord.php"  ><img class="img-fluid" src="../assets/img/contientAm.webp" alt=""
                            /></a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"> Amérique </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2"
                                ><div class="portfolio-hover">
                                    <div class="portfolio-hover-content"></div>
                                </div>
                                <button type="button" class="btn btn-outline-light btn-lg"> <a href="../jeu/asie.php"  ><img class="img-fluid" src="../assets/img/contientAs.webp" alt=""
                            /></a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"> Asie </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3"
                                ><div class="portfolio-hover">
                                    <div class="portfolio-hover-content"></div>
                                </div>
                                <button type="button" class="btn btn-outline-light btn-lg"> <a href="../jeu/afrique.php"  ><img class="img-fluid" src="../assets/img/contientAf.webp" alt=""
                            /></a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"> Afrique </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4"
                                ><div class="portfolio-hover">
                                    <div class="portfolio-hover-content"></div>
                                </div>
                                <button type="button" class="btn btn-outline-light btn-lg"> <a href="../jeu/Oceanie.php"  ><img class="img-fluid" src="../assets/img/contientAf.webp" alt=""
                            /></a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Océanie</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5"
                                ><div class="portfolio-hover">
                                    <div class="portfolio-hover-content"></div>
                                </div>
                                <button type="button" class="btn btn-outline-light btn-lg"> <a href="jeu/europe.php"  ><img class="img-fluid" src="../assets/img/contientER.webp" alt=""
                            /></a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Europe</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href=""
                                ><div class="portfolio-hover">
                                    <div class="portfolio-hover-content"></div>
                                </div>
                                <button type="button" class="btn btn-outline-light btn-lg"> <a href="../jeu/jeu.php"  ><img class="img-fluid" src="../assets/img/continentWr.jpg" alt=""
                            /></a>
                                </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Planète terre</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
            </div>
        </header>
          
</div>
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script
        src="https://kit.fontawesome.com/83f4286022.js"
        crossorigin="anonymous"
      ></script>
<?php
}        
?>
